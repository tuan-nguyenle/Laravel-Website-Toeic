document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            if (window.innerWidth < 992) {
                document
                    .getElementById("nav__header")
                    .classList.add("fixed-top", "bg-white");
            } else {
                document
                    .getElementById("nav_menu")
                    .classList.add("fixed-top", "bg-white");
            }
            // add padding top to show content behind navbar
            navbar_height = document.querySelector(".navbar").offsetHeight;
            document.body.style.paddingTop = navbar_height + "px";
        } else {
            document.getElementById("nav_menu").classList.remove("fixed-top");
            document
                .getElementById("nav__header")
                .classList.remove("fixed-top");
            // remove padding top from body
            document.body.style.paddingTop = "0";
        }
    });
});
