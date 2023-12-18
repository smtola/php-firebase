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
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "./includes/dbconfig.php";
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
                        <button class="btn link-primary">Edit</button>
                        <button class="btn link-danger">delete</button>
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