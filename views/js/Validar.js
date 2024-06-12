//elemtos
const Cuerpo = document.querySelector('.conat');
// recuperamos todos los formularios
let Form_Edad = Cuerpo.querySelector('#FormEdad');
let Form_Sex = Cuerpo.querySelector('#Form_Sex');
let Form_User = Cuerpo.querySelector('#Form_Password');
let Form_Photo = Cuerpo.querySelector('#Form_photo');

// capturar errores
let error_name = Cuerpo.querySelector('#error-nombre');
let error_apellido = Cuerpo.querySelector('#error-apellido');
let error_fecha = Cuerpo.querySelector('#error-fecha');
let error_genero = Cuerpo.querySelector('#error-genero');
let error_telefono = Cuerpo.querySelector('#error-telefono');
let error_usuario = Cuerpo.querySelector('#error-usuario');
let error_correo = Cuerpo.querySelector('#error-correo');
let error_password = Cuerpo.querySelector('#error-password');
let error_password_Confirm = Cuerpo.querySelector('#error-confirm-password');
let error_foto1 = Cuerpo.querySelector('#error-foto_perfil');
let error_Foto2 = Cuerpo.querySelector('#error-foto_portada');

//ruta actual
//ruta de la pagina actual
let PageCurrent = window.location.pathname;
//nextPage
let newPage;
//aca almacenamos datos
let ArrayData = [];
let edad
//validar edad
function calculateedad() {
    let fecha = document.getElementById('fecha').value;
    const edadSpan = document.getElementById('edad');
    if (fecha) {
        const fechaD = new Date(fecha);
        const today = new Date();
        edad = today.getFullYear() - fechaD.getFullYear();
        const monthDifference = today.getMonth() - fechaD.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < fechaD.getDate())) {
            edad--;
        }
        edadSpan.textContent = `(${edad} años)`;
    } else {
        edadSpan.textContent = '';
    }
}
//shows password
function togglePassword(id) {
    const input = document.getElementById(id);
    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}

//validacion
if (PageCurrent == '/Walweb/formUser1/') {
    newPage = 'http://localhost/Walweb/formUser2/';
    Formularios(Form_Edad, newPage);
}else if(PageCurrent == '/Walweb/formUser2/'){
    newPage = 'http://localhost/Walweb/formUser3/';
    Formularios(Form_Sex, newPage);
}else if(PageCurrent == '/Walweb/formUser3/'){
    newPage = 'http://localhost/Walweb/formUser4/';
    Formularios(Form_User, newPage);
}else if(PageCurrent == '/Walweb/formUser4/'){
    newPage = 'http://localhost/Walweb/';
    Formularios(Form_Photo, newPage);
}

function Formularios(form, url) {
    form.addEventListener('submit', function(e){
        e.preventDefault();
        let datos = new FormData(form);
        let arrayElementos = [];//alamcenamos los inputs para validarlos

        for (let i = 0; i < form.elements.length; i++) {
            let elemento = form.elements[i];

            if (elemento.type !== "button" && elemento.type !== "submit") {
                arrayElementos.push(elemento);
            }
        }
        //aca ira la validacion de los datos
        Validacion(form, arrayElementos, url, datos)

        // GuardarDatos(datos, url);
    });
}
//funcion para almacenar datos(funciona jajjaja)
function GuardarDatos(datos,$NextPage) {
    // Almacenar cada campo en sessionStorage
    for (let [key, value] of datos.entries()) {
        sessionStorage.setItem(key, value);
    }
    ArrayData.push(sessionStorage)

    // Crear un nuevo objeto FormData para almacenar los datos que ya teniamos y gestionarlos de una mejor manera
    const formData = new FormData();

    // Poblar el objeto FormData con los datos del array
    ArrayData.forEach(item => {
        Object.keys(item).forEach(key => {
            if (key === 'foto_perfil' || key === 'foto_portada') {
                formData.append(key, document.querySelector(`input[name="${key}"]`).files[0]);
            } else {
                formData.append(key, item[key]);
            }
        });
    });

    //  Redirigimos a la nueva página
    if (PageCurrent == '/Walweb/formUser4/') {
        fetch('/Walweb/ajax/prub.php', {
            method: 'POST',
            body: formData  // Enviar el FormData directamente
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
        })
        .then(data => {
            if (data.message) {
                Swal.fire({
                    title: 'Listo',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Aceptar' 
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = $NextPage;
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });

        sessionStorage.clear();
        ArrayData = [];
        formData=[];
    }else{
        window.location.href = $NextPage;
    }
}

let pattern =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/
let contraseniapattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/

function Validacion(form_validar, arrayElementos, url, datos){
    switch (form_validar) {
        case Form_Edad:
            if(arrayElementos[0].value ==='') {
                error_name.textContent = 'El campo de nombre es obligatorio';
                error_name.style.color ='red';
            }else{
                error_name.textContent = '';
            }

            if(arrayElementos[1].value ==='') {
                error_apellido.textContent = 'El campo de apellido es obligatorio';
                error_apellido.style.color ='red';
            }else{
                error_apellido.textContent = '';
            }

            if(arrayElementos[2].value ==='') {
                error_fecha.textContent = 'El campo de fecha es obligatorio';
                error_fecha.style.color ='red';
            }else{
                if (edad < 18) {
                    error_fecha.textContent = 'Lo sentimos debes ser mayor de 18 años';
                    error_fecha.style.color ='red';
                }else{
                    error_fecha.textContent = '';
                } 
            }

            if (!error_name.textContent && !error_apellido.textContent && !error_fecha.textContent) {
                GuardarDatos(datos, url);
            }
            break;

        case Form_Sex:
            if (!arrayElementos[0].checked && !arrayElementos[1].checked) {
                error_genero.textContent = 'Debes seleccionar un genero'
                error_genero.style.color ='red';
            }else{
                error_genero.textContent = '';
            }

            if (arrayElementos[2].value ==='') {
                error_telefono.textContent = 'Ingresa un numero de telefono';
                error_telefono.style.color = 'red';
            }else{
                error_telefono.textContent = '';
            }

            if (!error_telefono.textContent && !error_genero.textContent) {
                GuardarDatos(datos, url);
            }

            break;
        
        case Form_User:
            
            if (arrayElementos[0].value === '') {
                error_usuario.textContent = 'El campo de Nombre de Usuario es obligatorio';
                error_usuario.style.color ='red';
            }else{
                error_usuario.textContent = '';
            }

            if (!pattern.test(arrayElementos[1].value)) {
                error_correo.textContent = 'El correo esta incorrecto';
                error_correo.style.color = 'red';
            }else{

                error_correo.textContent = '';
            }
            if (!contraseniapattern.test(arrayElementos[2].value)) {
                error_password.textContent = 'La contraseña debe incluir letras, numeros y simbolos';
                error_password.style.color = 'red';
            }else{
                error_password.textContent = '';
            }   

            //se validara que la contrase;a sean iguales
            if (arrayElementos[2].value !== arrayElementos[3].value) {
                error_password_Confirm.textContent = 'Las contraseñas deben coincidir';
                error_password_Confirm.style.color = 'red';
            }else{
                error_password_Confirm.textContent = '';
            }

            if (!error_usuario.textContent && !error_correo.textContent && !error_password_Confirm.textContent) {
                GuardarDatos(datos, url);
            }
            
            break;
        
        case Form_Photo:
            if (arrayElementos[0].files.length === 0) {
                error_foto1.textContent = 'Es obligatorio subir una foto de perfil';
                error_foto1.style.color ='red';
            }else{
                error_foto1.textContent = '';
            }

            if (arrayElementos[1].files.length === 0) {
                error_Foto2.textContent = 'Es obligacion seleccionar una foto de portada';
                error_Foto2.style.color = 'red';
            }else{
                error_Foto2.textContent = '';
            }

            if (!error_foto1.textContent && !error_Foto2.textContent) {
                GuardarDatos(datos, url);
            }

            break;
        default:
            break;
    }
}