<!-- Navneet Kaur(8622734) -->
<?php

extract($_POST);
 if(isset ($save))
 {
	//validation here
    $pattern = '/^(([0-9A-Za-z]+)[-]?([0-9A-Za-z]*)(?<!-)(\.))+([a-zA-Z]{2,})$/';
    //if pattern matches then print value and success message
	if(preg_match($pattern, $text)) 
	{
		echo "<p>RegExp Value: <br> $text</p>";
        echo "<p>SUCCESS<p>";
	} else 
	{
		//otherwise
		echo "<p>Invalid Entry!<p>";
	}
}
?>

<html>
    <head>
      <title>Hexadecimal Number</title>  
    </head>
	<body>
		<form action="regex.php" method="post">
			Enter Data Here:<input type="text" name="text"><br><br>
			<input type="submit" name="save" value="submit" >
		</form>
	</body>


</html>