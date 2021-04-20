/* function searchProducts() {
    var input, filter, prodList, prod, i;
    input = document.getElementById('searchProducts');
    filter = input.value.toUpperCase();
    prodList = document.getElementById('prodList').getElementsByClassName('searchableData');
    console.log(filter);

    // Loop through product list and display those that match
    for (i = 0; i < prodList.length; i++) {
        prod = prodList[i].textContent;
        if (prod.toUpperCase().indexOf(filter) > -1 && filter.length != 0) {
            prodList[i].style.display = "table-row";
        } else {
            prodList[i].style.display = "none";
        }
    }
} */

function searchProducts(str) {
    if (str.length == 0) {
        document.getElementById("prodList").innerHTML = "";
    } else {
        // Found this in the AJAX PHP section of W3Schools, not entirely sure what's going on with the XMLHttpRequest or states
        var httpreq = new XMLHttpRequest();
        httpreq.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("prodList").innerHTML = this.responseText;
            }
        };
        httpreq.open("GET", "include/searchproducts.php?q=" + str, true);
        httpreq.send();
    }
}


    var hour, greet;
    hour = new Date().getHours();
    greet = document.getElementById('greeting');
    if (hour < 6) {
        greet.innerHTML = "Good morning, you must be an early bird!";
    }
    else if (hour < 12) {
        greet.innerHTML = "Good morning";
    }
    else if (hour < 18) {
        greet.innerHTML = "Good afternoon";
    }
    else {
        greet.innerHTML = "Good evening";
    }