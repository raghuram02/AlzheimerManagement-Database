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
                        Welcome <?php echo "Dr.".$arr['physician_name']; ?>,<br><br><br>
						<form name="form2" method="post" action="home.php">
						Enter part of patient name to perform search: <input type="text" name="search" value="" />&nbsp;&nbsp;&nbsp;<input type="submit" name="sr" value="Search >>"><br> <br>
                        <table id="patient" border="1">
                            <tr>
                                <th>Patient_ID</th>
                                <th>Patient_Name</th>
                                <th>Caretaker_Name</th>
                                <th>Level</th>
                                <th>Cognitive_score</th>
								<th>Last Visit date</th>
								<th>Suggest application</th>
                            </tr>
                            <?php
							if(!isset($_POST['sr']))
							{
                            $q="select bs.patient_id,bs.patient_name,bs.caregiver_name,level_id,result,request_dt,suggest_app from pat_car_fr_phy_vw bs left join pat_lev_cog_vw a on bs.patient_id=a.patient_id left join pat_phy_req_vw b on a.patient_id=b.patient_id where bs.physician_id= ".$arr['physician_id']."";
							//$q1="select * from pat_lev_cog_vw where physician_id=".$arr['physician_id'].""		

							a:
								$res1=mysqli_query($cxn,$q);
                                while($res=mysqli_fetch_array($res1))
                                {
									
                                    echo "<tr>";
									if($res['suggest_app']==0)
									{
                                    echo "<td>"."<a href=viewpatient.php?link=".$res['patient_id'].">".$res['patient_id']."</a></td><td>".$res['patient_name']."</td><td>".$res['caregiver_name']."</td><td>".$res['level_id']."</td><td>".$res['result']."</td><td>".$res['request_dt']."</td><td>No</td>";
                                    }
									else if ($res['suggest_app']==1)
									{
									echo "<td>"."<a href=viewpatient.php?link=".$res['patient_id'].">".$res['patient_id']."</a></td><td>".$res['patient_name']."</td><td>".$res['caregiver_name']."</td><td>".$res['level_id']."</td><td>".$res['result']."</td><td>".$res['request_dt']."</td><td>Yes</td>";
                                    	
									}
									echo "</tr>";
									
                                }
							}
							else if(isset($_POST['sr']))
							{
								$srch=$_POST['search'];
								
                                $q="select pa.patient_id,pa.patient_name,c.caregiver_name from patient pa,pat_phy_mapping ppm,physician ph,caregiver c,pat_car_mapping pcm where ppm.patient_id=pa.patient_id and ph.physician_id=ppm.physician_id and pcm.caregiver_id=c.caregiver_id and pcm.patient_id=pa.patient_id and ph.physician_id=".$arr['physician_id']." and pa.patient_name like '%".$srch."%'";
									goto a;
							}
                        ?>
                        </table> <br/>
                        
                        
                        
                        </form>
    </td></tr></table>
<?php include("includes/footer.php"); ?>    
