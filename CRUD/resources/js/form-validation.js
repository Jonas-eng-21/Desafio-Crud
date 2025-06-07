document.addEventListener('DOMContentLoaded', () => {

    const form = document.querySelector('#createUserForm');

    if (!form) {
        return;
    }

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        clearAllErrors();

        let isValid = true;

        const name = document.querySelector('#name');
        const email = document.querySelector('#email');
        const password = document.querySelector('#password');
        const passwordConfirmation = document.querySelector('#password_confirmation');

        if (name.value.trim() === '') {
            showError(name, 'O campo nome é obrigatório.');
            isValid = false;
        }

        if (email.value.trim() === '') {
            showError(email, 'O campo e-mail é obrigatório.');
            isValid = false;
        } else if (!isValidEmail(email.value)) {
            showError(email, 'Por favor, insira um e-mail válido.');
            isValid = false;
        }

        if (password.value.trim() === '') {
            showError(password, 'O campo senha é obrigatório.');
            isValid = false;
        } else if (password.value.length < 8) {
            showError(password, 'A senha deve ter no mínimo 8 caracteres.');
            isValid = false;
        }

        if (passwordConfirmation.value.trim() === '') {
            showError(passwordConfirmation, 'A confirmação de senha é obrigatória.');
            isValid = false;
        } else if (password.value !== passwordConfirmation.value) {
            showError(passwordConfirmation, 'As senhas não coincidem.');
            isValid = false;
        }


        if (isValid) {
            form.submit();
        }
    });

    function showError(field, message) {
        const errorElement = field.nextElementSibling;
        if (errorElement && errorElement.classList.contains('js-error-message')) {
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }
    }

    function clearAllErrors() {
        const errorMessages = document.querySelectorAll('.js-error-message');
        errorMessages.forEach(error => {
            error.textContent = '';
            error.style.display = 'none';
        });
    }

    function isValidEmail(email) {
        const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return regex.test(String(email).toLowerCase());
    }
});
