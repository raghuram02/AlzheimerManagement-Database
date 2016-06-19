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
						<tr><td bgcolor="#CCEEFF"><font color="green" style="font-weight:bold; font-size:larger" >Trigger Cognitive Test</font></td></tr>
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
						
						<form name="form2"  method="post" >
						<form name="form2"  method="post" >
						
						<table border="1" width="100%" height="500">
						<tr><td width="100%" height="500"><h3>Patient Cognitive Test:</h3>
						
						Select Test-set:
						<select name ="test">
						<?php
						$in=0;
						$flg=0;
						$qs = "select b.cognitive_test_set,a.flg_trigger from pat_cog_mapping a,cognitive_test b where b.cognitive_test_set = a.cognitive_test_id and patient_id=".$arr['patient_id']." and flg_trigger=1 group by b.cognitive_test_set,a.flg_trigger";
						$rqs =mysqli_query($cxn,$qs);
						while($rqs1 = mysqli_fetch_array($rqs))
						{
						echo "<option value=".$rqs1['cognitive_test_set'].">".$rqs1['cognitive_test_set'].""; }
						echo "</option>";
						echo "</select>&nbsp;&nbsp;";
						if(mysqli_num_rows($rqs)<1)
						{
							echo "<input type=".'"'."submit".'"'." name =".'"'."check".'"'." value=".'"'."check".'"'." disabled/>";
						}
						else
						{
						echo "<input type=".'"'."submit".'"'." name =".'"'."check".'"'." value=".'"'."check".'"'." />";
						}
						echo "<br><br>";
						
						if(isset($_POST['check']))
						{
							
							echo "<table border=".'"'."1".'"'.">";
							echo "<tr><th>Question no</th><th>Question</th><th>Evaluation</th></tr>";
						
						
						
						
							
							
							$qe="select cognitive_test_id,cognitive_question from cognitive_test where cognitive_test_set=".$_POST['test']."";
						//echo $qe;
						$qd=mysqli_query($cxn,$qe);
						
						
						while($qf=mysqli_fetch_array($qd))
						{
							$in=$in+1;
							echo "<tr>";
							echo "<td>".$qf['cognitive_test_id']."</td><td>".$qf['cognitive_question']."</td><td>";
							echo "<input type=".'"'."radio".'"'." name=".'"'."q".$in.'"'." value=".'"'."1".'"'.">Yes<br>";
							echo "<input type=".'"'."radio".'"'." name=".'"'."q".$in.'"'." value=".'"'."0".'"'.">No<br>";	  
							echo "</td>";
							echo "</tr>";
						} echo "</table>";
						//echo $in;
						echo "<br>";
						if($in==3)
						{
						echo "<input type=".'"'."submit".'"'." name=".'"'."sd3".'"'." value=".'"'."Submit Results>>".'"'."/>";
						}
						else if($in==5)
						{
						echo "<input type=".'"'."submit".'"'." name=".'"'."sd5".'"'." value=".'"'."Submit Results>>".'"'."/>";
						}
						}
						//echo $in;
						?>
						
						
						 <br><br>
						
						<?php
						
						if(isset($_POST['sd3']) )
						{
							
							$r1=$_POST['q1']*3+$_POST['q2']*3+$_POST['q3']*3;
							//echo $r1;
							$qry = "update pat_cog_mapping set result=".$r1.",flg_trigger=2 where patient_id=".$arr['patient_id']." and cognitive_test_id=1";
							$qres = mysqli_query($cxn,$qry);
							//echo $qry;
							header("Location:cognitivetest.php"); 
						}
						else if(isset($_POST['sd5']) )
						{
							$r1=$_POST['q1']*3+$_POST['q2']*3+$_POST['q3']*3+$_POST['q4']*3+$_POST['q5']*3;
							//echo $r1;
							$qry = "update pat_cog_mapping set result=".$r1.",flg_trigger=2 where patient_id=".$arr['patient_id']." and cognitive_test_id=2";
							//echo $qry;
							$qres = mysqli_query($cxn,$qry);
							header("Location:cognitivetest.php"); 
						}
						
						?>
						
						</td></tr>
						</table>
                        </form>
    </td></tr></table>
<?php include("includes/footer.php"); ?>    
