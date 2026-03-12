<?php include "config.php"; session_start();
if(!isset($_SESSION['user'])) header("Location:index.php");

if(isset($_POST['add'])){
mysqli_query($conn,"INSERT INTO patients(first_name,last_name,gender,age,phone,address)
VALUES('$_POST[f]','$_POST[l]','$_POST[g]','$_POST[a]','$_POST[p]','$_POST[ad]')");
}

$search="";
if(isset($_POST['search'])){
$search=$_POST['search'];
$r=mysqli_query($conn,"SELECT * FROM patients WHERE first_name LIKE '%$search%'");
}else{
$r=mysqli_query($conn,"SELECT * FROM patients");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Patients</title>
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
body{background:#0d1b2a;color:white;font-family:Arial;}
form,input,button{padding:8px;margin:5px;border-radius:6px;border:none;}
button{background:#00b4d8;color:white;}
table{width:80%;margin:auto;background:white;color:black;border-collapse:collapse;}
th,td{padding:10px;border:1px solid #ccc;}
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
<h2 align="center">Patients</h2>

<form method="POST" align="center">
<input name="f" placeholder="First">
<input name="l" placeholder="Last">
<input name="g" placeholder="Gender">
<input name="a" placeholder="Age">
<input name="p" placeholder="Phone">
<input name="ad" placeholder="Address">
<button name="add">Add</button>
</form>

<form method="POST" align="center">
<input name="search" placeholder="Search Name">
<button>Search</button>
</form>

<table>
<tr><th>Name</th><th>Gender</th><th>Age</th></tr>
<?php while($row=mysqli_fetch_assoc($r)){ ?>
<tr>
<td><?= $row['first_name']." ".$row['last_name'] ?></td>
<td><?= $row['gender'] ?></td>
<td><?= $row['age'] ?></td>
</tr>
<?php } ?>
</table>
</body>
</html>