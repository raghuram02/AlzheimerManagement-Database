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
        if($_POST['username']=='' or $_POST['password']=='')
        {
            $state=0;
        }
        else{
            $cxn=mysqli_connect("localhost","root","root","alzheimer_solution") or die("Cannot connect to database");
            $u=$_POST['username'];
            $qc="select password from physician where mail='".$u."'";
            //echo $qc;
            $out=mysqli_query($cxn,$qc);
            if(mysqli_num_rows($out)<1)
            {
                    $state=1;
            }
            $ext=mysqli_fetch_array($out);
            
            if(password_verify("'".$_POST['password']."'",$ext['password']))
            {
                $_SESSION['upusername']=$_POST['username'];
                //echo "valid";
                header("Location:home.php");
            }
			else
            {
                    $state=2;
            }
        }
    
    
    }
?>
<?php include("includes/header.php"); ?>
<?php include_once("includes/functions.php"); ?>
        <table id="structure">
            <tr>
                <td id="navigation">
                    If you are a registered physician,please login to proceed.
                    &nbsp;
                    </td>
                <td id="page">
                    <h2>Login</h2>
                    <p>Please enter valid ID and password. To register, <a href="register.php">click here</a></p>
                     <form action="index.php" method="post">
                        Login ID:<input type="text" name="username" value="" /><br />
                        Password:<input type="password" name="password" value="" /><br />
                        <input type="submit" name="submit" value="submit" /> &nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="reset" />
                        </form>
                <font color="red"><?php
                    if($state==0)
                        echo "Fields are empty please enter your mailID and password";
                    else if($state==1)
                        echo "Incorrect mailID";
                    else if($state==2)
                        echo "Incorrect password";
                        ?>
                </font>
                </td>
            </tr>
            </table>
<?php include("includes/footer.php"); ?>