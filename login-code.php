<?php

use Firebase\Auth\Token\Exception\InvalidToken;

    session_start();
    include './includes/dbconfig.php';
    if(isset($_POST['onLogin'])){
        $email = $_POST['email'];
        $pass = $_POST['pwd'];

        try {
            $user = $auth->getUserByEmail("$email");

           try{
            $signInResult = $auth->signInWithEmailAndPassword($email, $pass); 
            $idTokenString = $signInResult ->idToken();;

            try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $_SESSION['idTokenString'] = $idTokenString;

                $_SESSION['status'] = "login success";
                header("Location:./index.php");
                exit();
            } catch (InvalidToken $e) {
                echo 'The token is invalid: '.$e->getMessage();
            } catch(\InvalidArgumentException $e){
                echo 'The token could not be parsed: '.$e->getMessage();
            }

           }catch(Exception $e){
            $_SESSION['status'] = 'Wrong password!';
            header("location:./login.php");
            exit();
           }
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            $_SESSION['status'] = 'Invalid username or password!';
            header("location:./login.php");
            exit();
        }
    }else
    {
        $_SESSION = 'not allowed';
        header("location:./login.php");
        exit();
    }
?>