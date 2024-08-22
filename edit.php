<?php
include "db_conn.php";
$id = $_GET['id'];
if (isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: index.php?msg= data updated successfully");
    }else{
        echo "failed : " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP crud app</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- FONT AWESOME  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: paleturquoise;">
        PHP Crud APP
     </nav>
     <div class="container">
        <div class="text-center mb-4">
            <h3> Edit user info </h3>
            <p class="text-muted">
                click update after changing any information
            </p>
        </div>
        <?php 
       
        $sql = " SELECT * FROM crud  WHERE id = $id LIMIT 1";
        $result = mysqli_query( $conn , $sql);
        $row = mysqli_fetch_assoc($result);
        
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width :300px;">
                <div class="row">
                    <div class="col">
                        <label  class="form-label">First Name : </label>
                        <input type="text" class="from-control" name="first_name" value="<?php echo $row['first_name']?>">
                        
                    </div>
                    <div class="col">
                        <label  class="form-label">Last Name : </label>
                        <input type="text" class="from-control" name="last_name" 
                        value="<?php echo $row['last_name'] ?> ">
                        
                    </div>

                </div>
                <div class="mb-3">
                    <label class="form-laber">Email: </label>
                    <input type="email" class="form-control" name="email" 
                    value="<?php echo $row['email'] ?> ">
                </div>
                <div class="form-group mb-3">
                    <label>Gender : </label>
                    <input type="radio" name="gender" id="male" value="male" class="form-check-input" <?php echo($row['gender']=='male')? "checked" :""; ?> >
                    <label for="male" class=" form-input-label">Male</label>

                    <input type="radio" name="gender" id="female" value="female" class="form-check-input" <?php echo($row['gender']=='female')? "checked" :""; ?> >
                    <label for="female" class=" form-input-label">Female</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">cancel</a>
                </div>
            </form>
        </div>

     </div>
    <!-- BOOTSTRAP -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>