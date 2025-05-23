function startNow() {
    alert("Get started with ID creation!");
}

document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar");
    const navbarHeight = navbar ? navbar.offsetHeight : 0; // Prevent error if navbar is missing

    document.querySelectorAll(".nav-link").forEach(link => {
        link.addEventListener("click", function (event) {
            const targetId = this.getAttribute("href").substring(1); // Remove #
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                event.preventDefault(); // Only prevent default if the target exists
                const targetPosition = targetElement.offsetTop - navbarHeight; // Adjust for navbar height
                window.scrollTo({
                    top: targetPosition,
                    behavior: "smooth"
                });
            }
        });
    });

    // Close navbar on link click (for mobile view)
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            const navbarCollapse = document.querySelector('.navbar-collapse');
            if (navbarCollapse.classList.contains('show')) {
                navbarCollapse.classList.remove('show'); // Close menu
            }
        });
    });
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

function redirectToLogin() {
    window.location.href = "login.html"; // Redirects to login page
}
