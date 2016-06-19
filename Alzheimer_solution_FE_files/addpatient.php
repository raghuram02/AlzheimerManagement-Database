<?php include("includes/src/NexmoMessage.php"); ?>
<?php
    session_start();
    date_default_timezone_set("America/New_York");
    if(!isset($_SESSION['upusername']))
       header("Location:login.php");
    $q="select * from physician where mail='".$_SESSION['upusername']."'";
    $cxn=mysqli_connect("localhost","root","root","alzheimer_solution") or die("Cannot connect to database");
    $res=mysqli_query($cxn,$q);
    $arr=mysqli_fetch_array($res);
?>

<?php
    $f=0;
    $da=0;
    if(isset($_POST['submit']))
       {
            $cxn=mysqli_connect("localhost","root","root","alzheimer_solution") or die("Cannot connect to database");
			$ph = "+".$_POST['pcode'].$_POST['pph1'].$_POST['pph2'].$_POST['pph3'];
            $qc="select patient_id from patient where phone='".$ph."'";
            $res=mysqli_query($cxn,$qc);
            if(!$res)
            {
                die("Error");
            }
            $nr=mysqli_num_rows($res);
            if($nr>0)
            {
                $f=1;
            }
            
            else
            {
                
                    //echo "inside";
                    $qc="insert into patient(patient_name,dob_date,dob_month,dob_year,address_line1,city,state,zip,phone,sex,inserted_by) values('".$_POST['pname']."',".$_POST['date'].",".$_POST['month'].",".$_POST['year'].",'".$_POST['add']."','".$_POST['city']."','".$_POST['state']."','".$_POST['zip']."','".$ph."','".$_POST['sex']."','".$arr['physician_name']."')";
                    //echo $qc;
                    $out=mysqli_query($cxn,$qc);
                    if(!$out)
                    {
                           $da=2;
                    }
                    else
					{
						//echo "In";
						$qd="select patient_id from patient where phone='".$ph."'";
						$out=mysqli_query($cxn,$qd);
						$a=mysqli_fetch_array($out);
						//echo $a['patient_id'];
						$qd = "insert into pat_phy_mapping(patient_id,physician_id,inserted_by) values(".$a['patient_id'].",".$arr['physician_id'].",'".$arr['physician_name']."')";
						//echo $qd;
						$out=mysqli_query($cxn,$qd);
						$ph = "+".$_POST['code'].$_POST['ph1'].$_POST['ph2'].$_POST['ph3'];
						$qc="select * from caregiver where caregiver_phone='".$ph."'";
						$res=mysqli_query($cxn,$qc);
						$carr1=mysqli_fetch_array($res);
						echo "Carr".$carr1['caregiver_name'];
						if(!$res)
						{
							die("Error");
						}
						$nr=mysqli_num_rows($res);
						echo "Size".$nr;
						echo "Carr".$carr1['caregiver_name'];
						if($nr<=0)
						{
							$qc="insert into caregiver(caregiver_name,caregiver_phone,inserted_by) values('".$_POST['username']."','".$ph."','".$arr['physician_name']."')";
							//echo $qc;
							$res=mysqli_query($cxn,$qc);
							$qc="select caregiver_id from caregiver where caregiver_phone='".$ph."'";
							$res=mysqli_query($cxn,$qc);
							$carr=mysqli_fetch_array($res);
							//echo "In";
							$qd = "insert into pat_car_mapping(patient_id,caregiver_id,inserted_by) values(".$a['patient_id'].",".$carr['caregiver_id'].",'".$arr['physician_name']."')";
							//echo $qd;
							$res=mysqli_query($cxn,$qd);
						}
						$qd = "insert into pat_car_mapping(patient_id,caregiver_id,inserted_by) values(".$a['patient_id'].",".$carr1['caregiver_id'].",'".$arr['physician_name']."')";
						echo $qd;
						$res=mysqli_query($cxn,$qd);
						$qe = "insert into visit(visit_type,inserted_by) values('C','".$arr['physician_name']."')";
						echo $qe;
						$res=mysqli_query($cxn,$qe);
						$qs = "select max(visit_id) as visit_id from visit where inserted_by='".$arr['physician_name']."'";
						echo "\n".$qs;
						$res=mysqli_query($cxn,$qs);
						$res5=mysqli_fetch_array($res);
						$qf = "insert into patient_visit_details(patient_id,physician_id,visit_id,inserted_by) values(".$a['patient_id'].",".$arr['physician_id'].",".$res5['visit_id'].",'".$arr['physician_name']."')";
						echo "\n".$qf;
						$res=mysqli_query($cxn,$qf);
						echo "Details saved successfully";
						//echo "<script type='text/javascript'>alert('Patient details recorded!');</script>";
						$nexmo_sms = new NexmoMessage('76eaf6c6', '52066e5d');
						$pa="Patient id is ".$a['patient_id'];
						$info = $nexmo_sms->sendText( $ph, '+12069469249', $pa );
						//echo $nexmo_sms->displayOverview($info);
						//echo "success";
						echo "<script type='text/javascript'>alert('Patient details recorded!');</script>";
                    header("Location:home.php");
                    }
                
            }
            
            //echo $qc;
            
        }
?>

<?php include("includes/header.php"); ?>

 <?php include_once("includes/functions.php"); ?>
        <table id="structure">
            <tr>
                <td id="navigation">
                    Date:<?php echo date("d/m/Y"); ?> <br /><br />
                        <br />
						<table>
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="home.php">View Patient</a></font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#CCEEFF"><font color="green" style="font-weight:bold; font-size:larger" >Add Patient</font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="comparedetails.php">Compare Details</a></font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="logout.php">Logout</a></font></td></tr>
						</table>
						
						
                   
                        &nbsp;
                        </td>
                <td id="page">
                    <h2>Add Patient</h2>
                    <p>Please enter details</p>
                    <form name="form1" action="addpatient.php" method="post" >
                    <pre>
                    Full name:      <input type="text" name="pname" value="" /><br />
                    DOB:            <select name="date" >
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option> 
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>	
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>	
                    <option value="22">22</option>	
                    <option value="23">23</option>
                    <option value="24">24</option>	
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>	
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option></select>-<select name="month">
                    <option value="1">1
                    <option value="2">2
                    <option value="3">3
                    <option value="4">4
                    <option value="5">5
                    <option value="6">6
                    <option value="7">7
                    <option value="8">8
                    <option value="9">9
                    <option value="10">10
                    <option value="11">11
                    <option value="12">12</select> -<select name="year">
                    <option value="1968">1968
                    <option value="1969">1969
                    <option value="1970">1970
                    <option value="1971">1971
                    <option value="1972">1972
                    <option value="1973">1973
                    <option value="1974">1974
                    <option value="1975">1975
                    <option value="1976">1976
                    <option value="1977">1977
                    <option value="1978">1978
                    <option value="1979">1979
                    <option value="1980">1980
                    <option value="1981">1981
                    <option value="1982">1982
                    <option value="1983">1983
                    <option value="1984">1984
                    <option value="1985">1985
                    <option value="1986">1986
                    <option value="1987">1987
                    <option value="1988">1988
                    <option value="1989">1989
                    <option value="1990">1990
                    </select>dd-mon-yyyy format<br />
                    Address line:   <input type="textarea" breadth="80" height="120" name="add" value="" />     City:  <input type="text" breadth="10" height="120" name="city" value="" /><br />
                    State:          <input type="textarea" breadth="80" height="120" name="state" value="" />     Zip:   <input type="text" breadth="10" height="120" name="zip" value="" /><br /> 
		    Phone:          +<input type="text" name="pcode" value="" maxlength="2" size="2"/>-(<input type="text" name="pph1" value="" maxlength="3" size="3" />)-<input type="text" name="pph2" value="" maxlength="3" size="3" />-<input type="text" name="pph3" value="" maxlength="4" size="4" /><font color="red"><?php
                        if($f==1)
                            echo "patient already exists";
                    ?></font><br />        
		    Sex:            <input type="radio" name="sex" value="0">Male      <input type="radio" name="sex" value="1">Female<br />      
		    ==============================================================================================================================	
            <h2>Assign Patient to Caregiver</h2>
			Full name:      <input type="text" name="username" value="" /><br />
			Phone:          +<input type="text" name="code" value="" maxlength="2" size="2"/>-(<input type="text" name="ph1" value="" maxlength="3" size="3" />)-<input type="text" name="ph2" value="" maxlength="3" size="3" />-<input type="text" name="ph3" value="" maxlength="4" size="4" /><br />        
		    
                    <input type="submit" name="submit" value="submit"/> &nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="reset" />
                    </pre></form>
                </td>
            </tr>
            </table>
<?php include("includes/footer.php"); ?>