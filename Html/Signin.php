<!DOCTYPE html>

<?php

session_start();
if(isset($_SESSION['User Totur']))
header("Location: TutorHomePage.php?error=1");
else if(isset($_SESSION['User Parent']))
header("Location: parentHomePage.php?error=1");
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="../css/stylesheet.css">

  <!--new code-->
  <script type="text/javascript">
    function select() {
      var1 = document.getElementById("tutorRadio");
      var2 = document.getElementById("parentRadio");
      if (var1.checked == true) {
        $select1 = mysqli_query($connection, "SELECT * FROM `User Tutor` WHERE email = '$email' ");
        document.myform.action = "TutorHomePage.php";

      }
      else {
        $select = mysqli_query($connection, "SELECT * FROM `User Parent` WHERE email = '$email' ");
        document.myform.action = "parentHomePage.php";
      }
    }
  </script>




</head>

<body>

  <header class="page-header" id="navbar">
    <nav class="navbar-container">
      <!-- logo -->
      <a href="index.html" id="l"><img class="logo" src="../images/Logo.PNG" alt="logo"> </a>

      <!-- الزر الي يظهر عند التصغير  -->
      <button type="button" id="navbar-toggle" aria-controls="navbar-menu" aria-label="Toggle menu"
        aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!--العناصر الي بتوجد في الهيدر + في الزر عند التصغير  -->
      <div id="navbar-menu" aria-labelledby="navbar-toggle">
        <ul class="nav__links">
          <li class="navbar-item"><a href="index.html" class="nav__link">Home</a> </li>
          <li class="navbar-item"><a href="mailto:LearnInfo.sa@gmail.com" class="nav__link">Contact us</a></li>
        </ul>

      </div>
    </nav>
  </header>

  <form action="TutorHomePage.php" method="post"  name="myform" onsubmit="select()">
    <div class="modal">

      <div class="modal-left">
        <h1>Welcome back!</h1>
        <p class="p">The beautiful thing about learning is nobody can take it away from you.</p>


        <div class="input-block">
          <label for="email" class="input-label">Email</label>
          <input type="email" name="email" id="email" placeholder="Email">
        </div>
        <div class="input-block">
          <label for="password" class="input-label">Password</label>
          <input type="password" name="password" id="password" placeholder="Password">
        </div>

        <!-- Radio two type of user -->
        <div>
          <label class="input-label" style="margin-left:1% ;"><strong>I'm a :</strong></label>
          <input type="radio" name="typeUser" id="tutorRadio" required>
          <label class="input-label" for="tutorRadio">Tutor</label>

          <input type="radio" name="typeUser" id="parentRadio" required>
          <label class="input-label" for="parentRadio">Parent</label>
        </div><br>

        

        <div class="modal-buttons">
          <!-- <a href="" class="">Forgot your password?</a> -->
          <button class="input-button" type="submit">Login</button>
        </div>
      
      


        <p class="sign-up">Don't have an account? <a href="Sign up as.html">Sign up now</a></p>
      </div>
      <div class="modal-right">
        <img src="../images/g1.jpg" alt="background" class="Sign__img">
      </div>
    </div>
  </form>



  <footer class="navbar" id="page_footer">
    <p> &copy; 2023 Learn online tutoring platform <br>
      <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
        <img src="../images/email_icon.png" alt="Contact Us"></a>
    </p>
  </footer>
  <script src="../js/index.js"></script>
</body>

</html>

