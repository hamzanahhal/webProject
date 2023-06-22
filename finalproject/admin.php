<?php
include_once 'db.php';
session_start();


if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 1) {
    header("Location: login.php");
    exit();
}

$query = "SELECT id, name, email FROM users";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
</head>
<body>
    <h2>User Management</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
      
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a>
                        <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>

    <style>
        /* Apply basic styles to the table */
body {
  font-family: Arial, sans-serif;
  background-color: #F5EFE7;
  padding: 20px;
}

h2 {
  text-align: center;
  color: #4F709C;
}

table {
  width: 100%;
  border : 2px solid black ;
  border-collapse: collapse;
  margin-top: 20px;
}

/* Style the table header */
th {
  background-color: #D8C4B6;
  padding: 10px;
  text-align: left;
}

/* Style the table cells */
td {
  padding: 10px;
}

/* Style the action links */
a {
  margin-right: 10px;
  text-decoration: none;
  color: #4F709C;
}

a:hover {
  text-decoration: underline;
  color: #FF0060;
}

/* Style the message for no records */
td[colspan="4"] {
  text-align: center;
  padding: 10px;
  color: #999999;
}

    </style>
</body>
</html>

<?php

$conn->close();
?>
