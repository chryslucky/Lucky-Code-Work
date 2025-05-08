const loginForm = document.getElementById('loginform');
const signupForm = document.getElementById('signupform');
const showSignup = document.getElementById('showSignup');
const showLogin = document.getElementById('showLogin');

function switchForm(hideform,showform){
    hideform.classList.add("hidden");
    setTimeout(() => {
        hideform.style.display = "none";
        showform.style.display = "block";
        setTimeout(() => {
            showform.classList.remove("hidden");
        }, 50);
    }, 500);

}

    showSignup.addEventListener('click', function(event){
        event.preventDefault();
        switchForm(loginForm, signupForm); // ✅ Switch from login to sign-up
    });

showLogin.addEventListener('click', function(event){
    event.preventDefault();
    switchForm(signupForm, loginForm); // ✅ Switch from sign-up back to login
});

