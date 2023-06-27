<?php
// include_once 'db.php';
// $id = $_GET['view'];
// $query = "SELECT * FROM log WHERE id = $id";
// $result = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($result);
?>

<!-- <!DOCTYPE html> 
<html> 
<head> 
	<title>Student Details</title> 
	<style>
		table, td, th {
			border: 1px solid black;
			border-collapse: collapse;
		}
        a {
            text-decoration: none;
            color: black;
        }
	</style>
</head> 
<body> 
<a href="home.php"><input type="submit" class="btn btn-primary"  value="HOME"></a>

	<h2>Student Details</h2> 
	<table> 
		<tr> 
			<th>ID</th> 
			<th>Email</th> 
            <th> User Name </th> 
            <th> DOB </th>
            <th> BATCH </th>

		</tr> 
		<tr>
			<td><?php echo $row['id']; ?></td> 
			<td><?php echo $row['email']; ?></td> 
			<td><?php echo $row['username']; ?></td> 
            <td><?php echo $row['dob'];?></td>
            <td><?php echo $row['batch'];?></td>
		</tr> 
	</table>
	<br>
<a href="view.php"><input type="submit" class="btn btn-primary"  value="back"></a>

	
</body> 
</html> -->

<?php
session_start();

include_once 'db.php';
$id = $_GET['view'];
$query = "SELECT * FROM log WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html> 
<html> 
<head> 
    <title>Student Details</title> 
    <style>
        table, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head> 
<body> 
<a href="home.php"><input type="submit" class="btn btn-primary"  value="HOME"></a>

    <h2>Student Details</h2> 
    <table> 
        <tr> 
            <th>ID</th> 
            <th>Email</th> 
            <th>User Name</th> 
            <th>DOB</th>
            <th>BATCH</th>
            <th>Profile Image</th>
        </tr> 
        <tr>
            <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['email']; ?></td> 
            <td><?php echo $row['username']; ?></td> 
            <td><?php echo $row['dob']; ?></td>
            <td><?php echo $row['batch']; ?></td>
            <td>
                <?php
                if ($row['image']) {
                    $image_path = 'profile/' . $row['image'];
                    echo '<img src="' . $image_path . '" width="100" height="100" alt="Profile Image">';
                } else {
                    echo 'No image available';
                }
                ?>
            </td>
        </tr> 
    </table>
    <br>
    <a href="view.php"><input type="submit" class="btn btn-primary"  value="back"></a>

    
</body> 
</html>
