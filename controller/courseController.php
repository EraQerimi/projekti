<?php
include_once '../repository/courseRepository.php';
include_once '../models//Course.php';

session_start();
if (isset($_GET['addCourse'])) {
    if (empty($_GET['name']) || empty($_GET['price'])) {


        echo "Fill all required fields!";

    } else {
        echo "Order Submited !!";
        $name = $_GET['name'];
        $updatedAt = date("d/m/Y");
        $nrOfLikes = 239;
        $price = $_GET['price'];
        $author = $_SESSION['firstName']." ".$_SESSION['lastName'];


        $course = new Course($name, $updatedAt, $nrOfLikes, $price, $author, 0);

        $courseRepository = new CourseRepository;

        $courseRepository->insertCourse($course);


    }
}

if (isset($_GET['deleteCourse'])) {
        $id = $_GET['id'];

        $courseRepository = new CourseRepository;

        $courseRepository->deleteCourse($id);


}

?>