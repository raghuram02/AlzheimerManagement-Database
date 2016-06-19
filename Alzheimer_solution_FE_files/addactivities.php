<?php
    session_start();
    date_default_timezone_set("America/New_York");
    if(!isset($_SESSION['upusername']))
       header("Location:login.php");
    $q="select * from patient where patient_id='".$_SESSION['upusername']."'";
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
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="caregiverhome.php">Patient Location</a></font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#CCEEFF"><font color="green" style="font-weight:bold; font-size:larger" >Add Activities/Reminders</font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="cognitivetest.php">Trigger Cognitive Test</a></font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="appointment.php">Request Appointment</a></font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="caregiverlogout.php">Logout</a></font></td></tr>
						</table>
						
						
                   
                        &nbsp;
                        </td>
                    <td id="page">
                        Welcome <?php 
						
						$qca="select * from caregiver c inner join pat_car_mapping pcm on c.caregiver_id=pcm.caregiver_id and pcm.patient_id=".$arr['patient_id']."";
						$rqca=mysqli_query($cxn,$qca);
						$rqarr=mysqli_fetch_array($rqca);
						echo "Mr./Ms.".$rqarr['caregiver_name']; ?>,<br>
						<?php echo "Patient Selected:".$arr['patient_id']; 
						echo " - ";
						$qe = "select patient_name,calc_age(dob_year) as age,sex from patient where patient_id=".$arr['patient_id']."";
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
						
						<form name="form2" action="addactivities.php" method="post" enctype="multipart/form-data">
						
						<table border="1" width="100%" height="500">
						<tr><td width="100%" height="500"><h3>Patient Location Details:</h3>
						<?php
						$ql = " select activity_desc,activity_type,activity_deadline,attachment_name from patient_daily_activities a join activities b on a.activity_id=b.activity_id and a.patient_id=".$arr['patient_id']."";
						$res1=mysqli_query($cxn,$ql);
						echo "<table border=".'"'."1".'"'.">";
						echo "<tr>";
                               echo "<th>Activity Description</th>";
                                echo "<th>Activity type</th>";
                                echo "<th>Activity Deadline</th>";
								echo "<th>Attachment Details</th>";
                                
                         echo   "</tr>";
						while($res=mysqli_fetch_array($res1))
						{
							echo "<tr>";
                                    
							echo "<td>".$res['activity_desc']."</td><td>".$res['activity_type']."</td><td>".$res['activity_deadline']."<td>".$res['attachment_name']."";
						
							echo "</td></tr>";
						}
						
						echo "</table>";
						
						?><br><br><br><h3>Enter new activity details:</h3>
						<b>Activity Type:</b>
						<select name="activity_type">
						<option value="Medicine">Medicine</option>
						<option value="Food">Food</option>
						<option value="Family">Family</option>
						</select><br> <br/>
						<b>Activity Description:</b>
						<input type="text" name="activity_desc" /><br> <br/>
						<b>Activity Deadline:</b>
						<input type="datetime-local" name="dt" /><br> <br/>
						<b>Attachment File:</b>
						<input type="file" name="image" /> <br> <br/>
						<input type="submit" name="sumit" value="submit" /> <br> <br/>
						<?php
						if(isset($_POST['sumit']))
						{
							/*if(getimagesize($_FILES["image"]["tmp_name"]==FALSE) )
							{
								echo "Please select an image";
							}
							else{*/
								echo "In in";
								$image= addslashes($_FILES["image"]["tmp_name"]);
								$name= addslashes($_FILES["image"]["name"]);
								$image = file_get_contents($image);
								$image = base64_encode($image);
								$qry="insert into activities(activity_desc,activity_type,activity_deadline,attachment_name,inserted_by,attachment) values('".$_POST['activity_desc']."','".$_POST['activity_type']."','".$_POST['dt']."','".$name."','".$rqarr['caregiver_name']."','".$image."')";
								//echo $qry;
								$result=mysqli_query($cxn,$qry);
								$subq="SELECT MAX(ACTIVITY_ID) AS ID FROM activities where inserted_by=(select caregiver_name from caregiver where caregiver_id=".$rqarr['caregiver_id'].")";
								echo $subq;
								$subr=mysqli_query($cxn,$subq);
								$subra=mysqli_fetch_array($subr);
								echo $subra['ID'];
								$qry1="insert into patient_daily_activities(patient_id,activity_id,inserted_by) values(".$arr['patient_id'].",".$subra['ID'].",'".$rqarr['caregiver_name']."')";
								echo $qry1;
								$result=mysqli_query($cxn,$qry1);
								if($result)
								{
								echo "<br> Details saved successfully";
								}
								else
								{
								echo "<br> Details not saved successfully";
								}
								header("Location:addactivities.php");
							
						}
						
						

						
						
						?>
						</td></tr>
						</table>
                        </form>
    </td></tr></table>
<?php include("includes/footer.php"); ?>    
