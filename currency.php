<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <!-- Author: Caitlin Ross, ross0272@algonquinlive.com, Student Number: 040750891 -->
    <!-- For CST8285, Section 800 -->
    <title>Currency Converter</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://kit.fontawesome.com/3ef4dec148.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'include/navbar.php'; ?>
    <?php
        $amount = $result = 0.0;
        $in_curr = $out_curr = "";
        $in_curr_err = $out_curr_err = $amount_err = "";
        $from_img = $to_img = "";
        $from_sym = $to_sym = "";
        $display_result = false;

        // Only handles data AFTER the form has been submitted (in theory)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["incurr"])) {
                $in_curr_err = "Starting Currency is required";
            } else {
                $in_curr = neuter_text($_POST["incurr"]);
                $in_curr_err = "";
            }
            if (empty($_POST["outcurr"])) {
                $out_curr_err = "Ending Currency is required";
            } else {
                $out_curr = neuter_text($_POST["outcurr"]);
                $out_curr_err = "";
            }
            if (empty($_POST["amount"])) {
                $amount_err = "Amount is required";
            } else {
                if (!is_numeric($_POST["amount"])) {
                    $amount_err = "Invalid input";
                } else {
                    $amount = floatval($_POST["amount"]);
                    $amount_err = "";
                }
            }
            // Check that no errors are present before calculating the conversion
            if (strlen($in_curr_err) <= 0 && strlen($out_curr_err) <= 0 && strlen($amount_err) <= 0) {
                $display_result=true;
                $result = convert_curr($amount, $in_curr, $out_curr);
                $from_img = set_img($in_curr);
                $to_img = set_img($out_curr);
                $from_sym = set_sym($in_curr);
                $to_sym = set_sym($out_curr);
            }
        }

        // Adapted from W3Schools, used to prevent code injections
        function neuter_text($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Converts the amount from one currency to another
        function convert_curr($value, $from_curr, $to_curr) {
            // Exchange rates as of 3:45pm, Mar 10, 2021
            // There are more elegant ways of doing this. A 2D array would probably be better
            // Also, using some sort of API to get current exchange rates would be better too
            $conv_factor = 1.0;
            if ($from_curr == "incad"){
                if ($to_curr == "outusd") {
                    $conv_factor = 0.7920527594441;
                } elseif ($to_curr == "outeur") {
                    $conv_factor = 0.66431133853105;
                } elseif ($to_curr == "outgbp") {
                    $conv_factor = 0.56860500595446;
                } elseif ($to_curr == "outcny") {
                    $conv_factor = 5.1534348978367;
                } else {
                    $conv_factor = 1.0;
                }
            } elseif ($from_curr == "inusd") {
                if ($to_curr == "outcad") {
                    $conv_factor = 1.2624706478;
                } elseif ($to_curr == "outeur") {
                    $conv_factor = 0.8386520987;
                } elseif ($to_curr == "outgbp") {
                    $conv_factor = 0.7177893046;
                } elseif ($to_curr == "outcny") {
                    $conv_factor = 6.5059174379;
                } else {
                    $conv_factor = 1.0;
                }
            } elseif ($from_curr == "ineur") {
                if ($to_curr == "outcad") {
                    $conv_factor = 1.5054960171183;
                } elseif ($to_curr == "outusd") {
                    $conv_factor = 1.1924413293863;
                } elseif ($to_curr == "outgbp") {
                    $conv_factor = 0.85586110451313;
                } elseif ($to_curr == "outcny") {
                    $conv_factor = 7.7580671673704;
                } else {
                    $conv_factor = 1.0;
                }
            } elseif ($from_curr == "ingbp") {
                if ($to_curr == "outcad") {
                    $conv_factor = 1.7590733635907;
                } elseif ($to_curr == "outusd") {
                    $conv_factor = 1.3934409815002;
                } elseif ($to_curr == "outeur") {
                    $conv_factor = 1.1683788922016;
                } elseif ($to_curr == "outcny") {
                    $conv_factor = 9.0641646606248;
                } else {
                    $conv_factor = 1.0;
                }
            } elseif ($from_curr == "incny") {
                if ($to_curr == "outcad") {
                    $conv_factor = 0.19403361032847;
                } elseif ($to_curr == "outusd") {
                    $conv_factor = 0.15371840837405;
                } elseif ($to_curr == "outeur") {
                    $conv_factor =0.12890313109074;
                } elseif ($to_curr == "outgbp") {
                    $conv_factor = 0.11032558258147;
                } else {
                    $conv_factor = 1.0;
                }
            } else {
                //something went very wrong
            }
            return $conv_factor * $value;
        }

        function set_img($curr) {
            if ($curr == "incad" || $curr == "outcad") {
                return "canada.png";
            } elseif ($curr == "inusd" || $curr == "outusd") {
                return "unitedstates.png";
            } elseif ($curr == "ineur" || $curr == "outeur") {
                return "europeanunion.png";
            } elseif ($curr == "ingbp" || $curr == "outgbp") {
                return "unitedkingdom.png";
            } elseif ($curr == "incny" || $curr == "outcny") {
                return "china.png";
            } else {
                //something went wrong
                return "";
            }
        }
        function set_sym($curr) {
            if ($curr == "incad" || $curr == "outcad") {
                return "&dollar;";
            } elseif ($curr == "inusd" || $curr == "outusd") {
                return "&dollar;";
            } elseif ($curr == "ineur" || $curr == "outeur") {
                return "&euro;";
            } elseif ($curr == "ingbp" || $curr == "outgbp") {
                return "&pound;";
            } elseif ($curr == "incny" || $curr == "outcny") {
                return "&yen;";
            } else {
                //something went wrong
                return "";
            }
        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="currencyform">
        <label for="amount">Amount</label>
        <input type="text" id="amount" name="amount">
        <br>
        <fieldset>
            <legend>Convert From: </legend>
            <input type="radio" id="incad" name="incurr" value="incad">
            <label for="incad"> <img src="images/canada.png" alt="Canadian Dollar"> Canadian Dollar</label><br>
            <input type="radio" id="inusd" name="incurr" value="inusd">
            <label for="inusd"> <img src="images/unitedstates.png" alt="American Dollar"> American Dollar</label><br>
            <input type="radio" id="ineur" name="iincurrnput" value="ineur">
            <label for="ineur"> <img src="images/europeanunion.png" alt="Euro"> Euro</label><br>
            <input type="radio" id="ingbp" name="incurr" value="ingbp">
            <label for="ingbp"> <img src="images/unitedkingdom.png" alt="British Pound"> British Pound</label><br>
            <input type="radio" id="incny" name="incurr" value="incny">
            <label for="incny"> <img src="images/china.png" alt="Chinese Yuan"> Chinese Yuan</label><br>
        </fieldset>
        <fieldset>
            <legend>Covert To: </legend>
            <input type="radio" id="outcad" name="outcurr" value="outcad">
            <label for="outcad"> <img src="images/canada.png" alt="Canadian Dollar"> Canadian Dollar</label><br>
            <input type="radio" id="outusd" name="outcurr" value="outusd">
            <label for="outusd"> <img src="images/unitedstates.png" alt="American Dollar"> American Dollar</label><br>
            <input type="radio" id="outeur" name="outcurr" value="outeur">
            <label for="outeur"> <img src="images/europeanunion.png" alt="Euro"> Euro</label><br>
            <input type="radio" id="outgbp" name="outcurr" value="outgbp">
            <label for="outgbp"> <img src="images/unitedkingdom.png" alt="British Pound"> British Pound</label><br>
            <input type="radio" id="outcny" name="outcurr" value="outcny">
            <label for="outcny"> <img src="images/china.png" alt="Chinese Yuan"> Chinese Yuan</label><br>
        </fieldset>
        <input type="submit" value="Submit">
    </form>
    <span class="error"><?php echo $in_curr_err . "<br>" . $out_curr_err . "<br>" . $amount_err;?></span>
    <span class="result">
        <?php
            if ($display_result) {
                echo "<img class=\"flagIcon\" src=\"$from_img\" alt=\"Original Currency\"> $from_sym$amount = <img src=\"$to_img\" alt=\"Resulting Currency\"> $to_sym$result";
            }
        ?>
    </span>
    <?php include 'include/footer.php';?>
</body>
</html>