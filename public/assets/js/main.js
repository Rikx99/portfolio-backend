//Switch Login / Register
document.getElementById("showRegister").addEventListener("click", function(e){
    e.preventDefault();
    document.getElementById("loginForm").style.display = "none";
    document.getElementById("registerForm").style.display = "block";
});

document.getElementById("showLogin").addEventListener("click", function(e){
    e.preventDefault();
    document.getElementById("registerForm").style.display = "none";
    document.getElementById("loginForm").style.display = "block";
});

//Funzione validazione generica

function showError(message){
    let box = document.getElementById("jserror");
    if (!box) {
        box = document.createElement("div");
        box.id = "jserror";
        box.className = "alert alert-danger mt-2";
        document.querySelector(".card").prepend(box);
    }
    box.textContent = message;
}

//Funzione per ripulire Errori e Bordi

function clearValidation(input) {
    input.classList.remove("is-invalid");
    input-classList.remove("is-valid");

    const box = document.getElementById("jserror");
    if (box) box.remove();
}

//Validazione Login

document.getElementById("loginForm").addEventListener("submit", function(e){
    const email = document.getElementById("loginEmail");
    const password = document.getElementById("loginPassword");

    let valid = true;

    if(!email.value.includes("@")) {
        email.classList.add("is-invalid");
        showError("Please enter a valid email.");
        valid = false;
    } else {
        email.classList.add("is-valid");
    }

    if(password.length < 6) {
        password.classList.add("is-invalid");
        showError("Password must be at least 6 characters.");
        valid = false;
    } else {
        password.classList.add("is-valid");
    }

    if (!valid) e.preventDefault();
});

//Validazione Register

document.getElementById("registerForm").addEventListener("submit", function(e){
    const name = document.getElementById("regName");
    const email = document.getElementById("regEmail");
    const password = document.getElementById("regPassword");

    let valid = true;

    if(name.value.trim().length < 3) {
        name.classList.add("is-invalid");
        showError("Name must be at least 3 characters.");
        valid = false;
    } else {
        name.classList.add("is-valid");
    }

    if(!email.value.includes("@")) {
        email.classList.add("is-invalid");
        showError("Please enter a valid email.");
        valid = false;
    } else {
        name.classList.add("is-valid");
    }

    if(password.value.trim().length < 6) {
        password.classList.add("is-invalid");
        showError("Password must be at least 6 characters.");
        valid = false;
    } else {
        name.classList.add("is-valid")
    }
    if (!valid) e.preventDefault();
});

//Rimozione Errori live mentre l'utente scrive

document.querySelectorAll("input").forEach(input => {
    input.addEventListener("input", () => {
        clearValidation(input);
    });
});
