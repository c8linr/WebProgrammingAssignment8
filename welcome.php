<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <!-- Author: Caitlin Ross, ross0272@algonquinlive.com, Student Number: 040750891 -->
    <!-- For CST8285, Section 800 -->
    <title>Welcome</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://kit.fontawesome.com/3ef4dec148.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'include/navbar.php';?>
    <?php
        // Delcare variables
        $fname = "";
        $lname = "";
        $howdy =  "Howdy ";

        // If the $_GET array has the firstName and/or lastName, initialize those variables accordingly
        if(array_key_exists("firstName", $_GET)){
            $fname = $_GET["firstName"];
        }
        if(array_key_exists("lastName", $_GET)) {
            $lname = $_GET["lastName"];
        }

        // Seriously, this is way longer than it should be, just to avoid extra whitespace
        if (strlen($fname) <= 0 && strlen($lname) <= 0) {
            $howdy.="no names"; // Both names are blank, use "no names" instead
        } elseif (strlen($fname) <= 0 xor strlen($lname) <= 0) {
            $howdy .= $fname . $lname; // Add both with no space, since one is a blank string
        } else {
            $howdy .= $fname . " " . $lname; // Add both names with a space between
        }

        // Display message
        echo $howdy;
    ?>
    <?php include 'include/footer.php';?>
</body>
</html>