<!-- <?php 
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
?>  -->

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
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

	

<h2 style="text-align: center;">Change Password</h2>

<form method="post" action="server.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<!-- <div class="input-group">
		<label>First Name</label>
		<input type="text" name="firstname" value="<?php echo $firstname; ?>">
	</div>
	<div class="input-group">
		<label>Last Name</label>
		<input type="text" name="lastname" value="<?php echo $lastname; ?>">
	</div> -->
	<div class="input-group">
		<label>User Email</label>
		<input type="text" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>Current Password</label>
		<input type="password" name="password" value="<?php echo $password; ?>">
	</div>
	<div class="input-group">
		<label>New Password</label>
		<input type="text" name="new_password" >
	</div>
	<div class="input-group">
		<label>Confirm Password</label>
		<input type="text" name="confirm_password">
	</div>
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>