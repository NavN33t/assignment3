<!-- Navneet Kaur(8622734) -->

<?php
$errors=[];
if($_SERVER['REQUEST_METHOD']=='POST'){
    //checking for empty fields
     if((empty($_POST['username'])) || (empty($_POST['password'])) || (empty($_POST['city'])) || (empty($_POST['country'])))
   {
      $errors[]= "All Fields Are Required!";	
   }
else{
   if(isset($_POST['username'])){
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    //validation here
     $username_regexp="/[a-zA-Z0-9]{4,}/";
  
     //if pattern matches the condition of validation then print username
       if(preg_match($username_regexp,$username)){
       echo $username;
}
     else 
     {
         //otherwise print else condition
           $errors[]="<p>UserName Must Be 4 Characters Long!</p>";
          }			
	
}
 //checking for empty field and setting up the length of the string
        if(isset($_POST['password']) && strlen($_POST['password'])>=6)
            {
     $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	    }
else
{
    //otherwise else condition will be printed
	$errors[]="<p>Password Should Be 6 In Length!</p>";
}
     if(isset($_POST['city']) && isset($_POST['country']))
     {
     $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
     $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
    $city_regexp="/[a-zA-Z]{3,}/";


   if(preg_match($city_regexp,$city))
   {}
    else {
       $errors[]="<p>City Name Should Be Alphabetic & It Should Be 3 In Length!</p>";
         }


      $country_regexp="/[a-zA-Z0-9]{4,}/";

        if(preg_match($country_regexp,$country))
        {}
             else {
               $errors[]="<p>Country Name Should Be Alphabetic & It Should Be 4 In Length!";
                  }
         }
else
{
	$errors[]="Invalid City Name & Country Name";
}
        if(isset($_POST['age']) && filter_var($_POST['age'], FILTER_VALIDATE_INT,  
          array("options"=> array("min_range"=>18,"max_range" =>120)))== true)
	{
		$age=$_POST['age'];
		
    }
    
else
      {
        $errors[]="<p>Age Should Between In 18-120 !</p>";
      }
}
if(empty($errors))
{
	echo "<p>SUCCESS!</p>";
	echo "<p>USER NAME - $username</p> 
    <p>PASSWORD - $password</p> 
    <p>AGE - $age</p> 
    <p>CITY - $city</p> 
    <p>COUNTRY - $country</p>";
}
else 
{
	foreach($errors as $error){
		echo "$error";
}
}
}
?>
<html>
<head>
 </head><title>HTML5 FORM</title></head>
<body>
     
<form action="submit.php" method="post">

<label>User Name: </label>
<input name="username" type="text"><br><br>
<label>Age: </label>
<input name="age" type="text"><br><br>
<label>Password: </label>
<input name="password" type="text"><br><br>
<label>City: </label>
<input name="city" type="text"><br><br>
<label>Country: </label>
<input name="country" type="text"><br><br>
<input name="Submit" type="submit" value="Submit">
</form>
</body>
</html>