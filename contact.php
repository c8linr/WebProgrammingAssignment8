<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <!-- Author: Caitlin Ross, ross0272@algonquinlive.com, Student Number: 040750891 -->
  <!-- For CST8285, Section 800 -->
  <title>Contact</title>
  <link rel="stylesheet" href="css/style.css" />
  <script src="https://kit.fontawesome.com/3ef4dec148.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include 'include/navbar.php';?>
  <div id="top">
    <header>
      <h1>Contact Us</h1>
      <p>Please complete the information below. Fields marked with <span class="required">*</span> are required fields
      </p>
    </header>
  </div>
  <div id="data">
    <form action="mailto:sample@example.com" method="post">
      <fieldset>
        <legend> Your Data </legend>
        <table class="input">
          <tr>
            <td><label for="firstname">First Name <span class="required">*</span> </label></td>
            <td><input type="text" id="firstname" name="firstname" required></td>
          </tr>
          <tr>
            <td><label for="lastname">Last Name <span class="required">*</span> </label></td>
            <td><input type="text" id="lastname" name="lastname" required></td>
          </tr>
          <tr>
            <td><label for="address">Street Address <span class="required">*</span> </label></td>
            <td><input type="text" id="address" name="address" required></td>
          </tr>
          <tr>
            <td><label for="city">City <span class="required">*</span> </label></td>
            <td><input type="text" id="city" name="city" required></td>
          </tr>
          <tr>
            <td><label for="province">Province <span class="required">*</span> </label></td>
            <td><select id="province" name="province" size="13" required>
                <option value="ab">AB</option>
                <option value="bc">BC</option>
                <option value="mb">MB</option>
                <option value="nb">NB</option>
                <option value="nl">NL</option>
                <option value="nt">NT</option>
                <option value="ns">NS</option>
                <option value="nu">NU</option>
                <option value="on">ON</option>
                <option value="pe">PE</option>
                <option value="qc">QC</option>
                <option value="sk">SK</option>
                <option value="yt">YT</option>
              </select></td>
          </tr>
          <tr>
            <td><label for="postcode">Postal Code <span class="required">*</span> </label></td>
            <td><input type="text" id="postcode" name="postcode" required></td>
          </tr>
          <tr>
            <td><label for="email">Email Address <span class="required">*</span> </label></td>
            <td><input type="text" id="email" name="email" pattern="[A-Za-z0-9_]+@[A-Za-z0-9_]+[.][A-Za-z]+" required>
            </td>
          </tr>
          <tr>
            <td><label for="phone">Phone Number <span class="required">*</span> </label></td>
            <td><input type="text" id="phone" name="phone" pattern="[0-9]{10}" required></td>
          </tr>
        </table>
      </fieldset>
      <fieldset>
        <legend> Agreement </legend>
        <input type="checkbox" id="agree" name="agree" value="agree" required>
        <label for="agree"> Accept Agreement <span class="required">*</span></label>
        <input type="reset">
        <input type="submit" value="Submit">
      </fieldset>
    </form>
  </div>
  
  <?php include 'include/footer.php';?>
</body>

</html>