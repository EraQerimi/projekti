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
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
     crossorigin="anonymous"></script>
</head>
<body>
    	<!--Navigation-->
        <nav>
            <img src="images/ubt-logo.png" alt="">
            <div class="navigation">
                <ul>
                    <i id="menu-close" class="fas fa-times"></i>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="courses.html">Courses</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a class="active" href="sign_up.html">Sign Up</a></li>

                </ul>
                <img id="menu-btn" src="images/menu.png" alt="">
            </div>
         </nav>
         
<form id="signUp-form">
    <h2>Login Form</h2>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br><br>
    <button type="submit" id="login-btn">Login</button>
  </form>
  
  <form id="register-form" action="sign_up2.php">
    <h2>Register Form</h2>
    <label for="new-username">Username:</label>
    <input type="text" id="new-username" name="new-username">
    <br><br>
    <label for="new-password">Password:</label>
    <input type="password" id="new-password" name="new-password">
    <br><br>
    <button type="submit" id="register-btn">Register</button>
  </form>
  
</body>
</html>
  