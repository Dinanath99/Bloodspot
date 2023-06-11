const passwordInput = document.getElementById('password');
const oldPasswordInput = document.getElementById('old_password');
const form = document.querySelector('form');

form.addEventListener('submit', function(event) {
    event.preventDefault();
    if (validateForm()) {
        form.submit();
    }
});

function validateForm() {
    return validatePassword() && validateOldPassword();
}

function validatePassword() {
    const passValue = passwordInput.value.trim();
    const passRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_])/;
    if (passValue === '') {
        setError(passwordInput, "Password is required", 'password-error');
        return false;
    } else if (passValue.length < 8) {
        setError(passwordInput, "Password must be at least 8 characters", 'password-error');
        return false;
    } else if (!passRegex.test(passValue)) {
        setError(passwordInput, "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.", 'password-error');
        return false;
    } else {
        removeError(passwordInput, 'password-error');
        return true;
    }
}


function validateOldPassword() {
    const oldPassValue = oldPasswordInput.value.trim();
    if (oldPassValue === '') {
        setError(oldPasswordInput, "Old Password is required", 'old-password-error');
        return false;
    } else {
        removeError(oldPasswordInput, 'old-password-error');
        return true;
    }
}

// Set error message
function setError(inputElement, message, errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.textContent = message;
    inputElement.classList.add('error-message');
}

// Remove error message
function removeError(inputElement, errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.textContent = '';
    inputElement.classList.remove('error-message');
}

passwordInput.addEventListener('blur', validatePassword);
oldPasswordInput.addEventListener('blur', validateOldPassword);

function togglePassword() {
    const x = document.getElementById('old_password');
    const show = document.getElementById('hideopen');
    const hide = document.getElementById('hideclose');
    if (x.type === "password") {
        x.type = "text";
        show.style.display = "none";
        hide.style.display = "block";
    } else {
        x.type = "password";
        show.style.display = "block";
        hide.style.display = "none";
    }
}

function toggleCPassword() {
    const y = document.getElementById('password');
    const show = document.getElementById('Chideopen');
    const hide = document.getElementById('Chideclose');
    if (y.type === "password") {
        y.type = "text";
        show.style.display = "none";
        hide.style.display = "block";
    } else {
        y.type = "password";
        show.style.display = "block";
        hide.style.display = "none";
    }
}
