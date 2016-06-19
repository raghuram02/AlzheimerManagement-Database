<?php
    $f=0;
    $da=0;
    if(isset($_POST['submit']))
       {
            $cxn=mysqli_connect("localhost","root","root","alzheimer_solution") or die("Cannot connect to database");
            $qc="select * from physician where mail='".$_POST['mail']."'";
            $res=mysqli_query($cxn,$qc);
            if(!$res)
            {
                die("Error");
            }
            $nr=mysqli_num_rows($res);
            if($nr>0)
            {
                $f=1;
            }
            
            else
            {
                $q="select * from npi_physician where npi=".$_POST['npi']."";
                $res1=mysqli_query($cxn,$q);
                if((mysqli_num_rows($res1)>0))
                {
                    //echo "inside";
					$pass= password_hash("'".$_POST['password']."'",PASSWORD_BCRYPT,array('cost' => 12));
					$ph = "+".$_POST['code'].$_POST['ph1'].$_POST['ph2'].$_POST['ph3'];
					//echo $ph;
					
					$qc="insert into physician(physician_name,clinic_address,mail,password,inserted_by,phone) values('".$_POST['username']."','".$_POST['add']."','".$_POST['mail']."','".$pass."','".$_POST['username']."','".$ph."')";
                    /*$qc="insert into physician(physician_name,clinic_address,mail,phone,password)
					values('".$_POST['username']."','".$_POST['add']."','".$_POST['mail']."',".$_POST['acc'].",
					'"+".".$_POST['code']."."-(".".$_POST['ph1'].".")-".".$_POST['ph2']."."-".".$_POST['ph3']."',
					'".$pass."')";*/
                    //echo $qc;
					//echo password_hash('password',PASSWORD_DEFAULT);
                    $out=mysqli_query($cxn,$qc);
                    if(!$out)
                    {
                           $da=2;
                    }
                    else
                    header("Location:index.php");
                }
                else
                {
                    $da=1;
                }
                
            }
            
            //echo $qc;
            
        }
?>

<?php include("includes/header.php"); ?>
 <script type="text/javascript" language="javascript">
	function passwordStrength(password)

{

	var desc = new Array();

	desc[0] = "Very Weak";

	desc[1] = "Weak";

	desc[2] = "Better";

	desc[3] = "Medium";

	desc[4] = "Strong";

	desc[5] = "Strongest";



	var score   = 0;



	//if password bigger than 6 give 1 point

	if (password.length > 3) score++;



	//if password has both lower and uppercase characters give 1 point	

	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;



	//if password has at least one number give 1 point

	if (password.match(/\d+/)) score++;



	//if password has at least one special caracther give 1 point

	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;



	//if password bigger than 12 give another 1 point

	if (password.length > 6) score++;



	 document.getElementById("passwordDescription").innerHTML = desc[score];

	 document.getElementById("passwordStrength").className = "strength" + score;

}
function cal()
{
        var a=document.form1.username.value;
        var b=document.form1.password.value;
        var c=document.form1.mail.value;
        var d=document.form1.acc.value;
        var e=document.form1.code.value;
	var x=parseInt(document.form1.date.value);
	var y=parseInt(document.form1.month.value);
	var z=parseInt(document.form1.year.value);
	var h=0;
        if(a==""&&b==""&&c=="")
        {
            alert("Some fields are empty");
            h=1;
        }
        else if(!document.form1.check.checked)
        {
            alert("please check terms and conditions");
            h=1;
        }
        else if(isNaN(d)||isNaN(e))
        {
            alert("Account and passcode has to be a number");
            h=1;
        }
	switch(y)
	{
		case 2:
			if(z%4==0&&x>29)
				{
					alert("date could not exeed 29");
					h=1;
				}
			else if(z%4!=0&&x>28)
				{
					alert("date could not exeed 28");
					h=1;
				}
			break;
		case 4:
		case 6:
		case 9:
		case 11:
			if(x>30){
				alert("the date cannot exeed 30");
				h=1;}
        }
        var emailID=document.form1.mail;
	
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please Enter your Email ID");
		emailID.focus();
		h=1;
	}
	if (echeck(emailID.value)==false){
		emailID.value="";
		emailID.focus();
		h=1;
	}
        if(h==1)
            return false;
}
function echeck(str) {

		var at="@";
		var dot=".";
		var lat=str.indexOf(at);
		var lstr=str.length;
		var ldot=str.indexOf(dot);
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID");
		   return false;
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID");
		   return false;
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID");
		    return false;
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID");
		    return false;
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID");
		    return false;
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID");
		    return false;
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID");
		    return false;
		 }

 		 return true;					
	}
</script>
<?php include_once("includes/functions.php"); ?>
        <table id="structure">
            <tr>
                <td id="navigation">
                    New physicians please enter details to get your login.
                    &nbsp;
                    </td>
                <td id="page">
                    <h2>Register</h2>
                    <p>Please enter relevant details</p>
                    <form name="form1" action="register.php" method="post" onsubmit="return cal()">
                    <pre>
                    Full name:      <input type="text" name="username" value="" /><br />
			NPI:        <input type="text" name="npi" value="" /><br /><?php
                        if($da==1)
                            echo "Enter valid npi";
						?>
				
			Address:    <input type="textarea" breadth="80" height="120" name="add" value="" /><br />
                    Mail-ID:        <input type="text" name="mail" value="" /><font color="red"><?php
                        if($f==1)
                            echo "mail-id already exists";
                    ?></font><br />
                    Phone:          +<input type="text" name="code" value="" maxlength="2" size="2"/>-(<input type="text" name="ph1" value="" maxlength="3" size="3" />)-<input type="text" name="ph2" value="" maxlength="3" size="3" />-<input type="text" name="ph3" value="" maxlength="4" size="4" /><br />
                    Password:       <input type="password" name="password" value="" onkeyup="passwordStrength(this.value)"/> <link href="stylesheets/password.css" media="all" rel="stylesheet" type="text/css" />
                    <div id="passwordDescription" style="float:right">Password empty</div>
                    <div id="passwordStrength" class="strength0" style="float:right"></div>
                    <br />
                    <input type="checkbox" name="check"> I have read all the terms and conditions<br />
                    <input type="submit" name="submit" value="submit"/> &nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="reset" />
                    </pre></form>
                </td>
            </tr>
            </table>
<?php include("includes/footer.php"); ?>