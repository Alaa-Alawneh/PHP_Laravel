
<?php
function addUser(mysqli $conn,string $username,string $email,string $address,string $phone){
    $sql = "insert into users (username, email, user_address, phone)
    values ( '$username' ,'$email','$address','$phone' )";
    try {
    if($conn->query($sql)==true){
        return true;
    }}
    catch(mysqli_sql_exception $e){
    
        return false;
    }
}
function getAllUsers(mysqli $conn){
    $sql = "select * from users";
    $result=$conn->query($sql);
    $ar = array();
    while($obj=$result->fetch_object()){
        array_push($ar,$obj);
    }
    return $ar;

    
}
?>