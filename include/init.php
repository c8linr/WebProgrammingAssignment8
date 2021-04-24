<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment8";

    // Create the database named assignment8
    // Open the connection to the db
    $conn = new mysqli($servername, $username, $password);

    // Check if the connection opened properly
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;
    if ($conn->query($sql) === TRUE) {
        //echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // Create the ITEMS table
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check if the connection opened properly
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS items ( ";
    $sql .= "prodID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, ";
    $sql .= "prodName VARCHAR(32) NOT NULL, ";
    $sql .= "prodType VARCHAR(32) NOT NULL, ";
    $sql .= "prodColours VARCHAR(64), ";
    $sql .= "prodPattern VARCHAR(32), ";
    $sql .= "prodSize VARCHAR(16), ";
    $sql .= "prodDesc VARCHAR(256) )";

    if ($conn->query($sql) === TRUE) {
        //echo "ITEMS table created successfully";
    } else {
        echo "Error creating ITEMS table: " . $conn->error;
    }

    /* // Insert data from the myinput.csv file
    // Open connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verify the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Open the csv file
    $prodFile = fopen("include/myinput.csv", "r") or die("Could not open file");
    $itemList = array(); // Empty array will hold lineNum and newItem for each item
    $lineNum = 1; // Keep track of line number
    while (!feof($prodFile)) {
        $nextLine = fgets($prodFile);
        $fields = explode(",", $nextLine);
        // If statement to prevent getting the header or a blank at the end
        if(sizeof($fields) >= 7 && is_numeric($fields[0])) {
            $sql = "INSERT INTO items (prodName, prodType, prodColours, prodPattern, prodSize, prodDesc) VALUES (";
            for ($x = 1; $x <=5; $x++) { // Start loop at 1 to avoid getting the item number at index 0
                $sql .= "'" . $fields[$x] . "', ";
            }
            $sql .= "'" . $fields[6] . "')"; // Manually add last field in order to have a close bracket instead of a comma
            if ($conn->query($sql) === TRUE) {
                echo "Record for $fields[1] created successfully";
            } else {
                echo "Error creating record for $fields[1]: " . $conn->error;
            }
        }
    } // Note: had to go back and change the pattern and desc for all Ram's Horn patterns. The apostrophe messed up the SQL syntax, so I fixed and added them after.
    fclose($prodFile);  */ // This block is commented out to avoid creating duplicate records in the database
    $conn->close();
    // New connections were established each time because I coded this in stages. I got the CREATE DATABASE working, then the CREATE TABLE, then inserting the data.
?>