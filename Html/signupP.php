<?php 
session_start();
$connection = mysqli_connect ("localhost", "root","");
$db = mysqli_select_db($connection, 'Learn');
 

$fnameerror = "";
$lnameerror = "";
$emailerror = "";
$passworderror= "";
$cityerror= "";
$emailTaken = "";

$valid=true;
?>

<!DOCTYPE html>
<html lang="en">
<head >
	<meta charset="UTF-8">
	<title>Sign up</title>
   <link rel="stylesheet" href="../css/stylesheet.css">

   <style type ="text/css">
   #errorMessage{
    color:  rgb(238, 96, 96);
    font-size: 14px; 
    font-weight: 400;
    font-family: "Nunito", sans-serif;}

    #img{
      border-radius:10%;
    }
   </style>


</head>
<body>
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

<?php
$fnameerror = "";
$lnameerror = "";
$emailerror = "";
$passworderror= "";
$cityerror= "";
$emailTaken = "";
$allErrors= "";

$valid=true;


$city=$_POST['city'];


/*$fileTmpName =$_FILES['photo']['tmp_name'];
$uploadDir = "../images/";
$uploaded = move_uploaded_file($fileTmpName, $uploadDir.$photo);*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["fname"])) {
    $fnameerror = "\u{25CF} Name is required";
    $valid=false;
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
    $fnameerror= "\u{25CF} Only letters and white space allowed";
    $valid=false;

    }
  }

  if (empty($_POST["lname"])) {
    $lnameerror = "\u{25CF}Name is required";
    $valid=false;
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
    $lnameerror= "\u{25CF} Only letters and white space allowed";
    $valid=false;

    }
  }

  //email 

  if (empty($_POST["email"])) {
    $emailerror= "\u{25CF} Email is required";
    $valid=false;
  }  
  else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerror = "\u{25CF} Invalid email format";
      $valid=false;
    }
  }
 


  if (empty($_POST["password"])) {
    $emailerror= "\u{25CF} Email is required";
    $valid=false;
  }  
  else{
    $password = test_input($_POST["password"]);
     if((strlen($password)<8) ||!preg_match("/[!”#\$\%\&\'\(\)\*\+,-\.\/:;<=>\?@\[\]\^_\{\|\}~`]{1,}/", $password) ){ 
    $passworderror = "\u{25CF} Password should be at least 8 characters and should contain at least one special character.";
    $valid=false;
} 
  }


  if (($_POST["city"])=="Select Your City"){
    $cityerror="\u{25CF} city is required";
    $valid=false;
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">     
	<div class="modal" id="modal_sign_up">
		<div class="modal-left" >
        <h1>Sign up</h1>
        <p class="p">Please fill up your information to sign up as parent</p>

      
           <div class="file-input">

       <img src="../images/person_icon.png" alt="a default picture of a user" class="SignUP__img" id="defaultimg"><br>
           <label class="choose_button__label" for="img">
                <img path src="../images/photo.png" alt="parent icon">
              <span>choose profile photo</span></label>
            <input type="file" accept="image/*" name="img" id="img" class="choose_button"   onclick='changePic()' >
            </div> 


    
                    
          

    
         <div class="input-block" > 
                <label for="email" class="input-label">First Name:</label>
                 <input type="text" name="fname" placeholder="First Name"  value="<?php echo $fname; ?>"  required >
                 <span id="errorMessage"> <?php echo $fnameerror;?></span>
             </div>
             <div class="input-block">
             <label class="input-label">Last Name:</label>
             <input type="text" name="name" placeholder="Last Name"  value="<?php echo $lname; ?>" required >
             <span class="error" id="errorMessage"> <?php echo $lnameerror;?></span>
            </div>

		   <div class="input-block">
			  <label for="email" class="input-label">Email</label>
			   <input type="text" name="email"  placeholder="Email" value="<?php echo $email; ?>">
         <span class="error" id="errorMessage"> <?php echo $emailerror;?></span>

        </div>
			<div class="input-block">
		 	   <label for="password" class="input-label">Password</label>
			   <input type="password" name="password"  placeholder="Password" value="<?php echo $password; ?>">
         <span class="error" id="errorMessage"> <?php echo $passworderror;?></span>

        </div>

            <div class="input-block"> 
            <label class="input-label">City:</label>
            <select required type="text" name="city" id="loc" value="<?php echo $city; ?>">
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
          <span class="error" id="errorMessage"> <?php echo $cityerror;?></span>
         </div>
         <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7247.167019322969!2d46.700286!3d24.741175!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2ssa!4v1672129924120!5m2!1sar!2ssa" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            
		    <div class="modal-buttons">
                <input type="submit" name="submit" value="Submit" class="input-button"><br>
		    </div>
            <p class="sign-up">I have an account? <a href="Sign in.html">Login </a></p>
     
     </div>
	</div>
</form>


<?php
if(isset($_POST['submit'])){
if($valid){ 

//profile img
$userImage = $_FILES['img'];
$imageName = $userImage['name'];

if ($imageName == ""){
   $imageName = "person_icon.png";
}
      
$fileTmpName = $userImage['tmp_name'];
  $fileNewName = "../dbImg/".$imageName;
  move_uploaded_file($fileTmpName,$fileNewName);
//

$query= "INSERT INTO parent(`imageName`,`fname`, `lname`,`email`, `password`,`city`) VALUES(' $imageName','$fname','$lname','$email' ,'$password' ,'$city')";               
$insert = mysqli_query($connection, $query);  
if($insert){
  $_SESSION['success'] ="Sign up successfully!";
  header('location: Signin.php?success=1');
  $connection -> close();


  }else{
  header('location:signUpParent.php?error=1');
  $connection -> close();
  }
}
}
?>


<footer class="navbar" >
  <p> &copy; 2023 Learn online tutoring platform <br>
	<a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
	<img src="../images/email_icon.png" alt="Contact Us"></a></p>  
 </footer>
 
 <script src="../js/index.js"></script>

 <script>

//Upload image

function changePic(){
const img = document.querySelector('#defaultimg');
const file = document.querySelector('#img');


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

</body>
</html>
