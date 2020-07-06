<html>
<head>
<title>deleting account</title>
<link rel="stylesheet" href="main Page.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<center>
<form method="post">
<center>
<i class="fa fa-user-circle" style="font-size:65px;color:green;"></i><br/>
<h2><b>Delete Account </b></h2>
<i class="fa fa-user-circle-o" style="color:green;font-size:20px;"></i>&ensp;&ensp;<input type="text" name="delete" placeholder="Username" required/><br/><br/>
<i class="fa fa-lock" style="color:green;font-size:24px;"></i>&ensp;&ensp;<input type="password" name="pass" placeholder="Password" required/><br/><br/>
<p id="result"></p>
<button type="submit"><b>Delete</b></button><br/>
</center>
</form></center>
<?php
if($_POST)
{
	$s=0;
	$username=$_POST['delete'];
	$pass=$_POST['pass'];
	$host="localhost";$user="root";$password="";$dbname="test";
	$conn=mysqli_connect($host,$user,$password,$dbname);
	$table="details";
	$query="select * from $table";
	$result=mysqli_query($conn,$query);
	$num=mysqli_num_rows($result);
	if($num>0)
	{
		while($row=mysqli_fetch_assoc($result))
	        {
			if($username==$row['firstname'] && $pass==$row['PSWD'])
			$s++;
	        }
	        if($s==1)
		{
			$query1="DELETE FROM details WHERE firstname='$username'";
			 mysqli_query($conn,$query1);
			header("location:deleted_successfully.html");
		}
		if($s==0)
		{
			echo "<script>
                              document.getElementById('result').innerHTML='Invalid Username/Password!!';
                              </script>";
		}
	}
	else
	{
		        echo "<script>
                              document.getElementById('result').innerHTML='There is no such account called $username in our database!!                                ';
                              </script>";
	}
}
?>
</html>
			
