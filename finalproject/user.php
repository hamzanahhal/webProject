<?php
include_once 'db.php';


session_start();





$userId = $_SESSION['user_id'];






$stmtUser = $conn->prepare("SELECT id, name, email FROM users WHERE id = ?");
$stmtUser->bind_param("i", $userId);


$stmtUser->execute();


$result = $stmtUser->get_result();


if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
} else {

    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
</head>
<body>
    <h2>User Page</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a>
                <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a>
            </td>
        </tr>
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
