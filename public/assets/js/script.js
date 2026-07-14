/*
=========================================
Lost & Found Kampus
Main Javascript
=========================================
*/

document.addEventListener("DOMContentLoaded", function () {

    /* ==========================
       Navbar Scroll Effect
    ========================== */

    const navbar = document.getElementById("mainNavbar");

    window.addEventListener("scroll", function () {

        if (window.scrollY > 50) {

            navbar.classList.add("scrolled");

        } else {

            navbar.classList.remove("scrolled");

        }

    });

    /* ==========================
       Back To Top
    ========================== */

    const backToTop = document.getElementById("backToTop");

    window.addEventListener("scroll", function () {

        if (window.scrollY > 300) {

            backToTop.style.display = "flex";

            backToTop.style.alignItems = "center";

            backToTop.style.justifyContent = "center";

        } else {

            backToTop.style.display = "none";

        }

    });

    backToTop.addEventListener("click", function () {

        window.scrollTo({

            top: 0,

            behavior: "smooth"

        });

    });

    /* ==========================
       Active Navbar
    ========================== */

    const links = document.querySelectorAll(".navbar-nav .nav-link");

    links.forEach(link => {

        link.addEventListener("click", function () {

            links.forEach(item => item.classList.remove("active"));

            this.classList.add("active");

        });

    });

    /* ==========================
       Tooltip Bootstrap
    ========================== */

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');

    [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el));

    /* ==========================
       Fade Animation Card
    ========================== */

    const cards = document.querySelectorAll(".card, .item-card, .feature-card");

    const observer = new IntersectionObserver(entries => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                entry.target.classList.add("fade-up");

            }

        });

    });

    cards.forEach(card => {

        observer.observe(card);

    });

    /* ==========================
       Search Animation
    ========================== */

    const search = document.querySelector(".search-box input");

    if (search) {

        search.addEventListener("focus", function () {

            this.parentElement.style.transform = "scale(1.02)";

        });

        search.addEventListener("blur", function () {

            this.parentElement.style.transform = "scale(1)";

        });

    }

});