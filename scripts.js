// Simple script to show a message on form submission
document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", function(event) {
        alert("Form submitted!");
    });
});
