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

    	echo " Thanks for sumitting your form. we are happy to see you joining us for the us trip";
    }
    else{
    	echo "ERROR: $sql <br> $con->error";

    }

    //close the database connection
    $con->close();
}
 ?>


