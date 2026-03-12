<?php include "config.php"; session_start();
if(!isset($_SESSION['user'])) header("Location:index.php");

$p=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM patients"));
$a=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM appointments"));
$r=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM records"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
body{background:#0d1b2a;color:white;font-family:Arial;margin:0;}
.nav{background:#1b263b;padding:15px;text-align:center;}
.nav a{color:white;margin:15px;text-decoration:none;font-weight:bold;}
.container{padding:40px;text-align:center;}
.card{
display:inline-block;
background:#415a77;
padding:30px;
margin:20px;
border-radius:15px;
width:200px;
}
</style>
</head>
<body>
<div class="nav">
<a href="dashboard.php">Dashboard</a>
<a href="patients.php">Patients</a>
<a href="appointments.php">Appointments</a>
<a href="records.php">Records</a>
<a href="logout.php">Logout</a>
</div>

<div class="container">
<h1>Hospital Dashboard</h1>
<div class="card">Total Patients<br><h2><?= $p ?></h2></div>
<div class="card">Appointments<br><h2><?= $a ?></h2></div>
<div class="card">Records<br><h2><?= $r ?></h2></div>
</div>
</body>
</html>