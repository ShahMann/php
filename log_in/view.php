<?php
session_start();

include_once 'db.php';
$query = "SELECT * FROM log";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html> 
<html> 
<head> 
	<title> STUDENT DATA </title> 
	<style>
		table, td, th {
			border: 1px solid black;
			border-collapse: collapse;
			width: auto fit-content;
			
		}
		a {
			text-decoration: none;
			color: black;
		}
		.col{
			color: red;
		}
	</style>
</head> 
<body> 
<a href="home.php"><input type="submit" class="btn btn-primary"  value="HOME"></a>


	<table align="center"> 
		<tr class="col"> 
			<th colspan="9"><h2>Student Record</h2></th> 
		</tr> 
		<tr> 
			<th> ID </th> 
			<th> FIRST NAME </th> 
			<th> LAST NAME </th> 
			<th> VIEW</th>
			<th> EDIT </th>
			<th> DELETE </th>
		</tr> 
		<?php
		while($row = mysqli_fetch_assoc($result)) { 
		?> 
		<tr>
			<td><?php echo $row['id']; ?></td> 
			<td><?php echo $row['email']; ?></td> 
			<td><?php echo $row['username']; ?></td> 
			<td><button><a href="detailedview.php?view=<?php echo $row["id"]; ?>">View</a></button></td>
			<td><button><a href="edit.php?edit=<?php echo $row["id"]; ?>">Edit</a></button></td>
			<td><button><a href="delete.php?delete=<?php echo $row["id"]; ?>">Delete</a></button></td>
		</tr> 
		<?php } ?> 
	</table>
	<button type="submit" class="delete_btn"><a href="deleteall.php?all=<?php echo$row["id"]; ?>">Delete All Data</a></button>
</body> 
</html>
