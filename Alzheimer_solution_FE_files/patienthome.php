
<?php
 $cxn=mysqli_connect("localhost","root","root","alzheimer_solution") or die("Cannot connect to database");
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
						<tr><td bgcolor="#CCEEFF"><font color="green" style="font-weight:bold; font-size:larger" >View Activities/Reminders</font></td></tr>
						</table>
						
						
						
                   
                        &nbsp;
                        </td>
                    <td id="page">
                        Welcome 
						
					
						<?php echo $_GET['link']; 
						echo " - ";
						$qe = "select patient_name,calc_age(dob_year) as age,sex from patient where patient_id=".$_GET['link']."";
						//echo $qe;
						$res1=mysqli_query($cxn,$qe);
						$resp=mysqli_fetch_array($res1);
						echo $resp['patient_name'];
						echo "<br> Age:";
						echo $resp['age'];
						echo "   Sex:";
						if($resp['sex']==1)
						{
							echo "F";
						}
						else
						{
							echo "M";
						}
						?><br><br><br>
						
						<form name="form2"  method="post" enctype="multipart/form-data">
						
						<table border="1" width="100%" height="500">
						<tr><td width="100%" height="500"><h3>My Activity Details:</h3>
						<?php
						$ql = " select activity_desc,activity_type,activity_deadline,attachment_name,attachment from patient_daily_activities a join activities b on a.activity_id=b.activity_id and a.patient_id=".$_GET['link']."";
						$res1=mysqli_query($cxn,$ql);
						echo "<table border=".'"'."1".'"'.">";
						echo "<tr>";
                               echo "<th>Activity Description</th>";
                                echo "<th>Activity type</th>";
                                echo "<th>Activity Deadline</th>";
								echo "<th>Attachment Details</th>";
								echo "<th>Attachment</th>";
                                
                         echo   "</tr>";
						while($res=mysqli_fetch_array($res1))
						{
							echo "<tr>";
                                    
							echo "<td>".$res['activity_desc']."</td><td>".$res['activity_type']."</td><td>".$res['activity_deadline']."</td><td>".$res['attachment_name']."</td>";
							if($res['attachment'] == NULL)
							{
								echo "<td></td>";
							}
							else
							{
								
								echo"<td><img height= ".'"'."100".'"'." width= ".'"'."100".'"'." src=".'"'."data:image;base64,".$res['attachment'].'"'. "></td>";
							
								
							}	
							
							echo "</tr>";
						}
						
						echo "</table>";
						
						?><br><br><br><h3>Enter new activity details:</h3>
						<b>Activity Type:</b>
						<select name="activity_type">
						<option value="Immediate">Immediate</option>
						
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
							$image= addslashes($_FILES["image"]["tmp_name"]);
								$name= addslashes($_FILES["image"]["name"]);
								$image = file_get_contents($image);
								$image = base64_encode($image);
								$qry="insert into activities(activity_desc,activity_type,activity_deadline,attachment_name,inserted_by,attachment) values('".$_POST['activity_desc']."','".$_POST['activity_type']."','".$_POST['dt']."','".$name."','".$resp['patient_name']."','".$image."')";
								//echo $qry;
								$result=mysqli_query($cxn,$qry);
								$subq="SELECT MAX(ACTIVITY_ID) AS ID FROM activities where inserted_by=(select patient_name from patient where patient_id=".$_GET['link'].")";
								echo $subq;
								$subr=mysqli_query($cxn,$subq);
								$subra=mysqli_fetch_array($subr);
								echo $subra['ID'];
								$qry1="insert into patient_daily_activities(patient_id,activity_id,inserted_by) values(".$_GET['link'].",".$subra['ID'].",'".$resp['patient_name']."')";
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
								echo "<script>window.location.href = ".'"'."patienthome.php?link=".$_GET['link'].'";'."</script>";
							
						}
						
						

						
						
						?>
						</td></tr>
						</table>
                        </form>
    </td></tr></table>
<?php include("includes/footer.php"); ?>    
