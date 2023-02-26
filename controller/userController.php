<?php
include_once '../repository/UserRepository.php';
include_once '../models//User.php';

// var_dump($_GET);
if (isset($_GET['registerUser'])) {
    if (empty($_GET['firstName']) || empty($_GET['lastName']) || empty($_GET['email']) || empty($_GET['phoneNumber']) || empty($_GET['username']) || empty($_GET['password'])) {

        echo "Fill all required fields!";
    } else {
        echo "Order Submited !!";
        $lastName = $_GET['lastName'];
        $firstName = $_GET['firstName'];
        $email = $_GET['email'];
        $phoneNumber = $_GET['phoneNumber'];
        $username = $_GET['username'];
        $password = $_GET['password'];


        $user = new User($firstName, $lastName, $email, $phoneNumber, $username, $password, 0, 0);

        $userRepository = new UserRepository();

        $userRepository->insertUser($user);
    }
}
if (isset($_GET['loginUser'])) {

    if (empty($_GET['password']) || empty($_GET['username'])) {

        echo "Fill all required fields!";
    } else {
        echo "Order Submited !!";
        $username = $_GET['username'];
        $password = $_GET['password'];



        $userRepository = new UserRepository();

        $user = $userRepository->getUser($username, $password);
        if (empty($user)) {
            echo "Username or password incorrect. Please try again";
        } else {
            session_start();

            $_SESSION["isAdmin"] = $userRepository->isUserAdmin($user->getId());
            $_SESSION["firstName"] = $user->getFirstName();
            $_SESSION["lastName"] = $user->getLastName();
            header("location:../view/index.php");

        }
    }
}

?>