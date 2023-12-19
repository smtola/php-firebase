<?php
    session_start();
?>
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
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        </nav>
    
        <div class="collapse" id="navbarToggleExternalContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./login.php" tabindex="-1" aria-disabled="true">Login</a>
            </li>
          </ul>
        </div>
        
        <?php
            if(isset($_SESSION['status'])){
                echo '<h4 class="alert alert-success">'.$_SESSION['status'].'</h4>';
                unset($_SESSION['status']);
            }
        ?>
    <form action="./code.php" method="post">
        <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control"  placeholder="Enter Name" name="name">
        <label for="name">Name</label>
        </div>
        <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control"  placeholder="Enter Gender" name="gender">
        <label for="gender">Gender</label>
        </div>
        <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control"  placeholder="Enter Age" name="age">
        <label for="age">Age</label>
        </div>
        <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
    </form>
        
    <div class="card mt-5" style="width: 25rem;">
    <div class="card-body">
     <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col" class="text-warning text-end">
                <?php
                    include "../includes/dbconfig.php";

                    $ref = "testing/";
                    $totalrow = $database->getReference($ref)->getSnapshot()->numChildren();
                ?>
                    Total No : <?php echo $totalrow?>
            </th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                $ref = 'testing/';
                $fetchData = $database->getReference($ref)->getValue();
                $i =0;
                foreach($fetchData as $key => $row){
                    $i++;
            ?>
            <tr>
                <th scope="row"><?php echo $i;?></th>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><?php echo $row['age'];?></td>
                <td>
                    <div class="btn-group">
                        <a href="edit.php?token=<?php echo $key;?>" class="btn link-primary">Edit</a>

                        <form action="code.php" method="post">
                            <input type="hidden" name="ref-take-delete" value="<?php echo $key;?>">
                            <button name="delete-data" class="btn link-danger">delete</button>
                        </form>
                    </div>
                </td>        
            </tr>
            <?php }?>        
        </tbody>
        </table>
    </div>
</div>
    </div>
</body>
</html>