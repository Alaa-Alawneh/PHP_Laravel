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

    
    <div class="w-100 d-flex justify-content-center h-auto align-items-center">
        <div class="w-50">
            <?php 
                if(isset($_GET['userAdded'])&& $_GET['userAdded']=='success'){
                    echo '<h1>user added successfully</h1><br>';
                }
        ?>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th >user id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>address</th>
                    <th>phone</th>
                </tr>
            </thead>
            <?php                 
                include_once("./src/db.php");
                include_once("./src/functions.php");
                $arr=getAllUsers($conn);
                for ($i= 0; $i < count($arr); $i++) {
                    echo '<tr><td>'.$arr[$i]->id.'</td><td>'.$arr[$i]->username.' </td><td>'.$arr[$i]->email.' </td><td>'.$arr[$i]->user_address.'</td><td> '.$arr[$i]->phone.'</td></tr>';
                }
            ?>
        </table>
        </div>
    </div>
    <?php 
    include("./src/includes/footer.php");
    ?>
</body>
</html>