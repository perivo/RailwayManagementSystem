// Main.js - Global scripts for the application

// Form validation example
document.addEventListener('DOMContentLoaded', function () {
    let forms = document.querySelectorAll('.needs-validation');

    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
});

// Function to toggle the visibility of elements
function toggleVisibility(id) {
    const element = document.getElementById(id);
    if (element.style.display === 'none') {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}

// Custom alert for booking confirmation
function confirmBooking() {
    alert('Your ticket has been booked successfully!');
}
