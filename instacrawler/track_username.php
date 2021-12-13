<!DOCTYPE html>
<html>
<?php
$host="localhost";
$user="root";
$password="";

// Create connection
$conn = new mysqli($host, $user, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $stmt = $conn->prepare("INSERT INTO instacrawler.tracked_usernames (username, insertDate) VALUES (?, CURDATE())");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        echo 'User '.$username.' has been successfully inserted for tracking!';
    }
    else{
        echo 'Error, username not set!';
    }
}
?>
    <head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/form.css" />
  </head>

</html>
