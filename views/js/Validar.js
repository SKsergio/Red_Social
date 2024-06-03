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
    newPage = 'http://localhost/Walweb/profile/';
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
//intento de almacenar datos
function GuardarDatos(datos,$NextPage) {
    // Almacenar cada campo en sessionStorage
    for (let [key, value] of datos.entries()) {
        sessionStorage.setItem(key, value);
    }
    ArrayData.push(sessionStorage)

    //  Redirigimos a la nueva página
    if (PageCurrent == '/Walweb/formUser1/') {
        //window.location.href = $NextPage;
        console.log(ArrayData);
    }else{
        window.location.href = $NextPage;
    }
}
// Ya fucniona todo, solo falta validar cada formulario para finalmente mandarlo al php

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
                }else{
                    error_fecha.textContent = '';
                } 
            }

            if (!error_name.textContent) {
                console.log(edad)
                GuardarDatos(datos, url);
            }
            break;
        case Form_Sex:
        
            break;
        case Form_User:
            
            break;
        case Form_Photo:
            
            break;
        default:
            break;
    }
}