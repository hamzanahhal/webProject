<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form action="register_process.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="user_type">User Type:</label>
        <select id="user_type" name="user_type">
            <option value="2">Regular User</option>
            <option value="1">Administrator</option>
        </select><br><br>

        <input type="submit" value="Create">
    </form>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #4F709C;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        }

        /* Style the form inputs */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #213555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        /* Style the submit button */
        input[type="submit"] {
            background-color: #4F709C;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #35648C;
        }
    </style>


</body>
</html>
