<?php 
    session_start();
    // require_once() function can be used to include a PHP file in another one, when you may need to include the called file more than once. If it is found that the file has already been included, calling script is going to ignore further inclusions.
    require_once("CONFIG-DB.php");
    
    $con = mysqli_connect("localhost","iw3htp","password");

    if(mysqli_connect_errno($con))
        die("Fail to connect to database :" . mysqli_connect_error());

    $email = $_POST['Email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM User Parent WHERE Email='$email' AND password='$password'";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['Email'] = $email;
        mysqli_close();
        header("Location:parent Home Page.html");
    }
    else {
        mysqli_close();
        header("Location: index.html?error=Wrong Email/Password");
    }
?>