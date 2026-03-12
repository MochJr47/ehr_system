<?php include "config.php"; session_start();
if(!isset($_SESSION['user'])) header("Location:index.php");

if(isset($_POST['save'])){
mysqli_query($conn,"INSERT INTO records(patient_id,doctor_id,diagnosis,prescription,visit_date)
VALUES('$_POST[p]','$_POST[d]','$_POST[diag]','$_POST[pres]',NOW())");
}
?>

<!DOCTYPE html>
<html>
<head>
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
body{background:#0d1b2a;color:white;font-family:Arial;text-align:center;}
input,button{padding:8px;margin:5px;border-radius:6px;border:none;}
button{background:#00b4d8;color:white;}
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
<h2>Add Medical Record</h2>
<form method="POST">
Patient ID <input name="p">
Doctor ID <input name="d">
Diagnosis <input name="diag">
Prescription <input name="pres">
<button name="save">Save</button>
</form>
</body>
</html>