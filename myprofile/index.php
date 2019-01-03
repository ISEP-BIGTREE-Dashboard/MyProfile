<?php 
include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record == 1)) {
			$n = mysqli_fetch_array($record);
			$firstname = $n['firstname'];
			$lastname = $n['lastname'];
			$email = $n['email'];
			$password = $n['password'];
			$address = $n['address'];
			$usertype = $n['usertype'];
		}

	}
?>

<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
<!-- <?php $row = mysqli_fetch_array($results); ?> -->


<!DOCTYPE html>
<html>
<head>
	<title>Profile page </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
</head>
<body>
	
	<ul class="top-nav">
	<?php $row = mysqli_fetch_array($results) ?>

    <li><a href="#">SuperUser</a>
        <ul>
            <li><a href="myprofile.php">Add User</a></li>
            <li><a href="edit-myprofile.php?edit=<?php echo $row['id']; ?>" >Edit My Profile</a></li>
            <li><a href="change_password.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Change Password</a></li>
        </ul>
    </li>
    <li><a href="#">Admin Dashboard</a>
        <ul>
            <li><a href="show-user.php">User tables</a></li>
            <li><a href="admin-table.php">Admin tables</a></li>
        </ul>
    </li>
    <li><a href="#">Support</a></li>
    <li><a href="#">FAQ</a></li>
    <li><a href="#">Home</a></li>
    <?php ?>
</ul><br><br>

</body>
</html>