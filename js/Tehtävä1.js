
<html lang="en">
<head>
<title>First JavaScript Page</title>
</head>
<body>
<h1>Welcome!</h1>
<p id="greeting"></p>

<script>
// Enter your JavaScript code here
let myName = "Yan";
const date = new Date("July 20, 2001");
let myBirthYear = date.getFullYear();

document.getElementById("greeting").innerHTML = "Hello, my name is " + myName + " and I was born in " + myBirthYear + ".";
</script>
</body>
</html>