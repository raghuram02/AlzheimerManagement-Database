<?php
    session_start();
    $state=5;
    if(isset($_POST['submit']))
    {
        //echo "entered";
        function fun1()
        {
            $_SESSION['upusername']=$_POST['username'];
            header("Location:home.php");
        }
        if($_POST['username']=='' )
        {
            $state=0;
        }
        else{
            $cxn=mysqli_connect("localhost","root","root","alzheimer_solution") or die("Cannot connect to database");
            $u=$_POST['username'];
            $qc="select * from patient where patient_id=".$u."";
            echo $qc;
            $out=mysqli_query($cxn,$qc);
            if(mysqli_num_rows($out)>0)
            {
                $_SESSION['upusername']=$_POST['username'];
                //echo "valid";
                header("Location:caregiverhome.php");
            }
            
        }
    
    
    }
?>
<?php include("includes/header.php"); ?>
<?php include_once("includes/functions.php"); ?>
        <table id="structure">
            <tr>
                <td id="navigation">
                    If you are a registered caregiver,please provide patient id to proceed.
                    &nbsp;
                    </td>
                <td id="page">
                    <h2>Login</h2>
                    <p>Please enter valid Patient ID</p>
                     <form action="caregiverlogin.php" method="post">
                        Patient ID:&nbsp;&nbsp;<input type="text" name="username" value="" /><br><br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="submit" value="submit" /> &nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="reset" />
                        </form>
                <font color="red"><?php
                    if($state==0)
                        echo "Fields are empty please enter patient ID";
                    else if($state==1)
                        echo "Incorrect patient ID";
                        ?>
                </font>
                </td>
            </tr>
            </table>
<?php include("includes/footer.php"); ?>