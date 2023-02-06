<!DOCTYPE html>


<?php
session_start();
if(isset($_SESSION['User Tutor']))
header("Location: tutorHomePage.php?error=1");
else if(isset($_SESSION['User parent']))
header("Location: parentHome.php?error=1");
Define("host","localhost");
Define("Username", "root");
Define("Password", "");
Define("db", "Learn-3");
$connection = mysqli_connect(host, Username, Password, db);

 if(!$connection)
die("could not connect to database");


$bool = false;
$fnameerror = $lnameerror = $emailError  = $passworddError = $cityerror= "";

?>






<html lang="en">
<head >
	<meta charset="UTF-8">
	<title>Sign up</title>
   <link rel="stylesheet" href="../css/stylesheet.css">


</head>
<body >

<?php
if(isset($_POST["submitT"])){

    $fname = isset($_POST["fname"])? $_POST["fname"]:"";
    $lname = isset($_POST["lname"])? $_POST["lname"]:"";
    $id = isset($_POST["id"])? $_POST["id"]:"";
    $age = isset($_POST["age"])? $_POST["age"]:"";
    $gender = isset($_POST["gender"])? $_POST["gender"]:"";
    $email = isset($_POST["email"])? $_POST["email"]:"";
    $passwordd = isset($_POST["passwordd"])? $_POST["passwordd"]:"";
    $phoneNum = isset($_POST["phoneNum"])? $_POST["phoneNum"]:"";
    $city = isset($_POST["city"])? $_POST["city"]:"";
    $bio = isset($_POST["bio"])? $_POST["bio"]:"";

    //for image
$profilePhoto = $_FILES['imageP']['name'];
                                           
if(empty($profilePhoto))
$profilePhoto = '../images/photo.png';
else{
  $profilePhoto = '../images/'.$profilePhoto;
} 

    $iserror = false;
    $formerrors = array("fnameerror"=>false, "lnameerror"=>false,"iderror"=>false,"ageerror"=>false,"gendererror"=>false,"emailerror"=>false,"passwordderror"=>false,"phoneNumerror"=>false,"cityerror"=>false,"bioerror"=>false);
    
    $inputlist= array("fname"=>"First Name","lname"=>"Last Name","id"=>"id","age"=>"age","gender"=>"gender","email"=>"email","passwordd"=>"passwordd","phoneNum"=>"phoneNum","city"=>"city","bio"=>"bio")

    
      if ( $fname=="" ){
        $formerrors["fnameerror"] = true;
        $iserror = true;
          } 

      if ( $lname=="" ){
        $formerrors["lnameerror"] = true;
        $iserror = true;
          } 
              
      if ( $id=="" ){
          $formerrors["iderror"] = true;
          $iserror = true;
           } 

     if ( $age=="" ){
        $formerrors["ageerror"] = true;
        $iserror = true;
          }      

    if ( $gender=="" ){
        $formerrors["gendererror"] = true;
        $iserror = true;
          }    
   if ( $email=="" ){
        $formerrors["emailerror"] = true;
        $iserror = true;
         } 
              
    if ( $passwordd=="" ){
        $formerrors["passwordderror"] = true;
        $iserror = true;
          }  


    if(strlen($passwordd) < 8){
       $formerrors["passwordderror"] =true;
       $iserror=true;
          }      
          


    if ( $phoneNum=="" ){
     $formerrors["phoneNumerror"] = true;
    $iserror = true;
          }  
          
    if ( !preg_match("/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/",$phoneNum ))
    {
        $formerrors["phoneNumerror"] = true;
        $iserror = true;
         } 

    if ( $city=="" ){
        $formerrors["cityerror"] = true;
        $iserror = true;
          } 

    if ( $bio=="" ){
        $formerrors["bioerror"] = true;
        $iserror = true;
        } 
      
      
        if(!$iserror)
        {
          $insert = mysqli_query($connection, "INSERT INTO `User Tutor`(fname, lname,id,age,gender, email, passwordd,phoneNum ,city,bio, photo) VALUES('$fname','$lname','$id','$age','$gender','$email','$passwordd' ,'$phoneNum', '$city','$bio','$profilePhoto' )");
          
          if($insert){
            $_SESSION['success'] ="Sign up successfully!";
            header('location: TutorHomePage.php?success=1');
            $connection -> close();}
    
          else{
            header('location: SignUpTutor.php?error=1');
            $connection -> close();
            }
        
        }
    
          if($iserror){
            print("<p>Fields need to be filled in properly</p>")
          }


      
      }

    
?>





<div id="tutor-signup">

<header id="navbar" class="page-header">
	<nav class="navbar-container">
<!-- logo -->
  <a href="index.html" id="l"><img class="logo" src="../images/Logo.PNG" > </a>

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

<form>
	<div class="modal" id="modal_sign_up">
		<div class="modal-left" >
        <h1>Sign up</h1>
        <p class="p">Please fill up your information to sign up as parent</p>

        
         <img src="../images/person_icon.png" alt="a default picture of a user" class="SignUP__img"><br>
         <label class="input-label">Upload a photo: (optional)
         <div class="file-input">
            <input type="file" accept="image/*" name="file-input" id="file-input" class="choose_button" />
            <label class="choose_button__label" for="file-input">
                <img path src="../images/photo.png" alt="photo icon">
              <span>choose profile photo</span></label> </div></label>
          
      


            <div class="input-block">
                <label  class="input-label">First Name:</label>
                 <input required type="text" name="First Name" id="firstname" placeholder="First Name">
             </div>
             <div class="input-block">
             <label class="input-label">Last Name:</label>
             <input required type="text" name="Last Name" id="lastname" placeholder="Last Name">
             </div>
            <div class="input-block">
            <label class="input-label">ID:</label>
            <input required type="text" name="id" id="lastname" placeholder="ID">
             </div>

           <div class="input-block">
                <label class="input-label">Age: </label>
                <input name="age" type="number" placeholder="Age">
            </div>

            <div class="radio">
            <div class="input-block">
                <label class="input-label"><strong>Gender:</strong></label>

                    <label class="input-label" for="male">
                <input type="radio" class="input-radio" name="gender" value="Male">  Male</label>

                 <label class="input-label" for="female">
                <input  type="radio" class="input-radio" name="gender" value="Female">  Female</label>
            </div>
         </div>

        <div class="input-block">
			  <label for="email" class="input-label">Email:</label>
			   <input type="email" name="email" id="email" placeholder="Email">
		   </div>
			<div class="input-block">
		 	   <label for="password" class="input-label">Password:</label>
			   <input type="password" name="passwordd" id="password" placeholder="Password">
		    </div>

         <div class="input-block">
            <label class="input-label" for="typePhone">Phone Number:</label>
            <input type="tel" name="phoneNum" id="typePhone" class="form-control" maxlength="10" minlength="10" placeholder="Phone Number">
          </div>

            <div class="input-block"> 
            <label class="input-label">City:</label>
            <select required type="text" name="city" id="loc" placeholder= " city" >
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
         
         <div class="input-block">
            <label class="input-label" for="bio" >Bio:</label>
            <textarea name="bio" id="bio" rows="5" placeholder="Share a little information about yourself"></textarea>
          </div>

		    <div class="modal-buttons">
                <input class="input-button" type="button" onclick="location.href='tutor Home Page.html';" value="Sign Up" name ="submitT" /><br>
		    </div>
            <p class="sign-up">I have an account? <a href="Sign in.html">Login </a></p>
     
     </div>
	</div>
</form>

 

         

 <footer class="navbar">
  <p> &copy; 2023 Learn online tutoring platform <br>
     <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
     <img src="../images/email_icon.png" alt="Contact Us"></a></p> 
  </footer>
 
 <script src="../js/index.js"></script>
</body>
</html>