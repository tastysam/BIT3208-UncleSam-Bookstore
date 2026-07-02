// ===== LOGIN VALIDATION =====
function validateLogin() {
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    if (username === "" || password === "") {
        showAlert("Please fill in all fields before logging in.");
        return false;
    }

    if (password.length < 4) {
        showAlert("Password must be at least 4 characters.");
        return false;
    }

    return true;
}

// ===== REGISTER VALIDATION =====
function validateRegister() {
    const fullname = document.getElementById("fullname")?.value.trim();
    const email = document.getElementById("email")?.value.trim();
    const username = document.getElementById("username")?.value.trim();
    const password = document.getElementById("password")?.value.trim();
    const confirm = document.getElementById("confirm_password")?.value.trim();

    if (!fullname || !email || !username || !password || !confirm) {
        showAlert("All fields are required. Please fill in everything.");
        return false;
    }

    if (!email.includes("@") || !email.includes(".")) {
        showAlert("Please enter a valid email address.");
        return false;
    }

    if (password.length < 6) {
        showAlert("Password must be at least 6 characters.");
        return false;
    }

    if (password !== confirm) {
        showAlert("Passwords do not match. Please try again.");
        return false;
    }

    return true;
}

// ===== PASSWORD STRENGTH CHECKER =====
function checkPasswordStrength() {
    const password = document.getElementById("password")?.value;
    const bar = document.getElementById("strength-bar");
    const text = document.getElementById("strength-text");

    if (!bar || !text) return;

    bar.className = "strength-bar";
    text.className = "strength-text";

    if (password.length === 0) {
        bar.style.width = "0";
        text.textContent = "";
        return;
    }

    if (password.length < 5) {
        bar.classList.add("weak");
        text.textContent = "Weak password";
        text.style.color = "#e94560";
    } else if (password.length < 8) {
        bar.classList.add("medium");
        text.textContent = "Medium password";
        text.style.color = "#f6ad55";
    } else {
        bar.classList.add("strong");
        text.textContent = "Strong password ✓";
        text.style.color = "#4ecca3";
    }
}

// ===== CUSTOM ALERT =====
function showAlert(message) {
    const existing = document.querySelector(".js-alert");
    if (existing) existing.remove();

    const alert = document.createElement("div");
    alert.className = "alert alert-error js-alert";
    alert.textContent = "⚠️ " + message;

    const card = document.querySelector(".card");
    const form = document.querySelector("form");
    card.insertBefore(alert, form);

    setTimeout(() => alert.remove(), 4000);
}