<nav>
    <div class="navbar">
        <a id="navhome" href="index.php"><i class="fas fa-home"></i> Home</a>
        <div class="subnav">
            <button id="navwelcome" class="subnavbtn" type="button" onclick="window.location.href = 'welcome.php'"><i class="fas fa-shopping-cart"></i> Products <i class="fas fa-angle-down"></i></button>
            <div class="subnav-content">
                <a id="navcurrency" href="currency.php">Currency Exchange</a>
                <a id="navservice2" href="#">Service 2</a>
            </div>
        </div>
        <div class="subnav">
            <button id="navcontact" class="subnavbtn" type="button" onclick="window.location.href = 'contact.php'"><i class="fas fa-envelope"></i> Contact <i class="fas fa-angle-down"></i></button>
            <div class="subnav-content">
                <a id="navfrench" href="#"><img class = "flagIcon" src="images/france.png" alt="French Flag"> Contactez-nous</a>
                <a id="navspanish" href="#"><img class = "flagIcon" src="images/spain.png" alt="Spanish Flag"> Cont&#xE1;ctenos</a>
            </div>
        </div>
        <a id="navabout" href="aboutme.php"><i class="fas fa-info-circle"></i> About</a>
        <span id="greeting"></span>
        <script>
            var pagePath = window.location.pathname;
            console.log(pagePath);
            if (pagePath.indexOf("index") >= 0) {
                document.getElementById("navhome").style.backgroundColor = "rgb(153, 51, 51)";
            } else if (pagePath.indexOf("welcome") >= 0) {
                document.getElementById("navwelcome").style.backgroundColor = "rgb(153, 51, 51)";
            } else if (pagePath.indexOf("currency") >= 0) {
                document.getElementById("navcurrency").style.backgroundColor = "rgb(153, 51, 51)";
            } else if (pagePath.indexOf("contact") >= 0) {
                document.getElementById("navcontact").style.backgroundColor = "rgb(153, 51, 51)";
            } else if (pagePath.indexOf("aboutme") >= 0) {
                document.getElementById("navabout").style.backgroundColor = "rgb(153, 51, 51)";
            } else {
                console.log("Page not in navbar");
            }
        </script>
    </div>
</nav>