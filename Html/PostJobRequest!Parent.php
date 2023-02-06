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
  <body >

    <header  id="navbar" >
      <nav class="navbar-container">
        <!-- logo -->
              <a href="parent Home Page.html" id="l"><img class="logo" src="../images/Logo.PNG" > </a>
    
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
    
    <form action="PostJobParent.php" method="post">
        <div class="modal" id="modal-request">
          
            <div class="modal-left" id="modal-left-req">
                 <h1>New job request</h1>
                 <p class="p">Please fill up your kid's information to request tutor :</p>
    
                 <div class="input-block">
                <label class="input-label">Name:</label>
                <input name="name" type="text" placeholder="Name"></div>
            
                 <div class="input-block">
                <label class="input-label">Age: </label>
                <input name="age" type="number" placeholder="Age"></div>
            
                 <div class="input-block">
                <label class="input-label">Type of class: </label>
                 <select name="type">
                   <option selected>Select Class Type</option>
                   <option>Arabic</option>
                   <option>English</option>
                   <option>Math</option>
                   <option>Physics</option>
                   <option>Biology</option>
                   <option>Chemistry</option>
                   <option>other</option>
                 </select></div>
           
                <div class="input-block">
                <label class="input-label">Start Date:</label>
                 <input name="date" type="date"  class="Duration">
              
                 <label class="input-label">End Date:</label>
                 <input name="date" type="date" class="Duration">
                </div>

               <div class="input-block">
                <label class="input-label">Start time:</label>
                 <input name="date" type="time"  class="Duration">
            
                 <label class="input-label">End time:</label>
                 <input name="date" type="time"  class="Duration">
                 </div>

                 <div class="modal-buttons">
                <input type="submit" class="input-button" value="Request">
                 </div>
                </div>

                <div class="modal-right">
               <img src="../images/job.jpeg" alt="fil info" class="req__img">
               </div> 
            </div>
    </form>
    
             
    
    <footer class="navbar" id="page_footer">
        <p> &copy; 2023 Learn online tutoring platform <br>
        <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
        <img src="../images/email_icon.png" alt="Contact Us"></a></p>  
     </footer>
     <script src="../js/index.js"></script>
    </body>
</html>
<?php } ?>