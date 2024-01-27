// JavaScript code for your HTML pages

// Function to validate email format
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Function to validate user form
function validateUserForm() {
    const photo = document.getElementById('photo').value;
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const bio = document.getElementById('bio').value;

    // Basic validation, you can add more as needed
    if (photo.trim() === '' || firstName.trim() === '' || lastName.trim() === '' || email.trim() === '') {
        alert('All fields are required.');
        return false;
    }

    if (!validateEmail(email)) {
        alert('Invalid email format.');
        return false;
    }

    // Additional validation logic goes here

    return true;
}

// Function to handle user deletion confirmation
function confirmUserDeletion() {
    return confirm('Are you sure you want to delete this user?');
}

// Add more functions as needed for your project
