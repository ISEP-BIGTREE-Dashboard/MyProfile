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

<table>
	<thead>
		<tr>   
		    <th>ID</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th>Email</th>
			<th>Password</th>
			<th>Address</th>
			<th>UserType</th>
			<th colspan="5">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
	

		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['firstname']; ?></td>
			<td><?php echo $row['lastname']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['password']; ?></td> 
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['usertype']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
</body>
</html>