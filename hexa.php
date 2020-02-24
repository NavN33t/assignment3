<!-- Navneet Kaur(8622734) -->

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    $error=0;
    //
     $pattern = '/^[0-9A-Fa-f]{4}_*/';
    $sub=$_POST['subject'];
    
    //if pattern matches then print success
    if(preg_match($pattern,$sub))
    {
		echo "SUCCESS!";
	}
    else
    {
        //otherwise
		echo "INVALID ENTRY!";
	}	
}
?>
<html>
<head><title>Hexadecimal Number</title>
</head>
<body>
<form action="hexa.php" method="post">
    <label>Enter Any Hexadecimal Number:</label>
    <input type="text" name="subject" maxlength="4" ><br><br>
    <input type="submit" name="submit" value="Check">
</form>
</body>
</html>