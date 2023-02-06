<!DOCTYPE html>

<?php
session_start();
if(isset($_SESSION['User Tutor']))
header("Location: TutorHomePage.php?error=1");
else if(isset($_SESSION['User Parent']))
header("Location: parentHomePage.php?error=1");
Define("host","localhost");
Define("Username", "root");
Define("Password", "");
Define("db", "Learn");
$connection = mysqli_connect(host, Username,Password,db);

 if(!$connection)
die("could not connect to database");


$bool = false;
$fnameerror = $lnameerror = $emailerror  = $passwordderror = $cityerror= $emailTaken = $allErrors= "";

?>




<html lang="en">
<head >
	<meta charset="UTF-8">
	<title>Sign up</title>
   <link rel="stylesheet" href="../css/stylesheet.css">


</head>
<body >


<?php


if(isset($_POST["submitP"])){
  $fname = isset($_POST["fname"])? $_POST["fname"]:"";
  $lname = isset($_POST["lname"])? $_POST["lname"]:"";
  $email = isset($_POST["email"])? $_POST["email"]:"";
  $passwordd = isset($_POST["passwordd"])? $_POST["passwordd"]:"";
  $city = isset($_POST["city"])? $_POST["city"]:"";

//for image
$profilePhoto = $_FILES['imageP']['name'];
                                           
 if(empty($profilePhoto))
 $profilePhoto = '../images/photo.png';
 else{
   $profilePhoto = '../images/'.$profilePhoto;
 } 


 if (!preg_match("/^[a-zA-Z]$/",$fname)){ 
  $fnameerror = "\u{25CF} First name should not contain special characters or digits.<br>";
  $allErrors = $allErrors . $nameerror;
}

if (!preg_match("/^[a-zA-Z]$/",$lname)){ 
  $lnameerror = "\u{25CF} Last name should not contain special characters or digits.<br>";
  $allErrors = $allErrors . $lnameerror;
}

$select = mysqli_query($connection, "SELECT * FROM `User Parent` WHERE email = '$email' ");

$select1 = mysqli_query($connection, "SELECT * FROM `User Tutor` WHERE email = '$email' ");

if(mysqli_num_rows($select) > 0 || mysqli_num_rows($select1) > 0 )
     {
       $emailTaken = "\u{25CF} An account with this email already exists! <br>";
       $allErrors = $allErrors . $emailTaken;
        }

 if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,5}$/ix" , $email)) {
          $emailerror = "\u{25CF} Invalid Email Address!<br>";
          $allErrors = $allErrors . $emailerror;
      }

  if ((strlen($passwordd)<8) || !preg_match("/[!”#\$\%\&\'\(\)\*\+,-\.\/:;<=>\?@\[\]\^_\{\|\}~`]{1,}/", $passwordd) ){ 
        $passwordderror = "\u{25CF} Password should be at least 8 characters and should contain at least one special character.<br>";
        $allErrors = $allErrors . $passwordderror;
    }

  if (strlen($allErrors) > 0 || !empty($allErrors)){
      $bool = true; }

  else {
                      
    $insert = mysqli_query($connection, "INSERT INTO `User Parent`(fname, lname,email, passwordd,city, photo) VALUES('$fname','$lname','$email' ,'$passwordd' , '$city','$profilePhoto')");

      if($insert){
        $_SESSION['success'] ="Sign up successfully!";
        //might change to signin.php
        header('location: signin.html?success=1');
        $connection -> close();}
        else{
        header('location: signUpParent.php?error=1');
        $connection -> close();
        }   

      }
                          
                          
                      
    }
    
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }   


    /*$iserror = false;
    $formerrors = array("fnameerror"=>false, "lnameerror"=>false,"emailerror"=>false,"passwordderror"=>false,"cityerror"=>false);
    
    $inputlist= array("fname"=>"First_Name","lname"=>"Last_Name","email"=>"email","passwordd"=>"passwordd","city"=>"city",)

    
      if ($fname=="" ){
        $formerrors["fnameerror" ] = true;
        $iserror = true;
          } 

      if ( $lname=="" ){
        $formerrors["lnameerror" ] = true;
        $iserror = true;
          } 
              
      if ( $email=="" ){
          $formerrors["emailerror" ] = true;
          $iserror = true;
           } 

     if ( $passwordd=="" ){
        $formerrors["passwordderror" ] = true;
        $iserror = true;
          }      

    if ( $city=="" ){
        $formerrors["cityerror" ] = true;
        $iserror = true;
          }    
      

      if(strlen($passwordd) < 8){
        $formerrors["passwordderror"] =true;
        $iserror=true;
      }
    
    


      if(!$iserror)
    {
      $insert = mysqli_query($connection, "INSERT INTO `User Parent`(fname, lname, email, passwordd ,city, photo) VALUES('$fname','$lname','$email', '$passwordd' , '$city','$profilePhoto' )");
      
      if($insert){
        $_SESSION['success'] ="Sign up successfully!";
        header('location: parentHomePage.php?success=1');
        $connection -> close();}

      else{
        header('location: SignUpParent.php?error=1');
        $connection -> close();
        }
    
    }

      if($iserror){
        print("<p>Fields need to be filled in properly</p>")
      }*/

    
  
    
?>




    <div id="parent-signup">

<header id="navbar" class="page-header">
	<nav class="navbar-container">
<!-- logo -->
  <a href="index.html" id="l"><img class="logo" src="../images/Logo.PNG" alt="logo"> </a>

<!-- الزر الي يظهر عند التصغير  -->
  <button type="button" id="navbar-toggle" aria-controls="navbar-menu"  aria-label="Toggle menu" aria-expanded="false">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
  </button>

<!--العناصر الي بتوجد في الهيدر + في الزر عند التصغير  -->
  <div id="navbar-menu" aria-labelledby="navbar-toggle">
	  <ul class="nav__links">
		 <li class="navbar-item"><a href="index.html" class="nav__link" >Home</a> </li>
		  <li class="navbar-item"><a href="mailto:LearnInfo.sa@gmail.com" class="nav__link">Contact us</a></li>
		  <li class="navbar-item"> <a class="Sign" href="Sign in.html"><button>Login</button></a></li>
		</ul>

	 </div>
 </nav>
</header>

<form metod="post" action="">
	<div class="modal" id="modal_sign_up">
		<div class="modal-left" >
        <h1>Sign up</h1>
        <p class="p">Please fill up your information to sign up as parent</p>


         <img src="../images/person_icon.png" alt="a default picture of a user" class="SignUP__img"><br>
         <label class="input-label">Upload a photo: (optional)
         <div class="file-input">
            <input type="file" accept="image/*" name="file-input" id="file-input" class="choose_button">
            <label class="choose_button__label" for="file-input">
                <img path src="../images/photo.png" alt="parent icon">
              <span>choose profile photo</span></label> </div> </label> 


              <!--php here is from the second try-->
              <div id="errorMessage"> 
                        <?php
                          if($bool)
                            echo "<div class='alert alert-danger' role='alert'> <p>".$allErrors."</p></div>";
                        ?>
                        </div>
          



            <div class="input-block">
                <label class="input-label">First Name:</label>
                 <input required type="text"  name="First Name" id="firstname" placeholder="First Name" value="<?php if(isset($fname)) echo $fname; ?>">
             </div>
             <div class="input-block">
             <label class="input-label">Last Name:</label>
             <input required type="text" name="Last Name" id="lastname" placeholder="Last Name"  value="<?php if(isset($lname)) echo $lname; ?>" >
             </div>

		   <div class="input-block">
			  <label for="email" class="input-label">Email</label>
			   <input type="email" name="email" id="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" >
		   </div>
			<div class="input-block">
		 	   <label for="password" class="input-label">Password</label>
			   <input type="password" name="passwordd" id="password" placeholder="Password" value="<?php if(isset($passwordd)) echo $passwordd; ?>">
		    </div>
            <div class="input-block"> 
            <label class="input-label">City:</label>
            <select required type="text" name="city" id="loc"  >
            <option selected>Select Your City</option>
            <option value="Abha">Abha</option>
            <option value="Abu Arish">Abu Arish</option>
            <option value="Al Baha">Al Baha</option>
            <option value="Al Bukayriyah">Al Bukayriyah</option>
            <option value="Al Duwadimi">Al Duwadimi</option>
            <option value="Al Kharj">Al Kharj</option>
            <option value="Al Rass">Al Rass</option>
            <option value="Al Ula">Al Ula</option>
            <option value="Al Khobar">Al Khobar</option>
            <option value="Arar">Arar</option>
            <option value="Bisha">Bisha</option>
            <option value="Buridah">Buraidah</option>
            <option value="Dammam">Dammam</option>
            <option value="Dhahran">Dhahran</option>
            <option value="Hafar Al Batin">Hafar Al Batin</option>
            <option value="Hail">Hail</option>
            <option value="Jazan">Jazan</option>
            <option value="Jeddah">Jeddah</option>
            <option value="Jubail">Jubail</option>
            <option value="Khamis Mushait">Khamis Mushait</option>
            <option value="Mecca">Mecca</option>
            <option value="Medina">Medina</option>
            <option value="Najran">Najran</option>
            <option value="Riyadh">Riyadh</option>
            <option value="Rabigh">Rabigh</option>
            <option value="Riyadh AlKhabra">Riyadh AlKhabra</option>
            <option value="Sakaka">Sakaka</option>
            <option value="Shaqra">Shaqra</option>
            <option value="Tabuk">Tabuk</option>
            <option value="Taif">Taif</option>
            <option value="Unayzah">Unayzah</option>
            <option value="Yanbu">Yanbu</option>
            <option value="Zulfi">Zulfi</option>
          </select> 
         </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7247.167019322969!2d46.700286!3d24.741175!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2ssa!4v1672129924120!5m2!1sar!2ssa" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          

		    <div class="modal-buttons">
                <input class="input-button" type="submit" value="Sign Up" name ="submitP" ><br>
		    </div>
            <p class="sign-up">I have an account? <a href="Sign in.html">Login </a></p>
     
     </div>
	</div>
</form>



   

<footer class="navbar" >
  <p> &copy; 2023 Learn online tutoring platform <br>
	<a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
	<img src="../images/email_icon.png" alt="Contact Us"></a></p>  
 </footer>
 
 <script src="../js/index.js"></script>


 <script>

//Upload image
      function changePic(){
const img = document.querySelector('#img1');
const file = document.querySelector('#image');


file.addEventListener('change', function(){
 
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader(); 

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);

       
    }
});

}

</script>

<?php
    if(isset($_GET['error']))
    $err = true;
    else
    $err = false;
    ?>  
    <?php
    if($err)
    echo "<script type='text/javascript'> $(window).load(function(){ $('#errorModal').modal('show'); }); </script>";
    ?>

</body>
</html>