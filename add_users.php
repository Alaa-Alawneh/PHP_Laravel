<?php  
include_once("./src/db.php");
include_once("./src/functions.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    if ($name !== '' && $email !== '') {
        $addResult=addUser($conn,$name, $email, $address, $phone);
        if ($addResult) {
            header('Location: users.php?userAdded=success');
            exit;
        }
        else {
            header('Location: add_users.php?status=failed');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php 
    include("./src/includes/header.php");
    ?>
    <?php 
    include("./src/db.php");
    ?>
    
    <div class="w-100 d-flex justify-content-center  align-items-center">
        <div>
        <form action="add_users.php" method="post">
            Name: <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            address: <input type="text" name="address"><br>
            phone: <input type="text" name="phone"><br>
            <input type="submit">
        </form>
        <br>
        <?php
            if (isset($_GET["status"])&&$_GET['status']=='failed') {echo'<h1>duplicate email/bad input</h1>';}
        ?>
        </div>
    </div>
    <?php 
    include("./src/includes/footer.php");
    ?>

</body>
</html>