<?php
    session_start();
    include "./includes/dbconfig.php";

    // register
        if(isset($_POST['onSave'])){
            $uname = $_POST['uname'];
            $phn = $_POST['phn'];
            $email = $_POST['email'];
            $pass = $_POST['pwd'];

            $userProperties = [
                'email' => $email,
                'emailVerified' => false,
                'phoneNumber' => '+855'.$phn,
                'password' => $pass,
                'displayName' => $uname,
            ];
            
            $createdUser = $auth->createUser($userProperties);

            if($createdUser){
                $_SESSION['status'] = "User added successfully!";
                header('location:register.php');
                exit();
            }else{
                $_SESSION['status'] = "User Not added!";
                header('location:register.php');
                exit();
            }
        }
    // end

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
            $_SESSION['status'] = "Data added successfully!";
            header('location:index.php');
        }else{
            $_SESSION['status'] = "Data Not added!";
            header('location:index.php');
        }
    }

    if(isset($_POST['onEdit'])){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $token = $_POST['token'];
        $postData = [
            'name' => $name,
            'gender' => $gender,
            'age' => $age
        ];

        $ref_table = "testing/".$token;

        $postRef_edit = $database->getReference($ref_table)->update($postData);

        
        if($postRef_edit){
            $_SESSION['status'] = "Data update successfully!";
            header('location:index.php');
        }else{
            $_SESSION['status'] = "Data Not update!";
            header('location:index.php');
        }
    }

    if(isset($_POST['delete-data'])){
        $token = $_POST['ref-take-delete'];
        $ref_table = "testing/".$token;
        $ref_delete = $database->getReference($ref_table)->remove();

        if($ref_delete){
            $_SESSION['status'] = "Data Delete successfully!";
            header('location:index.php');
        }else{
            $_SESSION['status'] = "Data cannot delete!";
            header('location:index.php');
        }
    }
?>