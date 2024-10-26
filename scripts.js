document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");

    if (loginForm) {
        loginForm.addEventListener("submit", function(e) {
            e.preventDefault();
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            console.log("Кіру әрекеті:", { email, password });
            alert("Кіру сәтті аяқталды!");
        });
    }

    if (registerForm) {
        registerForm.addEventListener("submit", function(e) {
            e.preventDefault();
            const username = document.getElementById("username").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            console.log("Тіркелу әрекеті:", { username, email, password });
            alert("Тіркелу сәтті аяқталды!");
        });
    }
});

