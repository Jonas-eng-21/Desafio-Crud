document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#createFuncionarioForm');
    if (!form) return;

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        clearAllErrors();
        let isValid = true;

        const nome = document.querySelector('#nome');
        const cpf = document.querySelector('#cpf');
        const dataNascimento = document.querySelector('#data_nascimento');
        const telefone = document.querySelector('#telefone');
        const genero = document.querySelector('#genero');
        const numbersOnlyRegex = /^\d+$/;

        if (nome.value.trim() === '') {
            showError(nome, 'O campo nome é obrigatório.');
            isValid = false;
        }

        if (cpf.value.trim() === '') {
            showError(cpf, 'O campo CPF é obrigatório.');
            isValid = false;
        } else if (!numbersOnlyRegex.test(cpf.value) || cpf.value.length !== 11) {
            showError(cpf, 'O CPF deve conter exatamente 11 números.');
            isValid = false;
        }

        if (dataNascimento.value === '') {
            showError(dataNascimento, 'A data de nascimento é obrigatória.');
            isValid = false;
        }

        if (telefone.value.trim() === '') {
            showError(telefone, 'O campo telefone é obrigatório.');
            isValid = false;
        } else if (!numbersOnlyRegex.test(telefone.value) || (telefone.value.length < 10 || telefone.value.length > 11)) {
            showError(telefone, 'O telefone deve conter 10 ou 11 números.');
            isValid = false;
        }

        if (genero.value === '') {
            showError(genero, 'Por favor, selecione um gênero.');
            isValid = false;
        }

        if (isValid) {
            form.submit();
        }
    });

    function showError(field, message) {
        let errorElement = field.parentElement.querySelector('.js-error-message');
        if (errorElement) {
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
});
