<?php

include 'connection.php';
include 'Password.php';


$name = $_POST['full_name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$conpass = $_POST['confirm_password'];

if (is_same($pass , $conpass) != true){
    echo 'Password must be same';
    exit;
}
elseif (isStrongPassword($pass) != true){
    echo 'Password must contain at least 8 characters, at least one uppercase letter, one lowercase letter, and one number.';
    exit;
}

$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);


try{               //Checking Registered user or not
    $sql = "SELECT * FROM Login_info WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Password is correct, user is authenticated
        echo "Already Registerd. Try Sign in ";
        exit();
    }}catch(PDOException $e){
        echo"Something Went Wrong! Plss Try Again.";
    }

try{
    $sql = "INSERT INTO Login_info(Name , Email , Password) VALUES ('$name','$email','$hashedPassword')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();    
    echo"Registered Successfully";
}catch(PDOException $e){
    echo "Something went Wrong!";
}

exit;
?>