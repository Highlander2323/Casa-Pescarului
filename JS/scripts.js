function dropdownFunction() {
    console.log("da");
        var x = document.getElementById("dropdown_content");
         if (x.style.display === "block") {
               x.style.display = "none";
               document.getElementById("menuimg").src="../images/menu.png";
                } else {
                    x.style.display = "block";
                    document.getElementById("menuimg").src="../images/previous.png";
                }
            }