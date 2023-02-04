<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
        <title>Post Job Request</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>
<?php
             $name = isset($_POST["name"])? $_POST["name"]:"";
             $age = isset($_POST["age"])? $_POST["age"]:"";
             $typeclass = isset($_POST["typeclass"])? $_POST["typeclass"]:"";
             $sdate = isset($_POST["sdate"])? $_POST["sdate"]:"";
             $edate = isset($_POST["edate"])? $_POST["edate"]:"";
             $stime = isset($_POST["stime"])? $_POST["stime"]:"";
             $etime = isset($_POST["etime"])? $_POST["etime"]:"";

             $iserror = false;
             $formerrors = array("nameerror"=>false, "ageerror"=>false);

             $classtype = array("");


             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
                    die( "<p>Could not connect to database</p>" );

                 if ( !mysqli_select_db( $database, "Example") )
                    die( "<p>Could not open URL database</p>" );
                 $query="INSERT INTO branch (branch_name, hours, phone) VALUES ('".$branch_name."','".$hours."','".$phone."');";
                 $result=mysqli_query($database, $query);

                 if($result)
                     header("location: allbranches.php");
        
                 else
                     echo "An error occured while inserting into the branch table.";
             }
        ?>

</body>
</html>