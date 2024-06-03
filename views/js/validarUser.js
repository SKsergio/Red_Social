//elemtos
const Cuerpo = document.querySelector('.conat');
console.log(Cuerpo)





document.getElementById('paso').addEventListener('submit', function(event) {
    var valid = true;

    var fields = ['nombre', 'apellido', 'fecha'];
    fields.forEach(function(field) {
        var input = document.getElementById(field);
        var error = document.getElementById('error-' + field);

        if (!input.value) {
            error.style.display = 'block';
            valid = false;
        } else {
            error.style.display = 'none';
        }
    });

    if (!valid) {
        event.preventDefault();
    }
});

function calculateedad() {
    const fecha = document.getElementById('fecha').value;
    const edadSpan = document.getElementById('edad');
    if (fecha) {
        const fechaD = new Date(fecha);
        const today = new Date();
        let edad = today.getFullYear() - fechaD.getFullYear();
        const monthDifference = today.getMonth() - fechaD.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < fechaD.getDate())) {
            edad--;
        }
        edadSpan.textContent = `(${edad} años)`;
    } else {
        edadSpan.textContent = '';
    }
}

//vamos a validar todos los formulario  luego almacenar todos los elementos en un array.
function togglePassword(id) {
    const input = document.getElementById(id);
    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}

document.getElementById('datosForm').addEventListener('submit', function(event) {
    let valid = true;

    let fields = ['usuario', 'correo', 'password', 'confirm-password'];
    fields.forEach(function(field) {
        let input = document.getElementById(field);
        let error = document.getElementById('error-' + field);

        if (!input.value) {
            error.style.display = 'block';
            valid = false;
        } else {
            error.style.display = 'none';
        }
    });

    // Validar si la contraseña y la confirmación son iguales y tienen al menos 8 caracteres
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm-password').value;
    let errorPassword = document.getElementById('error-password');
    let errorConfirmPassword = document.getElementById('error-confirm-password');

    if (password.length < 8) {
        errorPassword.style.display = 'block';
        errorPassword.textContent = 'La contraseña debe tener al menos 8 caracteres';
        valid = false;
    } else {
        errorPassword.style.display = 'none';
    }

    if (password !== confirmPassword) {
        errorConfirmPassword.style.display = 'block';
        errorConfirmPassword.textContent = 'Las contraseñas no coinciden';
        valid = false;
    } else {
        errorConfirmPassword.style.display = 'none';
    }

    if (!valid) {
        event.preventDefault();
    }
});