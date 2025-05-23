// script.js
document.addEventListener("DOMContentLoaded", function() {
    const logoutButton = document.querySelector(".logout-button");
    
    logoutButton.addEventListener("mouseover", function() {
        this.style.backgroundColor = "#00bfff";
    });
    
    logoutButton.addEventListener("mouseout", function() {
        this.style.backgroundColor = "#0080ff";
    });
});
