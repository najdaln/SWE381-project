<?php 
    session_start();
    
    $con = mysqli_connect("localhost","iw3htp","password");

    if(mysqli_connect_errno($con))
        die("Fail to connect to database :" . mysqli_connect_error());

    $email = $_POST['Email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM User Tutor WHERE Email='$email' AND password='$password'";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['EmailTutor'] = $email;
        mysqli_close();
        header("Location:Tutor Home Page.html");
    }
    else {
        mysqli_close();
        header("Location: index.html?error=Wrong Email/Password");
    }
?>