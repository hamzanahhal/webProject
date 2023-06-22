<?php
include_once 'db.php';
session_start();


$userId = $_GET['id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    



    
    $statmentUpdateUser = $conn->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
    $statmentUpdateUser->bind_param("sssi", $name, $email, $password, $userId);

    
    if ($statmentUpdateUser->execute()) {
        
        header("Location: admin.php");
        exit();
    } else {
    
        header("Location: edit_user.php?id=$userId&error=updateerror");
        exit();
    }
}






$stmtEdit = $conn->prepare("SELECT id, name, email FROM users WHERE id = ?");
$stmtEdit->bind_param("i", $userId);


$stmtEdit->execute();


$result = $stmtEdit->get_result();


if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
} else {

    header("Location: admin.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="edit_user.php?id=<?php echo $userId; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Update">
    </form>

    <style>
        /* Apply basic styles to the form */
        body {
  font-family: Arial, sans-serif;
  background-color: #F5EFE7;
}

h2 {
  text-align: center;
  color: #4F709C;
}

form {
  max-width: 400px;
  margin: 0 auto;
  background-color: #D8C4B6;
  padding: 20px;
  border-radius: 4px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
}

/* Style the form inputs */
input[type="text"],
input[type="email"],
input[type="password"] {
  width: 90%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

/* Style the submit button */
input[type="submit"] {
  background-color: #4F709C;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

/* Style the form labels */
label {
  display: block;
  font-weight: bold;
  color: #213555;
}

    </style>

</body>
</html>

<?php

$conn->close();


?>
