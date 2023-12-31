<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
        <?php
            session_start();
            if(isset($_SESSION['status'])){
                echo '<h4 class="alert alert-success">'.$_SESSION['status'].'</h4>';
                unset($_SESSION['status']);
            }

            $token = $_GET['token'];
            include "../includes/dbconfig.php";

            $ref = "testing/";
            $getData = $database->getReference($ref)->getChild($token)->getValue();
        ?>
    <form action="./code.php" method="post">
        <input type="hidden" name="token" value="<?php echo $token?>">
        <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" value="<?php echo $getData['name'];?>"  placeholder="Enter Name" name="name">
        <label for="name">Name</label>
        </div>
        <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control" value="<?php echo $getData['gender'];?>"   placeholder="Enter Gender" name="gender">
        <label for="gender">Gender</label>
        </div>
        <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control" value="<?php echo $getData['age'];?>"   placeholder="Enter Age" name="age">
        <label for="age">Age</label>
        </div>
        <button type="submit" name="onEdit" class="btn btn-primary">Save</button>
        <a type="button" href="index.php"  class="btn btn-danger">back</a>
    </form>
</div>
</body>
</html>