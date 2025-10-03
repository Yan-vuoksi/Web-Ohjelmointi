<?php
// Checking if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Add the code below that receives the form data
$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

//Correct and complete the if statement below that checks the username and password:
if ($username == "admin" && $password == "cat123") {
//Login was successful
echo"<title>Welcome Admin</title>";
echo"<h1>Welcome Admin!</h1>";
echo "<body>You will be redirected to the salary calculator in a few seconds...</body>";
echo '<meta http-equiv="refresh" content="2; url=palkkalaskuri.php">';
exit();

} 
else {
//Login failed
echo "Invalid username or password.";
}
}
?>