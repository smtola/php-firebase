<?php
    session_start();
    include "./includes/dbconfig.php";

    if(isset($_POST['submitBtn'])){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        
        $postData = [
            'name' => $name,
            'gender' => $gender,
            'age' => $age
        ];

        $ref_table = "testing";
        $postRef = $database->getReference($ref_table)->push($postData);

        if($postRef){
            $_SESSION['status'] = "Testing added successfully!";
            header('location:index.php');
        }else{
            $_SESSION['status'] = "Testing Not added!";
            header('location:index.php');
        }
    }
?>