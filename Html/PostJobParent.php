<?php 
    session_start();

    if(!isset($_SESSION['EmailParent']))
      header("Location: index.html?error=Please login again!");

    else
    {
?>
<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
        <title>Post Job Request</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>
<?php
if ( !( $database = mysqli_connect("localhost","iw3htp","password" ) ) )
die( "<p>Could not connect to database</p>" );

if ( !mysqli_select_db( $database, "Learn") )
die( "<p>Could not open URL database</p>" );

$query1="SELECT * FROM User Parent WHERE Email='$_SESSION['EmailParent']' ";
$result=mysqli_query($database, $query1);

 foreach($result as $key => $value)
 {
    if($key > 1)
 $Parentname += $value;
 if($key == 3)
 break;
 }
 mysqli_close($database);
 
             $name = isset($_POST["name"])? $_POST["name"]:"";
             $age = isset($_POST["age"])? $_POST["age"]:"";
             $typeclass = isset($_POST["typeclass"])? $_POST["typeclass"]:"";
             $sdate = isset($_POST["sdate"])? $_POST["sdate"]:"";
             $edate = isset($_POST["edate"])? $_POST["edate"]:"";
             $stime = isset($_POST["stime"])? $_POST["stime"]:"";
             $etime = isset($_POST["etime"])? $_POST["etime"]:"";

             $iserror = false;
             $formerrors = array("nameerror"=>false);
             $formerrors2 = array("ageerror"=>false);
             $formerrors3 = array("sdateerror"=>false, "edateerror"=>false);
             $formerrors4 =array("stimeerror"=>false, "etimeerror"=>false);

             $classtype = array("Arabic","English","Math","Physics","Biology","chemistry","other");

             $inputlist = array("name" => "Kid name");
             $inputlist2 = array("age" => "Kid age");
             $inputlist3 = array("sdate"=>"Start Date", "edate"=>"End Date");
             $inputlist4 = array("stime"=>"Start Time", "etime"=>"End Time");
             if(isset($_POST["submit"]))
             {
                If($name == "")
                {
                    $formerrors["nameerror"]   == true;
                    $iserror = true;
                }
                If($age == "")
                {
                    $formerrors2["ageerror"]   == true;
                    $iserror = true;
                }
                If($sdate == "")
                {
                    $formerrors3["sdateerror"]   == true;
                    $iserror = true;
                }
                If($edate == "")
                {
                    $formerrors3["edateerror"]   == true;
                    $iserror = true;
                }
                If($stime == "")
                {
                    $formerrors3["stimeerror"]   == true;
                    $iserror = true;
                }
                If($etime == "")
                {
                    $formerrors3["etimeerror"]   == true;
                    $iserror = true;
                } 
             

             if(!$iserror)
             {
                $query = "INSERT INTO PostRequest ". "(Parent name,Name,Age,Type of class,Start date,End date,Start time,End time)" 
                . "VALUES('$Parentname','$name','$age','$sdate','$edate','$stime','$etime')"

                if ( !( $database = mysqli_connect("localhost","iw3htp","password" ) ) )
                die( "<p>Could not connect to database</p>" );
                
                if ( !mysqli_select_db( $database, "Learn") )
                die( "<p>Could not open URL database</p>" );
                
               if( !($result=mysqli_query($database, $query)))
               {
                print("<p>Could not execute query!</p>");
                die( mysqli_error() );
               }
                
                 mysqli_close($database);
                 print("</body></html>");
                 die();

             }
             }

             print("<header  id='navbar' >
             <nav class='navbar-container'>
               <!-- logo -->
                     <a href='parent Home Page.html' id='l'><img class='logo' src='../images/Logo.PNG' > </a>
           
               <!-- الزر الي يظهر عند التصغير  -->
                     <button type='button' id='navbar-toggle' aria-controls='navbar-menu'  aria-label='Toggle menu' aria-expanded='false'>
                       <span class='icon-bar'></span>
                       <span class='icon-bar'></span>
                       <span class='icon-bar'></span>
                     </button>
           
               <!--العناصر الي بتوجد في الهيدر + في الزر عند التصغير  -->
                     <div id='navbar-menu' aria-labelledby='navbar-toggle'>
                         <ul class='nav__links'>
                            <li class='navbar-item'><a href='parent Home Page.html' class='nav__link' >Home</a> </li>
                            <li class='navbar-item'><a href='mailto:LearnInfo.sa@gmail.com' class='nav__link'>Contact us</a></li>
           
                            <li class='nav-item dropdown'>
                               <a class='nav-link' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>My Bookings ⌄</a>
                               <ul class='dropdown-menu'>
                                 <li><a class='dropdown-item' href='currentbooking.html'>Current Bookings</a></li>
                                 <li><a class='dropdown-item' href='previousbooking.html'>Previous Bookings</a></li>
                               </ul>
                             </li>
                             <li class='nav-item dropdown'>
                               <a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'><img src='../images/person_icon.png' class='My-Profile' alt='My Profile'> </a>
                               <ul class='dropdown-menu'>
                                 <li><a class='dropdown-item' href='Parentprofile.html'>Manage Profile</a></li>
                                 <li><a class='dropdown-item' href='index.html'>Log Out</a></li>
                               </ul>
                             </li>
           
                         </ul>
                        </div>
                    </nav>
           </header>");
           print("<form action='PostJobParent.php' method='post'>
           <div class='modal' id='modal-request'>
           <div class='modal-left' id='modal-left-req'>
                 <h1>New job request</h1>
                 <p class='p'>Please fill up your kid's information to request tutor :</p>");
            
            foreach( $inputlist as $inputname => $inputalt) 
            {
                print("<div class='input-block'>
                <label class='input-label'>$inputalt:</label>
                <input name='$inputname' type='text' placeholder='$inputname'></div>");

                if( $formerrors[($inputname)."error"] == true)
                {
                    print("<span class ='error'>*</span>")
                }
            }   
            foreach( $inputlist2 as $inputname => $inputalt) 
            {
                print("<div class='input-block'>
                <label class='input-label'>$inputalt:</label>
                <input name='$inputname' type='number' placeholder='$inputname'></div>");

                if( $formerrors2[($inputname)."error"] == true)
                {
                    print("<span class ='error'>*</span>")
                }
            }  

            print("<div class='input-block'>
            <label class='input-label'>Type of class: </label>
             <select name='typeclass'>
               <option selected>Select Class Type</option>")

            foreach( $classtype as $currenttype) 
            {
                print("<option " );

                if( (!$typeclass && $counter == 0)|| (($currenttype == $typeclass)))
                {
                    print("selected>$currenttype</option>")
                }
                else{
                print(">$currenttype</option>" );
               ++$counter;
            }
            } 
            print("</select></div>"); 
           
            foreach( $inputlist3 as $inputname => $inputalt) 
            {
                print("<div class='input-block'>
                <label class='input-label'>$inputalt:</label>
                <input name='$inputname' type='date' placeholder='$inputname'></div>");

                if( $formerrors3[($inputname)."error"] == true)
                {
                    print("<span class ='error'>*</span>")
                }
            }  

            foreach( $inputlist4 as $inputname => $inputalt) 
            {
                print("<div class='input-block'>
                <label class='input-label'>$inputalt:</label>
                <input name='$inputname' type='date' placeholder='$inputname'></div>");

                if( $formerrors4[($inputname)."error"] == true)
                {
                    print("<span class ='error'>*</span>")
                }
            } 

            print("<div class='modal-buttons'>
            <input name='submit' type='submit' class='input-button' value='Request'>
             </div></div>");

            print("<div class='modal-right'>
            <img src='../images/job.jpeg' alt='fil info' class='req__img'>
            </div></div></form>");

            print("<footer class='navbar' id='page_footer'>
            <p> &copy; 2023 Learn online tutoring platform <br>
            <a href='mailto:LearnInfo.sa@gmail.com' style=' color: #8c7569 ;'>Contact Us
            <img src='../images/email_icon.png' alt='Contact Us'></a></p>  
         </footer>
         <script src='../js/index.js'></script>");

        ?>

</body>
</html>
<?php 
    }
    ?>