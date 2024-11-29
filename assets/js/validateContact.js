document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("contactForm");

    form.addEventListener("submit", function(event) {
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let message = document.getElementById("message").value.trim();
        
        if (name === "" || email === "" || message === "") {
            alert("Por favor, completa todos los campos.");
            event.preventDefault(); 
            return;
        }
    });
});
