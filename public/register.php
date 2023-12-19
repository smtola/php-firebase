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
    <div class="container mt-5">
    <?php
            session_start();
            if(isset($_SESSION['status'])){
                echo '<h4 class="alert alert-success">'.$_SESSION['status'].'</h4>';
                unset($_SESSION['status']);
            }
        ?>
    <form action="code.php" method="post">
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Username" name="uname">
            <label for="uname" class="form-label">Username</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input type="number" class="form-control" placeholder="Phone Number" name="phn">
            <label for="phn" class="form-label">Phone Number</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input type="email" class="form-control" placeholder="Email Address" name="email"  aria-describedby="emailHelp">
            <label for="email" class="form-label">Email address</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input type="password" class="form-control" placeholder="Password" name="pwd">
            <label for="pwd" class="form-label">Password</label>
        </div>
        <button type="submit" name="onSave" class="btn btn-primary">Submit</button>
        <a type="button" href="./index.php" class="btn btn-warning">Back</a>
        </form>
    </div>
</body>
</html>