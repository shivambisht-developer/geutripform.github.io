<!-- PHP CODE -->
<?php 
$insert=false;
if(isset($_POST['name'])){
	
	 //set connection variable
   $server ="localhost";
   $username ="root";
   $password ="";

   //create a database connection
   $con = mysqli_connect($server, $username, $password);

   //check for connection success
   if(!$con){
   	die("connection to this database failed due to". mysqli_connect_error());
   }
   
   //collect post variables
   $name =$_POST['name'];
   $gender =$_POST['gender'];
   $age =$_POST['age'];
   $email =$_POST['email'];
   $phone =$_POST['phone'];
   $desc =$_POST['desc'];
   
    $sql = "INSERT INTO `us`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;


    //execute the query
    if($con->query($sql)==true){
    	//echo "Successfully inserted";

    	//flag for successful insertion
    	$insert= true;
    }
    else{
    	echo "ERROR: $sql <br> $con->error";

    }

    //close the database connection
    $con->close();
}
 ?>


<!-- HTML CODE -->
 <!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome To Travel Form</title>
	 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&family=Sriracha&display=swap" rel="stylesheet"> 
	 <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="style.css">
</head>


<body>
	<img class="bg img-fluid" src="project image/jp2.jpg" alt="college image">
 <div class="container">
   <h1>Welcome to GEU travel US trip form</h1>
   <p>Enter your details and submit this form to confirm your participation in the trip</p>
   <?php
   if($insert == true){
   echo "<p class='sumitmsg'>Thanks for sumitting your form. we are happy to see you joining us for the us trip</p>";
   }
   ?>
   <form action="project.php" method="post" accept-charset="utf-8">
   	<input type="text" name="name" id="name" placeholder="Enter your name">
   	<input type="text" name="age" id="age" placeholder="Enter your age">
   	<input type="text" name="gender" id="gender" placeholder="Enter your gender">
   	<input type="email" name="email" id="email" placeholder="Enter your email">
   	<input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
   	<textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
   	<button class="btn">SUBMIt</button>
   </form>

 </div>
</body>

</html>
