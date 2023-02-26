<?php
include_once '../repository/courseRepository.php';
session_start();
$courseRepository = new CourseRepository();
$courses = $courseRepository->getCourses();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Learning</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@latest/css/all.min.css" />

    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body >
    <style>
        #addcourse {
            padding: 6vw 8vw 6vw 8vw;
            background-image: linear-gradient(rgba(99, 112, 168, 0.5), rgba(81, 91, 233, 0.5)), url("images/signup.jpg");
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #addcourse .reminder {
            color: #fff;
        }

        #addcourse .reminder h1 {
            color: #fff;
        }

        #addcourse .reminder .time {
            display: flex;
            margin-top: 40px;
        }

        #addcourse .reminder .time .date {
            text-align: center;
            padding: 13px 33px;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(4px);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border-radius: 10px;
            margin: 0 5px 10px 5px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            font-size: 1.1rem;
            font-weight: 600;
        }

        #addcourse .form {
            background: #fff;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            padding: 40px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        #addcourse .form input {
            margin: 15px 0;
            padding: 15px 10px;
            border: 1 solid rgb(84, 40, 241);
            outline: none;
        }

        #addcourse .form input::placeholder {
            color: #413c3c;
            font-weight: 500;
            font-size: 0.9rem;
        }

        #addcourse .form .btn {
            margin-top: 20px;

        }

        #addcourse .form a.yellow {
            text-decoration: none;
            font-size: 0.9rem;
            padding: 13px 35px;
            background-color: #fff;
            font-weight: 600;
            border-radius: 5px;
            color: #fff;
            background-color: #FDC93B;
            transition: 0.3s ease;
        }

        #addcourse .form a.yellow:hover {
            color: rgb(21, 21, 100);
            background-color: #fff;
        }
    </style>
    <!--Navigation-->

    <nav>
        <?php
        if (isset($_SESSION['firstName'])) {
            echo "<div class='loggedInUser'>" . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . "</div>";
        }
        ?>
        <img src="images/ubt-logo.png" alt="">

        <div class="navigation">
            <ul>
                <i id="menu-close" class="fas fa-times"></i>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="courses.html">Courses</a></li>
                <li><a href="contact.html">Contact</a></li>
                <!-- <li><a href="login.html">Login</a></li> -->
                <!-- <li><a href="sign_up.html">Sign Up</a></li> -->
                <?php
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']){
                    ?>
                <!-- <li><a href="dashboard.php">Dashboard</a></li> -->
                <?php
                }
                ?>
            </ul>
            <img id="menu-btn" src="images/menu.png" alt="">
        </div>
    </nav>

    <!--Home-->
    <section id="home">
        <h2>Enhase your future with Online Learning </h2>
        <p>An online course is a program of learning that's
            organized according to a syllabus (usually in units)
            and that takes place in a virtual space.
            Online courses can be informal and focused on one skill
            or as formal as leading to a certification or degree.</p>
        <div class="btn">
            <a class="blue" href="#">Learn More</a>
            <a class="yellow" href="#">Visit Courses</a>
        </div>
    </section>

    <!--Features-->

    <section id="features">
        <h1>Awesome Features</h1>
        <p>Replenish man have thing gathering lights yielding shall you </p>
        <div class="fea-base">
            <div class="fea-box">
                <i class="fa fa-graduation-cap"></i>
                <h3>Scholarship Facility</h3>
                <p>One make creepeth, man bearing theira fairmament won't great heaven</p>
            </div>
            <div class="fea-box">
                <i class="fa fa-file-certificate"></i>
                <h3>Dell Online Corses</h3>
                <p>One make creepeth, man bearing theira fairmament won't great heaven</p>
            </div>
            <div class="fea-box">
                <i class="fas fa-award"></i>
                <h3>Global certification</h3>
                <p>One make creepeth, man bearing theira fairmament won't great heaven</p>
            </div>
        </div>
    </section>

    <!--Courses-->

    <section id="course">
        <h1>Our Popular Corses</h1>
        <p>Replenish man have thing gathering lights yielding shall you </p>
        <div class="course-box">

          
        <?php
        foreach($courses as $course){
            ?>
              <div class="courses">
                <img src="images/c1.jpg" alt="">
                <div class="details">
                    <span>Updated <?php echo $course->getUpdatedAt()?></span>
                    <h6><?php echo $course->getName()?></h6>
                    <h6><?php echo $course->getAuthor()?></h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span><?php echo $course->getNrOfLikes()?></span>
                    </div>
                </div>
                <div class="cost">
                 $<?php
                    echo $course->getPrice();
                    ?>
                </div>
            </div>
            <?php
        }
        ?>

        </div>
    </section>
    <?php
    if(isset($_SESSION['firstName'])){
        ?>
         <section id="addcourse">
        <div class="form">
            <form action="../controller/courseController.php">
                <h3>Register a course!</h3>
                <input type="text" placeholder="Name" name="name">
                <input type="number" placeholder="Price" name="price" step="0.01">
                <div class="btn">
                    <button class="yellow" type="submit" name='addCourse'>Add course</button>
                </div>
            </form>
        </div>
    </section>
        <?php
    }
    ?>


    <!--Registration-->

    <section id="registration">



        <div class="form">
            <form action="../controller/userController.php" id="formff">
                <h3>Create a Free Account NOW!</h3>
                <input type="text" placeholder="FisrtName" name="firstName" id="firstName">
                <label id="firstNameLabel"></label> <br> <br>
                <input type="text" placeholder="LastName" name="lastName" id="lastName">
                <label id="lastNameLabel"></label> <br> <br>
                <input type="email" placeholder="Email Address" name="email" id="email">
                <label id="emailLabel"></label> <br> <br>
                <input type="tel" placeholder="Phone Number" name="phoneNumber" id="phoneNumber">
                <label id="phoneNumberLabel"></label> <br> <br>
                <input type="text" placeholder="Username" name="username" id="username">
                <label id="usernameLabel"></label> <br> <br>
                <input type="password" placeholder="Password" name="password" id="password">
                <label id="passwordLabel"></label> <br> <br>
                <div class="btn">
                    <input class="yellow" type="submit" name='registerUser' id="signupForm">Sign Up</input>
                </div>
            </form>
        </div>
        <div class="form">
            <form action="../controller/userController.php">
                <h3>Log In NOW!</h3>
                <input type="text" placeholder="Name" name="username" id="username1">
                <label id="username1Label"></label> <br> <br>
                <input type="password" placeholder="Password" name="password" id="password1">
                <label id="password1Label"></label> <br> <br>
                <div class="btn">
                    <input class="yellow" type="button" name='loginUser'id="loginForm">Log In</button>
                </div>
            </form>
        </div>
    </section>

    <!--Experts/Profiles-->

    <section id="experts">
        <h1>Community Experts</h1>
        <p>Replenish man have thing gathering lights yielding shall you </p>
        <div class="expert-box">

            <div class="profile">
                <img src="images/foto1.png" alt="">
                <h6>Ema Irnik</h6>
                <p>Python & Algorthm Expert</p>
                <div class="pro-links">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
            <div class="profile">
                <img src="images/foto2.png" alt="">
                <h6>Jason</h6>
                <p>Data Analysis Expert</p>
                <div class="pro-links">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
            <div class="profile">
                <img src="images/foto3.png" alt="">
                <h6>Jennifer</h6>
                <p>Full Stack Developer</p>
                <div class="pro-links">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
            <div class="profile">
                <img src="images/foto4.png" alt="">
                <h6>Maalik</h6>
                <p>Design Expert</p>
                <div class="pro-links">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>

        </div>
    </section>

    <!--footer-->
    <footer>
        <div class="footer-col">
            <h3>Top Products </h3>
            <li>Manage Reputation</li>
            <li>Power Tools</li>
            <li>Managed Website</li>
            <li>Marketing Service</li>
        </div>
        <div class="footer-col">
            <h3>Power Tools </h3>
            <li>Jobs</li>
            <li>Marketing Service</li>
            <li>Top Products</li>
            <li>Manage Reputation</li>
        </div>
        <div class="footer-col">
            <h3>Power Tools </h3>
            <li>Managed Website</li>
            <li>Top Products</li>
            <li>Manage Reputation</li>
            <li>Marketing Service</li>
        </div>
        <div class="footer-col">
            <h3>Guides </h3>
            <li>Research</li>
            <li>Experts</li>
            <li>Managed Website</li>
            <li>Marketing Service</li>
        </div>

        <div class="footer-col">
            <h3>Newsletter</h3>
            <p>You can trust us we only send promo offers,</p>
            <div class="subscribe">
                <input type="text" placeholder="Your Email address">
                <a href="#" class="yellow">SUBSCRIBE</a>
            </div>
        </div>

        <div class="copyright">
            <p>copyright @2022 All rights reserved | This template is made by Era/Emir</p>
            <div class="pro-links">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-linkedin-in"></i>
            </div>
        </div>
    </footer>

<script>
        $('#menu-btn').click(function () {
            $('nav .navigation ul').addClass('active')
        });
        $('#menu-close').click(function () {
            $('nav .navigation ul').removeClass('active')
        });
    </script>

<!-- Validimii -->
    <script>
// function validateInputs(){
  var login = document.getElementById("signupForm");
// $("#formff").submit();
console.log("sdd");

login.addEventListener("click",function(event) {
    let isValid = false;
    console.log("sddds");
event.preventDefault();

      // Name validation
      var nameValidation = /([A-Z][a-z]{2,9})/;
      var nameLabel = document.getElementById('firstNameLabel');
      var name = document.getElementById("firstName").value;

      if(name == ""){
        //   nameLabel.innerHTML="Fill the name field";
          nameLabel.style.color = "red";
          event.preventDefault();
          isValid = false;
      }
      else{
          if(nameValidation.test(name) == true){
            isValid = true;

          }else{
            //   nameLabel.innerHTML="Please fill the surname field correctly!";
              nameLabel.style.color="red";
              event.preventDefault();
          isValid = false;

          }
      }

      // Surname validation
      var surnameValidation = /^[A-Z][a-z]{2,20}/;
      var surnameLabel= document.getElementById('lastNameLabel');
      var surname = document.getElementById('lastName').value;

      if(surname == ""){
        //   surnameLabel.innerHTML ="Fill the surname field!";
          surnameLabel.style.color = "red";
          event.preventDefault();
          isValid = false;

      }
      else{
          if(surnameValidation.test(surname) == true){
            isValid = true;

          }
          else{
            //   surnameLabel.innerHTML = "Please fill the surname field correctly!";
              surnameLabel.style.color = "red";
              event.preventDefault()
          isValid = false;

          }
      }

      // Email validation
      var emailValidation = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})/ ;
      var emailLabel = document.getElementById('emailLabel');
      var email = document.getElementById('email').value;

      if(email == ""){
        //   emailLabel.innerHTML = "Fill the email field!";
          emailLabel.style.color = "red";
          event.preventDefault();
          isValid = false;

      }
      else{
          if(emailValidation.test(email) == true){
          isValid = true;
              
          }
          else{
            //   emailLabel.innerHTML = "Please fill the email field correctly!";
              emailLabel.style.color="red";
              event.preventDefault()
          isValid = false;

          }
      }
      // Phone number validation
      var phoneNumberValidation = /^(0|[0-9][0-9]*)$/;
      var phoneLabel = document.getElementById('phoneNumberLabel');
      var phoneNumber = document.getElementById('phoneNumber').value;

      if(phoneNumber == ""){
          phoneLabel.innerText="Fill the phone number field!";
          phoneLabel.style.color="red";
          event.preventDefault();
          isValid = false;

      }
      else{

          if(phoneNumberValidation.test(phoneNumber) == true){
          isValid = true;
           
          }
          else{
            //   phoneLabel.innerHTML= "Please fill the field correctly!";
              phoneLabel.style.color="red";
              event.preventDefault();
          isValid = false;

          }
      }
      // Username validaton
      var usernameValidation = /^[A-Z][a-z]{2,20}/;
      var usernameLabel = document.getElementById('usernameLabel');
      var username = document.getElementById('username').value;

      if(username == ""){
        //   usernameLabel.innerHTML = "Fill the username field!";
          usernameLabel.style.color="red";
          event.preventDefault();
          isValid = false;

      }
      else{
          if(usernameValidation.test(username) == true){
            isValid = true;

          }
          else{
        //   usernameLabel.innerHTML = "Fill the username field correctly!";
          usernameLabel.style.color="red";
          event.preventDefault();
          isValid = false;

          }
      }


      // Password validation
      var passwordValidation = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}/;
      var passwordLabel = document.getElementById('passwordLabel');
      var password = document.getElementById('password').value;

      if(password == ""){
          passwordLabel.innerHTML = "Fill the password field!";
          passwordLabel.style.color = "red";
          event.preventDefault();
          isValid = false;

      }
      else{
          if(passwordValidation.test(password) == true){
            isValid = true;

          }
          else{
            //   passwordLabel.innerHTML = "Password must be minimum eight characters,<br/> at least one number and one special character";
              passwordLabel.style.color = "red";
              event.preventDefault();
          isValid = false;

          }
      }

      // Confirm Password validation
    //   var confirmPasswordLabel = document.getElementById('passConfirm');
    //   var confirmPassword = document.getElementById('confirmPassword-input').value;

    //   if(confirmPassword == ""){
    //       confirmPasswordLabel.innerText = "Fill the confirm password field!";
    //       confirmPasswordLabel.style.color = "red";
    //       event.preventDefault()
    //   }
      
    //    else if(password != confirmPassword){
    //       confirmPasswordLabel.innerText = "Password doesn't match!";
    //       confirmPasswordLabel.style.color="red";
    //       event.preventDefault() 
    //    }
    if(isValid){
        $("#formff").submit();
    }
  })
// }

</script>

</body>

</html>