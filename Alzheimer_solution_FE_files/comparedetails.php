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
        <title>Compare Details</title>
        </head>
    <body>
        <?php include("includes/header.php"); ?>
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
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="addpatient.php">Add Patient</a></font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#CCEEFF"><font color="green" style="font-weight:bold; font-size:larger" >Compare Details</font></td></tr>
						</table>
						<br /> <br />
						<table>
						<tr><td bgcolor="#43CA48"><font color="green" style="font-weight:bold; font-size:larger" ><a href="logout.php">Logout</a></font></td></tr>
						</table>
						
						
                   
                        &nbsp;
                        </td>
                    <td id="page">
                        Welcome <?php echo "Dr.".$arr['physician_name']; ?>,<br><br><br>
						<form name="form2" method="post" >
						Select Patient-1 to Perform analysis: 
						<?php
						echo "<select name=".'"'."patient1".'"'.">";
						
						$qm="select p.patient_id,patient_name from patient p join pat_phy_mapping ppm on p.patient_id=ppm.patient_id and ppm.physician_id=".$arr['physician_id']."";
						
						$res1=mysqli_query($cxn,$qm);
                                while($res=mysqli_fetch_array($res1))
                                {
									echo "<option value=".'"'.$res['patient_id'].'"'.">".$res['patient_id']."-".$res['patient_name']."</option>";
								}
						echo "</select>";
						?>
						<br>Select Patient-2 to Perform analysis: 
						<?php
						echo "<select name=".'"'."patient2".'"'.">";
						
						$qm="select p.patient_id,patient_name from patient p join pat_phy_mapping ppm on p.patient_id=ppm.patient_id and ppm.physician_id=".$arr['physician_id']."";
						
						$res1=mysqli_query($cxn,$qm);
                                while($res=mysqli_fetch_array($res1))
                                {
									echo "<option value=".'"'.$res['patient_id'].'"'.">".$res['patient_id']."-".$res['patient_name']."</option>";
								}
						echo "</select>";
						?>
					
						&nbsp;&nbsp;&nbsp;<input type="submit" name="analyse" value="Analyse >>"><br> <br>
						<h3><b>Brain Scan Comparison:</b></h3>
                        <?php
						if(isset($_POST['analyse']))
						{
							$qsp="CALL sp_analyse2(".$_POST['patient1'].")";
							$res3=mysqli_query($cxn,$qsp);
							$qsp2="CALL sp_analyse2(".$_POST['patient2'].")";
							$res4=mysqli_query($cxn,$qsp2);
							$qr1="select patient_id,abs(size_difference) as size_difference,abs(day_diff) as day_diff from analysis_view where patient_id=".$_POST['patient1'];
							$qr2="select patient_id,abs(size_difference) as size_difference,abs(day_diff) as day_diff from analysis_view where patient_id=".$_POST['patient2'];
							$qrs1=mysqli_query($cxn,$qr1);
							//$qarr1=mysqli_fetch_array($qrs1);
							$qrs2=mysqli_query($cxn,$qr2);
							//$qarr2=mysqli_fetch_array($qrs2);
							$cons=10;
							$qres1="";
							$qres2="";
							while($qarr1=mysqli_fetch_array($qrs1))
							{
								//echo $qarr1['size_difference']*10;
								//echo $qarr1['day_diff']*10;
								$qres1=$qres1." ".$qarr1['size_difference']*$cons.",".$qarr1['day_diff'];
								
							}
							while($qarr2=mysqli_fetch_array($qrs2))
							{
								//echo $qarr1['size_difference']*10;
								//echo $qarr1['day_diff']*10;
								$qres2=$qres2." ".$qarr2['size_difference']*$cons.",".$qarr2['day_diff'];
								
							}
							//echo $qres1;
							//echo $qres2;
						    echo "<svg height=".'"'."510".'"'." width=".'"'."600".'"'.">";
							echo "<line x1=".'"'."0".'"'." y1=".'"'."0".'"'." x2=".'"'."0".'"'." y2=".'"'."300".'"'."  style=".'"'."stroke:rgb(255,0,0);stroke-width:2".'"'."/>";
							echo "<line x1=".'"'."300".'"'." y1=".'"'."300".'"'." x2=".'"'."0".'"'." y2=".'"'."300".'"'."  style=".'"'."stroke:rgb(255,0,0);stroke-width:2".'"'."/>";
							echo "<polyline points=".'"'.$qres1.'"'." style=".'"'."fill:none;stroke:green;stroke-width:2".'"'." />";
							echo "<polyline points=".'"'.$qres2.'"'." style=".'"'."fill:none;stroke:black;stroke-width:2".'"'." />";
							
							echo "<text x=".'"'."10".'"'." y=".'"'."310".'"'." font-family=".'"'."Verdana".'"'." font-size=".'"'."10".'"'.">";
							echo "Time ->";
							echo "</text>";
							//<line x1="200" y1="200" x2="0" y2="200" style="stroke:rgb(255,0,0);stroke-width:2" />
							echo "</svg>";
							
						}
						?>
						

                        
                        </form>
    </td></tr></table>
<?php include("includes/footer.php"); ?>    
