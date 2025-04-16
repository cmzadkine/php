
document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let message = document.getElementById("message").value;
    
    if (name && email && message) {
        document.getElementById("formMessage").innerText = "Bedankt voor je bericht!";
        document.getElementById("contactForm").reset();
    } else {
        document.getElementById("formMessage").innerText = "Vul alle velden in aub.";
    }
});