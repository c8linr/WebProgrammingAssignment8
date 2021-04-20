<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Author: Caitlin Ross, ross0272@algonquinlive.com, Student Number: 040750891 -->
  <!-- For CST8285, Section 800 -->
  <meta charset="UTF-8" />
  <title>CAJR Fibre Arts</title>
  <link rel="stylesheet" href="css/style.css" />
  <script src="https://kit.fontawesome.com/3ef4dec148.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include 'include/navbar.php';?>
  <?php include 'include/init.php';?>
    <?php
      class Item {
        // Properties are public for now (should change later)
        public $itemNumber;
        public $name;
        public $type;
        public $colourway;
        public $pattern;
        public $size;
        public $description;

        // Constructor using an array of fields
        function __construct($fields) {
          $this->itemNumber = $fields[0];
          $this->name = $fields[1];
          $this->type = $fields[2];
          $this->colourway = $fields[3];
          $this->pattern = $fields[4];
          $this->size = $fields[5];
          $this->description = $fields[6];
        }

        // Return the Item as a string, not needed anymore
        function display() {
          return "#" . $this->itemNumber . " " . $this->name . ": " . $this->description;
        }

        // Return the Item as a row in an HTML table
        function displayAsTableRow() {
          return "<tr class=\"searchableData\"><td>$this->itemNumber</td><td>$this->name</td><td>$this->type</td><td>$this->colourway</td>
          <td>$this->pattern</td><td>$this->size</td><td>$this->description</td></tr>";
        }
      }

    ?>
    <p id="welcome">Welcome to the online store for CAJR Fibre! Please use the search box below to find a product.</p>
    
    <input type="text" id="searchProducts" onkeyup="searchProducts(this.value)" placeholder="Search for products...">
    <table id="prodList"></table>
  <?php include 'include/footer.php';?>
</body>

</html>