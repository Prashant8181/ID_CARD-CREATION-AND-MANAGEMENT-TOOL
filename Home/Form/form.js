document.getElementById("idForm").addEventListener("submit", function(event) {
    let contact = document.getElementById("contact").value;
    if (contact.length < 10 || isNaN(contact)) {
        alert("Please enter a valid 10-digit contact number.");
        event.preventDefault();
    }
});
