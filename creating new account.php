<html>
<head>
<title>signup</title>
<link rel="stylesheet" href="main Page1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<center>
<form method="post">
<center>
<i class="fa fa-user-circle" style="font-size:65px;color:green;"></i><br/>
<h2><b>Sign Up </b></h2>
<i class="fa fa-user-circle-o" style="color:green;font-size:20px;"></i>&ensp;&ensp;<input type="text" name="3" placeholder="Username" required/><br/><br/>
<i class="fa fa-lock" style="color:green;font-size:24px;"></i>&ensp;&ensp;<input type="password" name="4" placeholder="Password" required/><br/><br/>
<i class="fa fa-lock" style="color:green;font-size:24px;"></i>&ensp;&ensp;<input type="password" name="5" placeholder="Confirm Password" required/><br/><br/>
</center>
Gender:&ensp;&ensp;
<input type="radio" name="gender" value="Male" required/>Male
<input type="radio" name="gender" value="Female" required/>Female
<input type="radio" name="gender" value="Others" required/>Others<br/><br/>
<center>
<i class="fa fa-phone" style="color:green;font-size:24px;"></i>&ensp;&ensp;<input type="number" name="mobile_number" placeholder="Mobile Number" required/><br/>
<p id="result"></p>
<button type="submit"><b>SignUp</b></button><br/>
</form>
</center>
<?php
if($_POST)
{
$s=0;
$name1=$_POST['3'];
$pswd=$_POST['4'];
$cpswd=$_POST['5'];
$gender=$_POST['gender'];
$mobile=$_POST['mobile_number'];
$host="localhost";$user="root";$password="";$dbname="test";
$conn=mysqli_connect($host,$user,$password,$dbname);
$table='details';
$query="select * from $table";
$result=mysqli_query($conn,$query);
$num=mysqli_num_rows($result);
if($num==0 && ($pswd==$cpswd))
{
$query="insert into $table(firstname,PSWD,confirmPSWD,Gender,mobile_number) values('$name1','$pswd','$cpswd','$gender','$mobile')";
mysqli_query($conn,$query);
header("location:successful_output.html");
}
if($num==0 && ($pswd!=$cpswd))
{
echo "<script>
document.getElementById('result').innerHTML='Invalid Password Match';
</script>";
}
if($num>0)
{
if($pswd!=$cpswd){echo "<script>
document.getElementById('result').innerHTML='Invalid Password Match';
</script>";}
else{
while($row=mysqli_fetch_assoc($result)){
if($name1==$row['firstname']){$s++;}
}
if($s>0){
echo "<script>
document.getElementById('result').innerHTML='Already registered with this name, please choose another one!!';
</script>";
}
if($s==0){
$query="insert into $table(firstname,PSWD,confirmPSWD,Gender,mobile_number) values('$name1','$pswd','$cpswd','$gender','$mobile')";
mysqli_query($conn,$query);
header("location:successful_output.html");
}
}
}
}
?>
</html>