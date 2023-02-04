<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Request list</title>

        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>

    <body>

        <header id="navbar" class="page-header">
         <nav class="navbar-container">
            <!-- logo -->
                  <a href="parent Home Page.html" id="l"><img class="logo" src="../images/Logo.PNG" alt="logo" > </a>
        
            <!-- الزر الي يظهر عند التصغير  -->
                  <button type="button" id="navbar-toggle" aria-controls="navbar-menu"  aria-label="Toggle menu" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
        
            <!--العناصر الي بتوجد في الهيدر + في الزر عند التصغير  -->
                  <div id="navbar-menu" aria-labelledby="navbar-toggle">
                      <ul class="nav__links">
                         <li class="navbar-item"><a href="parent Home Page.html" class="nav__link" >Home</a> </li>
                         <li class="navbar-item"><a href="mailto:LearnInfo.sa@gmail.com" class="nav__link">Contact us</a></li>
        
                         <li class="nav-item dropdown">
                            <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">My Bookings ⌄</a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="currentbooking.html">Current Bookings</a></li>
                              <li><a class="dropdown-item" href="previousbooking.html">Previous Bookings</a></li>
                            </ul>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="../images/person_icon.png" class="My-Profile" alt="My Profile"> </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="Parentprofile.html">Manage Profile</a></li>
                              <li><a class="dropdown-item" href="index.html">Log Out</a></li>
                            </ul>
                          </li>
        
                      </ul>
                     </div>
                 </nav>
        </header>



        <div class="request" id="req">
         <div class="back-button"><a href="parent Home Page.html"><button type="submit">&lt;</button></a></div>
           <h2 id="heading">Request List</h2>

          <?php 
          if ( !( $database = mysqli_connect("localhost","iw3htp","password" ) ) )
                die( "<p>Could not connect to database</p>" );

          if ( !mysqli_select_db( $database, "Learn") )
                die( "<p>Could not open URL database</p>" );

         $query1="SELECT * FROM User Parent WHERE Email='$_SESSION['EmailParent']' ";
         $result1=mysqli_query($database, $query1);

         foreach($result1 as $key => $value)
         {
           if($key > 1)
           $Parentname += $value;
           if($key == 3)
           break;
         }
         mysqli_close($database); 

         if ( !( $database = mysqli_connect("localhost","iw3htp","password" ) ) )
                die( "<p>Could not connect to database</p>" );

          if ( !mysqli_select_db( $database, "Learn") )
                die( "<p>Could not open URL database</p>" );

         $query="SELECT * FROM PostRequest WHERE Parent name ='$Parentname' ";

         if( !($result2=mysqli_query($database, $query)))
               {
                print("<p>Could not execute query!</p>");
                die( mysqli_error() );
               }

         mysqli_close($database); 

         if ( !( $database = mysqli_connect("localhost","iw3htp","password" ) ) )
                die( "<p>Could not connect to database</p>" );

          if ( !mysqli_select_db( $database, "Learn") )
                die( "<p>Could not open URL database</p>" );

         $query2="SELECT * FROM Offers WHERE Parent name ='$Parentname' ";

         if( !($result3=mysqli_query($database, $query2)))
               {
                print("<p>Could not execute query!</p>");
                die( mysqli_error() );
               }

         mysqli_close($database); 

         while($row = mysqli_fetch_row($result2))
         {
           foreach($row as $key => $value)
           {
            if()
           }
         }
       

 

            <div class="request-block">
                <div class="ID">
                   <h4>1</h4>
                </div>
                <div class="request-button"><a href="Offer list1 Parent.html"><button>offer</button></a></div>
                   <div><p class="request-p">
                      Kid's Name: <span> Lona Abdullah</span>
                      Kid's Age: <span> 10 years old</span>
                      Type Of Class: <span> English</span>
                      Start Date - End Date: <span> 01/11/2023 - 20/1/2023</span>
                      Start Time - End Time: <span> 12:00 PM - 2:00 PM</span>
                   </p></div>
              
                  </div>

            <div class="request-block">
                <div class="ID">
                   <h4>3</h4>
                </div>
                <div class="request-button"><button type="submit">Edit</button></div>
                <div class="request-button2"><button type="submit">Cancel</button></div>
                   <div><p class="request-p">
                      Kid's Name: <span> Waleed Abdullah</span>
                      Kid's Age: <span> 15 years old </span>
                      Type Of Class: <span> Other </span>
                      Start Date - End Date: <span> 02/02/2023 - 05/02/2023</span>
                      Start Time - End Time: <span>1:00 PM - 3:00 PM</span>
                   </p></div>
              
            </div>

            
              
            </div>
 


        <footer class="navbar" >
         <p> &copy; 2023 Learn online tutoring platform <br>
         <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
         <img src="../images/email_icon.png" alt="Contact Us"></a></p>
      </footer>

        <script src="../js/index.js"></script>
    </body>
</html>