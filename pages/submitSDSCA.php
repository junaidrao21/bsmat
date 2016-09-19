<?php
ini_set('display_errors', 1);
$server = 'localhost';
$user = 'root';
$pass = 'password';
$conn = mysqli_connect($server,$user, $pass);
$sql = 'CREATE Database IF NOT EXISTS test';
mysqli_query($conn,$sql);
mysqli_select_db($conn,'test');

$sql1 = "CREATE TABLE IF NOT EXISTS sdsca(
id INT(6) UNSIGNED PRIMARY KEY, 
Q1 INT(6) NOT NULL,
Q2 INT(6) NOT NULL,
Q3 INT(6) NOT NULL,
Q4 INT(6) NOT NULL,
Q5 INT(6) NOT NULL,
Q6 INT(6) NOT NULL,
Q7 INT(6) NOT NULL,
Q8 INT(6) NOT NULL,
Q9 INT(6) NOT NULL,
Q10 INT(6) NOT NULL,
Q11 INT(6) NOT NULL,
Q12 INT(6)

)";
mysqli_query($conn,$sql1);
mysqli_query($conn,"INSERT INTO sdsca (id,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,Q11,Q12) VALUES ('$_POST[subjectID]','$_POST[sdsca1]','$_POST[sdsca2]','$_POST[sdsca3]','$_POST[sdsca4]','$_POST[sdsca5]','$_POST[sdsca6]','$_POST[sdsca7]','$_POST[sdsca8]','$_POST[sdsca9]','$_POST[sdsca10]','$_POST[sdsca11]','$_POST[sdsca12]')");
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
Go to <a href="index.html">index.html</a>
</body>
</html>