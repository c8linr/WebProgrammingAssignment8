<?php
    // Set the variables that hold the database info
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment8";

    // Open the connection to the db
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check the connection
    if ($conn->connect_error) {
        die("Could not connect to database: " . $conn->connect_error);
    }

    $searchterm = $_REQUEST["q"];
    $sql = "SELECT * FROM items WHERE prodName LIKE '%$searchterm%';";
    //echo $sql;
    $result = $conn->query($sql);
    if (!$result) die("Something went wrong: " . $sql);
    $resulttable = "<tr id=\"tableHeader\"><th>ID #</th><th>Name</th><th>Product Type</th><th>Colourway</th><th>Weave Pattern</th><th>Size</th><th>Description</th></tr>";

    if ($result->num_rows > 0) {
        //output data for each row
        while($row = $result->fetch_assoc()) {
            $resulttable .= "<tr><td>";
            $resulttable .= $row["prodID"] . "</td><td>";
            $resulttable .= $row["prodName"] . "</td><td>";
            $resulttable .= $row["prodType"] . "</td><td>";
            $resulttable .= $row["prodColours"] . "</td><td>";
            $resulttable .= $row["prodPattern"] . "</td><td>";
            $resulttable .= $row["prodSize"] . "</td><td>";
            $resulttable .= $row["prodDesc"] . "</td></tr> ";
        }
        echo $resulttable;
        $result->close();
    } else {
        echo "No matching products";
    }
    $conn->close();
?>