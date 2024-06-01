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