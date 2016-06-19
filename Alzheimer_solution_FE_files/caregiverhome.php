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
				$qi="insert into pat_cog_mapping(cognitive_test_id,patient_id,flg_trigger,result,inserted_by) values(1,".$_GET['link'].",1,0,'".$arr['physician_name']."')";
						
						echo $qi;
						//$rqi=mysqli_query($cxn,$qi);
						echo "<SCRIPT LANGUAGE='javascript'>disable1();</SCRIPT>";
	   }		
if(isset($_POST['submit2']))
       {
				$qi="insert into pat_cog_mapping(cognitive_test_id,patient_id,flg_trigger,result,inserted_by) values(2,".$_GET['link'].",1,0,'".$arr['physician_name']."')";
						
						echo $qi;
						//$rqi=mysqli_query($cxn,$qi);
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
						<tr><td bgcolor="#CCEEFF"><font color="green" style="font-weight:bold; font-size:larger" >Patient Location</font></td></tr>
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
						
						$qca="select caregiver_name from caregiver c join pat_car_mapping pcm on c.caregiver_id=pcm.caregiver_id and pcm.patient_id=".$arr['patient_id']."";
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
						
						<form name="form2" method="post" >
						
						<table border="1" width="100%" height="500">
						<tr><td width="100%" height="500"><h3>Patient Location Details:</h3>
						<?php
						$ql = "select latitude,longitude from patient_location where patient_id =".$arr['patient_id']." and is_latest=1";
						$res1=mysqli_query($cxn,$ql);
						$res=mysqli_fetch_array($res1);
						
						echo "<iframe width=".'"'."90%".'"'." height=".'"'."450".'"'." frameborder=".'"'."0".'"'." scrolling=".'"'."no".'"'." marginheight=".'"'."0".'"'." marginwidth=".'"'."0".'"'." src=".'"'."http://maps.google.com/maps?client=safari&gl=us&q=loc:".$res['latitude']."+".$res['longitude']."&z=14&output=embed".'"'."></iframe>";

						
						
						?>
						
						</td></tr>
						</table>
                        </form>
    </td></tr></table>
<?php include("includes/footer.php"); ?>    
