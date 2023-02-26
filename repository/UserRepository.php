
<?php 
include_once '../database/databaseConnection.php';
include_once '../models/User.php';

class UserRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConnection;
        $this->connection = $conn;
    }

    function insertUser($user){
       
        $conn = $this->connection->startConnection();

        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $phoneNumber= $user->getPhoneNumber();
        $username = $user->getUsername();
        $password = $user->getPassword();
        $userType = $user->getUserType();

        $sql = "INSERT INTO user (firstName,lastName,email,phoneNumber,username, password,usertype) VALUES ('$firstName','$lastName','$email',$phoneNumber,'$username','$password',$userType)";
        if(mysqli_query($conn,$sql)){
            header("location:../view/index.php");
        }else{
            echo "This is an Error:";
        }

    }
    
    function getUser($username, $password){
       
        $conn = $this->connection->startConnection();


        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $user = null;
        if ($result = mysqli_query($conn, $sql)) {
            $row = $result -> fetch_assoc();  
            $user = new User($row['firstName'], $row['lastName'], $row['email'], $row['phoneNumber'], $row['username'], $row['password'], $row['userType'], $row['id']);
        }
    
        // header("location:../view/LogIn.php");

        return $user;
    }
    function isUserAdmin($id){
       
        $conn = $this->connection->startConnection();

        $sql = "SELECT count(*) as count FROM user where userType = 1 AND id=$id ";
        if ($result = mysqli_query($conn, $sql)) {
            $row = $result -> fetch_assoc();  
            return $row['count'] == 1;
        }
    
        // header("location:../view/LogIn.php"s);

        return false;
    }
    /*insert all courses*/
}
?>