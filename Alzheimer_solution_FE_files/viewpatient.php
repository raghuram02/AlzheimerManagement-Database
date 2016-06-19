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



<script language="javascript">
	function disable1()
	{
		document.form2.submit1.disabled = true;
	}
	function disable2()
	{
		document.form2.submit2.disabled = true;
	}
</script>	
<?php
if(isset($_POST['submit1']))
       {
				$qi="insert into pat_cog_mapping(cognitive_test_id,patient_id,flg_trigger,result,inserted_by) values(1,".$_GET['link'].",1,-1,'".$arr['physician_name']."')";
						
						//echo $qi;
						$rqi=mysqli_query($cxn,$qi);
						echo "<SCRIPT LANGUAGE='javascript'>disable1();</SCRIPT>";
	   }		
if(isset($_POST['submit2']))
       {
				$qi="insert into pat_cog_mapping(cognitive_test_id,patient_id,flg_trigger,result,inserted_by) values(2,".$_GET['link'].",1,-1,'".$arr['physician_name']."')";
						
						//echo $qi;
						$rqi=mysqli_query($cxn,$qi);
						echo "<SCRIPT LANGUAGE='javascript'>disable2();</SCRIPT>";
	   }
	   if(isset($_POST['save_assess']))
						{
							$qass="update patient_visit_details a,visit b set b.assessment_description='".$_POST['assess']."' , b.visit_type='H' where a.visit_id=b.visit_id and b.visit_type='C' and a.patient_id=".$_GET['link'];
							//echo $qass;
							$rqass= mysqli_query($cxn,$qass);
							$qdr="insert into pat_drug_mapping(drug_id,patient_id,drug_frequency,inserted_by) values(".$_POST['drug'].",".$_GET['link'].",'".$_POST['drug_freq']."','".$arr['physician_name']."')";
							$rqd= mysqli_query($cxn,$qdr);
							//echo $qdr;
							echo "<script>window.location.href = ".'"'."viewpatient.php?link=".$_GET['link'].'";'."</script>";
							
						}
	   
?>							
	
<html>
    <head>
        <title>Home Page</title>
        </head>
    <body>
        <?php include("includes/header.php"); ?>
            <table id="structure">
                <tr>
                    <td id="navigation">
                        Date:<?php echo date("d/m/Y"); ?> <br /><br />
                        <br />
						<table>
						<tr><td bgcolor="#CCEEFF"><font color="green" style="font-weight:bold; font-size:larger" >View Patient</font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="addpatient.php">Add Patient</a></font></td></tr>
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
                        Welcome <?php echo "Dr.".$arr['physician_name']; ?>,<br>
						<?php echo "Patient Selected:".$_GET['link']; 
						echo " - ";
						$qe = "select patient_name,calc_age(dob_year) as age,sex from patient where patient_id=".$_GET['link']."";
						//echo $qe;
						$res1=mysqli_query($cxn,$qe);
						$res=mysqli_fetch_array($res1);
						echo $res['patient_name'];
						echo "<br> Age:";
						echo $res['age'];
						echo "   Sex:";
						if($res['sex']==1)
						{
							echo "F";
						}
						else
						{
							echo "M";
						}
						?><br><br><br>
						
						<form name="form2" method="post" >
						
						<table border="1" width="100%" height="500">
						<tr><td width="25%" height="125"><h3>Scan Details:</h3>
						<style>.floatTL{
	position:absolute;
    top:170px;
    left:250px;
}</style>
	
						
						<?php
						//$link = fbsql_pconnect("localhost","root","root") or die("Could not connect");
						$qs="select replace(substr(ST_AsText(scan),instr(ST_AsText(scan),'(')+1,length(ST_AsText(scan))),')','') as g from patient_scan where patient_id=".$_GET['link']."";
						//$rs = fbsql_query($qs, $link);
						//$row_data = fbsql_fetch_row($rs);
						//echo $qs;
						$res1=mysqli_query ($cxn,$qs);
						while($res=mysqli_fetch_array($res1))
						{
						//echo $res['g'];
						echo "<div class="."floatTL".">";
						echo "<svg height=".'"'."210".'"'." width="."500".">";
						echo "<polygon points=".'"'.$res['g'].'"'." style=".'"'."fill:lime;stroke:purple;stroke-width:1".'"'." fill-opacity=" .'"'."0.2".'"'." />";
						echo "</svg></div>";
						}
						?>
						
		

						
						</td><td width="25%" height="125"><h3>Cognitive Test Details:</h3>
						<?php
						$qco="SELECT cognitive_test_set,max(ifnull(result,'N/A')) as result FROM pat_cog_mapping a right join cognitive_test b on b.cognitive_test_set=a.cognitive_test_id and a.patient_id=".$_GET['link']." group by cognitive_test_set";
						//echo $qco;
						$res1=mysqli_query ($cxn,$qco);
						echo "<table border=".'"'."1".'"'.">";
						echo "<tr>";
                               echo "<th>Cognitive Test ID</th>";
                                echo "<th>Score</th>";
                                echo "<th>Trigger Test</th>";
                                
                         echo   "</tr>";
						 $in=0;
						while($res=mysqli_fetch_array($res1))
						{
							$in=$in+1;
						echo "<tr>";
                                    
						echo "<td>".$res['cognitive_test_set']."</td><td>".$res['result']."</td>
						<td>";
						if($res['result']=="N/A")
						{
						echo "<input type=".'"'."submit".'"'." name=".'"'."submit".$in.'"'." value=".'"'."Trigger Test".$in.'"'." />";
						
						}
						else
						{
						echo "<input type=".'"'."submit".'"'." name=".'"'."submit".$in.'"'." value=".'"'."Trigger Test".$in.'"'." disabled/>";
						}	
						echo "</td>";
						echo "</tr>";
						}
						echo "</table>";
						
						?>
						<br>
						<b>Current Level:</b>
						<?php
						
						$lev = "select level_id from pat_lev_mapping where patient_id=".$_GET['link']." and is_current_level=1";
						//echo $lev;
						$rlev= mysqli_query ($cxn,$lev);
						$flag=0;
						if(mysqli_num_rows($rlev)<1)
						{
							echo "N/A";
							$flag=1;
						}	
						else
						{
							$rres=mysqli_fetch_array($rlev);
							echo $rres['level_id'];
						}
						
						echo "<br><b>Currently Using App:</b>";
						$aus="select suggest_app from patient where patient_id=".$_GET['link']."";
						//echo $aus;
						$raus = mysqli_query ($cxn,$aus);
						$e=mysqli_fetch_array($raus);
						//echo $e['suggest_app'];
						if($e['suggest_app']==1)
						{
							echo "Yes";
						}
						else {echo "No";}
						echo "<br><br>";
						if(isset($_POST['save']))
						{
							
							if($flag==1)
							{
								$qil="insert into pat_lev_mapping(patient_id,level_id,is_current_level,inserted_by) values(".$_GET['link'].",".$_POST['level'].",1,'".$arr['physician_name']."')";
								//echo $qil;
								$r=mysqli_query ($cxn,$qil);
								}
							
							else
							{
								$qu="update pat_lev_mapping set is_current_level=0 where patient_id=".$_GET['link']."";
								$rqu=mysqli_query ($cxn,$qu);
								$qil="insert into pat_lev_mapping(patient_id,level_id,is_current_level,inserted_by) values(".$_GET['link'].",".$_POST['level'].",1,'".$arr['physician_name']."')";
								//echo $qil;
								$r=mysqli_query ($cxn,$qil);
								
							}
							$qu="update patient set suggest_app=".$_POST['app']." where patient_id=".$_GET['link']."";
							echo $qu;
								$rqu=mysqli_query ($cxn,$qu);
							echo "<script>window.location.href = ".'"'."viewpatient.php?link=".$_GET['link'].'";'."</script>";
							
							
						}
						?>
						
						<br>
						Set Level: <select name="level">
  <option value="1">Level-1</option>
  <option value="2">Level-2</option>
  <option value="3">Level-3</option>
  <option value="4">Level-4</option>
  <option value="5">Level-5</option>
  <option value="6">Level-6</option>
  <option value="7">Level-7</option>
</select><br>
Suggest Application: <select name="app">
  <option value="1">Yes</option>
  <option value="0">No</option>
  
</select><br>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="save" value="Update Details" />

						</td></tr>
						<tr><td width="25%" height="125"><h3>Visit & Drug Details:</h3>
						<?php
						$qco="SELECT visit_type,a.inserted_ts as visit_dt,assessment_description from visit a join patient_visit_details b on a.visit_id=b.visit_id and b.patient_id=".$_GET['link']."";
						//echo $qco;
						$res1=mysqli_query ($cxn,$qco);
						echo "<table border=".'"'."1".'"'.">";
						echo "<tr>";
                               echo "<th>Visit Type</th>";
                                echo "<th>Visit TS</th>";
                                echo "<th>Assessment Description</th>";
                                
                         echo   "</tr>";
						while($res=mysqli_fetch_array($res1))
						{
							$in=$in+1;
						echo "<tr>";
                                    
						echo "<td>".$res['visit_type']."</td><td>".$res['visit_dt']."</td><td>".$res['assessment_description']."";
						
						
						echo "</td></tr>";
						}
						echo "</table>";
						
						?>
						<br><b>Assessments:</b><input type="text" name="assess" value="" /><br>
						<b>Prescribe Drug:</b><select name="drug">
						<?php
						$qdrug="select drug_name from drugs";
						$re=mysqli_query ($cxn,$qdrug);
						$i=0;
						while($resdrug = mysqli_fetch_array($re))
						{
							$i=$i+1;
							echo "<option value=".'"'.$i.'"'.">".$resdrug['drug_name']."</option>";
						}
						//echo "Query".$qdr;
						?></select><br>
						<b>Drug Frequency:</b><select name="drug_freq">
						<option value="Once daily">Once daily</option>
						<option value="Once after meal">Once after meal</option>
						<option value="Once before meal">Once before meal</option>
						</select><br>
						<input type="submit" name="save_assess" value = "Save Details" />
						
						</td><td width="25%" height="125"><h3>Other ailments:</h3>
						<?php
						$qo="select ailment_name,level from pat_ail_mapping a join other_ailments b on a.ailment_id=b.ailment_id and a.patient_id=".$_GET['link']."";
						$rs=mysqli_query ($cxn,$qo);
						
						echo "<table border=".'"'."1".'"'.">";
						echo "<tr>";
                               echo "<th>Ailment</th>";
                                echo "<th>Level</th>";
                                echo "<th>Normal/Abnormal</th>";
                                
                         echo   "</tr>";
						 while($rs1=mysqli_fetch_array($rs))
						{
						 echo "<tr>";
                                    
						echo "<td>".$rs1['ailment_name']."</td><td>".$rs1['level']."</td><td>";
						if($rs1['ailment_name']=="systolic blood pressure" && $rs1['level']<=120)
						{
							echo "<font color=".'"'."green".'"'."> Normal </font>";
						}
						else if($rs1['ailment_name']=="diastolic blood pressure" && $rs1['level']<=80)
						{
							echo "<font color=".'"'."green".'"'."> Normal </font>";
						}
						else if($rs1['ailment_name']=="diabetes" && $rs1['level']>=120&&$rs1['level']<=150)
						{
							echo "<font color=".'"'."green".'"'."> Normal </font>";
						}
						else
						{
							echo "<font color=".'"'."red".'"'."> Abormal </font>";
						}
						echo "</td></tr>";
						 
						} 
						 echo "</table>";
						?>
						</td></tr>
						</table>
                        <button onclick="history.go(-1);">Back </button>
                        </form>
    </td></tr></table>
<?php include("includes/footer.php"); ?>    
