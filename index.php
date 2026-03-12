<?php include "config.php"; session_start();
if(isset($_POST['login'])){
$email=$_POST['email'];
$pass=md5($_POST['password']);
$q=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$pass'");
if(mysqli_num_rows($q)>0){
$_SESSION['user']=$email;
header("Location: dashboard.php");
}else{ echo "<script>alert('Wrong Login')</script>"; }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>EHR Login</title>

<style>
body{
margin:0;
font-family:Arial;

/* Background hospital image soft */
background:
linear-gradient(rgba(13,27,42,0.85), rgba(27,38,59,0.85)),
url("https://images.unsplash.com/photo-1586773860418-d37222d8fce3");

background-size:cover;
background-position:center;
display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
height:100vh;
color:white;
}

/* Heading juu */
.header{
position:absolute;
top:40px;
text-align:center;
}

.header h1{
margin:0;
font-size:32px;
letter-spacing:2px;
color:#90e0ef;
}

.header p{
margin-top:5px;
color:#caf0f8;
}

/* Card */
.card{
background:rgba(255,255,255,0.08);
padding:40px;
border-radius:18px;
backdrop-filter:blur(8px);
width:320px;
text-align:center;
box-shadow:0 0 20px rgba(0,0,0,0.3);
}

/* Inputs */
input{
width:100%;
padding:12px;
margin:10px 0;
border:none;
border-radius:8px;
background:rgba(255,255,255,0.9);
}

/* Button */
button{
width:100%;
padding:12px;
background:#00b4d8;
border:none;
color:white;
border-radius:8px;
font-weight:bold;
cursor:pointer;
transition:0.3s;
}

button:hover{
background:#0096c7;
}
</style>
</head>

<body>

<div class="header">
<h1>Electronic Health Record</h1>
<p>Smart Hospital Management System</p>
</div>

<div class="card">
<h2>Login</h2>
<form method="POST">
<input name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form>
</div>

</body>
</html>