<html>
<head>
<title>TASK</title>
<link rel="stylesheet" href="main Page.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
<center>
<form method="post">
<center>
<i class="fa fa-user-circle" style="font-size:65px;color:green;"></i><br/>
<h2><b>Login</b> </h2>
<i class="fa fa-user-circle-o" style="color:green;font-size:20px;"></i>&ensp;&ensp;<input type="text" name="1" placeholder="Username" required/><br/><br/>
<i class="fa fa-lock" style="color:green;font-size:24px;"></i>&ensp;&ensp;<input type="password" name="2" placeholder="Password" required/><br/><br/>
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<a href="password update.php" style="color:green;"><b>Change Password?</b></a><br/>
<p id="result"></p>
<button type="submit"><b>Login</b></button></br>
<p>create a new account? <a href="creating new account.php" target="_blank" style="color:green;"><b>Sign Up</b></a></p>
<p>Delete an account? <a href="deleting account.php" target="_blank" style="color:green;"><b>Click Here</b></a></p><br/>
<center>
</form>
</center>
<?php
if($_POST)
{
$temp=0;
$host="localhost";$user="root";$password="";$dbname="test";
$conn=mysqli_connect($host,$user,$password,$dbname);
$name=$_POST['1'];
$password=$_POST['2'];
$table='details';
$query="select * from $table";
$result=mysqli_query($conn,$query);
$nums=mysqli_num_rows($result);
if ($nums==0)
{
echo "<script>
document.getElementById('result').innerHTML='Invalid Username/Password!!';
</script>";
}
else
{
while($row=mysqli_fetch_assoc($result)){
if($row['firstname']==$name && $row['PSWD']==$password)
$temp++;
}
if($temp==1)
header("location:successfully loginned.html");
else
echo "<script>
document.getElementById('result').innerHTML='Invalid Username/password';
</script>";
}
}
?>
</body>
</html>
