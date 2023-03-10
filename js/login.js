window.addEventListener("load", (e) => {
    const loginForm = document.getElementById('loginForm');
    const emailElement = document.getElementById('email');
    const loginFormError = document.getElementById('login-error');

    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();
        let formData = new FormData(this);
        let emailValue = formData.get('email');

        validateEmailAddress(emailValue);

        loginFormError.innerHTML = "theres been a problem loggin in";
    });

    emailElement.addEventListener('keyup', function (event) {
        let value = event.target.value;

        loginFormError.innerHTML = "theres been a problem loggin in";
    });


    function validateEmailAddress(email, listener) {
        listener();
        if (email.includes('.ie')) {
            this.submit();
        }

        return email;
    }

    let formData = {
        password: 'none',
        email: validateEmailAddress(emailValue),
        passwordValue: this.password
    }

    formData.email();
});





