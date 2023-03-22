const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#pwd');

// funzione per rendere visibile la password

  togglePassword.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye');
});