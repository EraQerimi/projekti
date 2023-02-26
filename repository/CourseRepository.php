
<?php 
include_once '../models/Course.php';
include_once '../database/databaseConnection.php';
include_once '../models/user.php';

class CourseRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConnection;
        $this->connection = $conn;
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    function insertCourse($course){
       
        $conn = $this->connection->startConnection();
        $name = $course->getName();
        $updatedAt = $course->getUpdatedAt();
        $nrOfLikes = $course->getNrOfLikes();
        $price = $course->getPrice();
        $author = $course->getAuthor();
// var_dump($author);
// die();

        $sql = "INSERT INTO course (name, updatedAt, nrOfLikes, price, author) VALUES ('$name','$updatedAt', $nrOfLikes, $price, '$author')";
        var_dump($sql);
        if(mysqli_query($conn,$sql)){
            header("location:../view/index.php");
        }else{
            echo "This is an Error:";
        }


    }
    function getCourses(){
       
        $conn = $this->connection->startConnection();

        $sql = "select * from course";
        $courses = [];
        if ($result = mysqli_query($conn, $sql)) {
            while($row = mysqli_fetch_assoc($result)){
                $courses[] = new Course($row['name'], $row['updatedAt'], $row['nrOfLikes'], $row['price'], $row['author'], $row['id']);
            }
        }
    
        return $courses;
    }

    function deleteCourse($id){
       
        $conn = $this->connection->startConnection();

        $sql = "delete from course where id=$id ";

        if(mysqli_query($conn,$sql)){
            header("location:../view/dashboard.php");
        }else{
            echo "This is an Error:";
        }
    }

    
}
?>