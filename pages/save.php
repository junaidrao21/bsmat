<?php
ini_set('display_errors', 1);
$server = 'localhost';
$user = 'root';
$pass = 'password';
$conn = mysqli_connect($server,$user, $pass);
$sql = 'CREATE Database IF NOT EXISTS test';
mysqli_query($conn,$sql);
mysqli_select_db($conn,'test');

$sql1 = "CREATE TABLE IF NOT EXISTS data(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Q1 VARCHAR(30) NOT NULL,
Q2 VARCHAR(30) NOT NULL,
Q3 VARCHAR(30) NOT NULL,
Q4 VARCHAR(30) NOT NULL,
Q5 VARCHAR(30) NOT NULL,
Q6 VARCHAR(30) NOT NULL,
Q7 VARCHAR(30) NOT NULL,
Q8 VARCHAR(30) NOT NULL,
Q9 VARCHAR(30) NOT NULL,
Q10 VARCHAR(30) NOT NULL,
Q11 VARCHAR(30) NOT NULL,
Q12 VARCHAR(30) NOT NULL,
Q13 VARCHAR(30) NOT NULL

)";
mysqli_query($conn,$sql1);
mysqli_query($conn,"INSERT INTO data (Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,Q11,Q12,Q13) VALUES ('$_POST[optionsRadiosInline]','$_POST[optionsRadiosInline2]','$_POST[optionsRadiosInline3]','$_POST[optionsRadiosInline4]','$_POST[optionsRadiosInline5]','$_POST[optionsRadiosInline6]','$_POST[optionsRadiosInline7]','$_POST[optionsRadiosInline8]','$_POST[optionsRadiosInline9]','$_POST[optionsRadiosInline10]','$_POST[optionsRadiosInline11]','$_POST[optionsRadiosInline12]','$_POST[optionsRadiosInline13]')");
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0;url=pages/index.html">
<title>BSMAT - Behavioral Survey Measurement & Analysis Tool</title>
<script language="javascript">
	alert("Response Added")
    window.location.href = "index.html"
</script>
</head>
<body>
Go to <a href="pam.html">index.html</a>
</body>
</html>