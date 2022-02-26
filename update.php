<?php
    require('dbconnect.php');
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phonetic = $_POST['phonetic'];
    $postalcode = $_POST['postalcode'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $sql = "UPDATE members SET name = '$name' ,phonetic = '$phonetic' ,postalcode = '$postalcode' ,address = '$address' ,phonenumber = '$phonenumber'  WHERE email = '$email' ";
    $stmt = $db->prepare($sql);  
    $stmt->execute();
    $url = "edit_complete.php";
    header("Location: {$url}");
    exit;
?>