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
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="addactivities.php">Add Activities/Reminders</a></font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="cognitivetest.php">Trigger Cognitive Test</a></font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#CCEEFF"><font color="green" style="font-weight:bold; font-size:larger" >Request Appointment</font></td></tr>
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
						
						<form name="form2" action="appointment.php" method="post" enctype="multipart/form-data">
						
						<table border="1" width="100%" height="500">
						<tr><td width="100%" height="500"><h3>Patient Appointment Details:</h3>
						<?php
						$qco="SELECT visit_type,a.inserted_ts as visit_dt,assessment_description from visit a join patient_visit_details b on a.visit_id=b.visit_id and b.patient_id=".$arr['patient_id']."";
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
							//$in=$in+1;
						echo "<tr>";
                                    
						echo "<td>".$res['visit_type']."</td><td>".$res['visit_dt']."</td><td>".$res['assessment_description']."";
						
						
						echo "</td></tr>";
						}
						echo "</table>";
?><br> <br>
<h3>Request Appointment</h3><br>
<b>Physician:</b>
<?php
$qphy="SELECT a.physician_id,a.physician_name,a.clinic_address FROM PHYSICIAN a join PAT_PHY_MAPPING b on a.physician_id=b.physician_id and b.patient_id=".$arr['patient_id']."";
$pres=mysqli_query ($cxn,$qphy);
$parr=	mysqli_fetch_array($pres);

echo $parr['physician_name'];					
echo "<br><b>Clinic address:</b>";
echo $parr['clinic_address'];

?><br>

<b>Appointment Time:</b><input type="datetime-local" name="dt" />

<?php
$qchk= "select * from pat_phy_visit_vw where patient_id=".$arr['patient_id']." and visit_type='C'";
$qchkres = mysqli_query ($cxn,$qchk);
if(mysqli_num_rows($qchkres)<1)
{	
  echo "<input type=".'"'."submit".'"'." name=".'"'."submit".'"'." value=".'"'."save".'"'." />";
}
else{
	  echo "<input type=".'"'."submit".'"'." name=".'"'."submit".'"'." value=".'"'."save".'"'." disabled/>";
}

if(isset($_POST['submit']))
{
	$qry1="insert into visit(visit_type,request_dt,inserted_by) values('C','";
	$qry2=$_POST['dt'];
	$qry3="','";
	$qry4=$rqarr['caregiver_name'];
	$qry5="')";
	
	$qry=$qry1.$qry2.$qry3.$qry4.$qry5;
	
	$qres1=mysqli_query ($cxn,$qry);
	$qs1="select max(visit_id) as visit_id from visit where inserted_by='".$rqarr['caregiver_name']."'";
	$qsr1=mysqli_fetch_array(mysqli_query ($cxn,$qs1));
	
	$qry2="insert into patient_visit_details(patient_id,physician_id,visit_id,inserted_by) values(".$arr['patient_id'].",".$parr['physician_id'].",".$qsr1['visit_id'].",'".$rqarr['caregiver_name']."')";
	//echo $qry2;
	$qres1=mysqli_query ($cxn,$qry2);
	if($qres1)
	{
		echo "Details saved successfully";
		header("Location:appointment.php");
	}
	else{
		echo "Details not saved successfully";
	}
	
	
}

?>
						</td></tr>
						</table>
                        </form>
    </td></tr></table>
<?php include("includes/footer.php"); ?>    
