<?php
include './includes/dbconn.php';

if (isset($_POST['username']) && $_POST['password']) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
}
if (empty($fname && $email && $username && $password)) {
    echo "<script>alert('Please fill up the form');
    window.location.href='buyer.php'</script>";
}

$sql = "INSERT INTO alldetails(fullname,email,username,password)
    VALUES ('$fname','$email','$username',PASSWORD('$password'))";

$sql1 = "INSERT INTO users(username,password) VALUES ('$username','$password')";
if ($mysqli->query($sql) > 0) {
    if ($mysqli->query($sql1) > 0) {
        echo "<script>alert('User Registered Successfully');
    window.location.href='login.php'</script>";
    }
} else {
    echo "<script>alert('Error while registering');
    </script>";
}
