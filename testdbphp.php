<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Northland Analytics PHP/MySQL Test Page</title>
</head>
<body>

<h1>Northland Analytics PHP/MySQL Test Page</h1>

<?php

// this is the php object-oriented style of creating a MySQL connection
$conn = new mysqli('localhost', 'ahmed1', 'ahmed1234', 'employees');

// check for connection success
if ($conn->connect_error) {
    die("MySQL Connection Failed: " . $conn->connect_error);
}
echo "MySQL Connection Succeeded<br><br>";

// create the SQL select statement, including hire_date
$sql = "SELECT first_name, last_name, hire_date FROM employees WHERE last_name = 'Weedman'";

// put the resultset into a variable
$result = $conn->query($sql);

// if there were no records found say so, otherwise create a while loop
if ($result->num_rows > 0) {
    // print rows of records found in the database if any
    while ($row = $result->fetch_assoc()) {
        echo "Employee: " . $row["first_name"] . " " . $row["last_name"] . ", Hire Date: " . $row["hire_date"] . "<br>";
    }
} else {
    echo "No Records Found";
}

// always close the connection to the DB
$conn->close();

?>

<!-- Add a hyperlink to the mysqli documentation -->
<p>For more information on connecting PHP to MySQL, <a href="https://www.php.net/manual/en/book.mysqli.php" target="_blank">click here</a>.</p>

</body>
</html>
