//aca vamos obtener los elementos y mostrar y quitar formularios del perfil
//ya estoy cansado :& 

let Showform = document.querySelector(".popup");
let ShofPublicationfrm = document.querySelector(".showCreate_publication");
let cerrarbtn = document.querySelector(".btncls")
let cerrarpost = document.querySelector(".clpost")
let BeginBoton = document.querySelector(".btn_editar_user");
let CreastepostBtn = document.querySelector(".btn_createpublication");

//obteniendo inputs con las fotos
let fotoinput1 = document.querySelector('#perfil-picture-upload');
let fotoinput2 = document.querySelector("#cover-photo-upload");
let fotoinput3 = document.querySelector("#photo_publication");

let perfilpreview = document.querySelector("#perfilPreview");
let coverpreview = document.querySelector("#coverPreview");
let postpreview = document.querySelector("#publicationPreview");

//capturando entradas de errores
let error_frm_foto = document.querySelector(".error_1");
let error_frm_publication = document.querySelector(".error_2");

//obetner forms
let form_post = document.querySelector(".create_publication");
let form_editphotos = document.querySelector("#formularioEditar")

BeginBoton.addEventListener('click', function(){
    Showform.style.display = "block"
})

cerrarbtn.addEventListener('click', ()=>{
    Showform.style.display = "none";
})

CreastepostBtn.addEventListener('click', function(){
    ShofPublicationfrm.style.display = 'block';
})

cerrarpost.addEventListener('click', function(){
    ShofPublicationfrm.style.display = 'none';
})

// Función para mostrar la vista previa de la imagen
function showPreview(input, previewElement) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            previewElement.src = e.target.result;
            previewElement.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        previewElement.style.display = 'none';
    }
}

// Mostrar la vista previa cuando se selecciona una imagen
fotoinput1.onchange = function() {
    showPreview(fotoinput1, perfilpreview);
};

fotoinput2.onchange = function() {
    showPreview(fotoinput2, coverpreview);
};

fotoinput3.onchange = function() {
    showPreview(fotoinput3, postpreview);
};

//funcion para validar datos
let ArrayInputs = [];
 
function RecuperarDatos(form, errores){
    form.addEventListener('submit', (e)=>{
        e.preventDefault();
        
        let idForm = form.id;

        let Datos = new FormData(form);
        for (let [key, value] of Datos.entries()) {
            let Element =(key, value);
            ArrayInputs.push(Element)
        }
        //validacion
        switch (idForm) {
            case'formularioEditar':
                  //este es para el de editar foto
                if(ArrayInputs[0].size === 0 || ArrayInputs[1].size === 0 || ArrayInputs[2] === ''){
                    errores.textContent = 'Todos los campos deben estar llenos';
                    errores.style.color = 'red';
                }else{
                    errores.textContent='';
                }
                // hacer envio
                if (!errores.textContent) {
                    console.log(ArrayInputs)
                    //enviamos a los ajax para que los datos sean procesados
                    fetch('/Walweb/ajax/EditarFotosAjax.php',{
                        method : 'POST',
                        body : Datos
                    })
                    .then(response=> response.json())
                    .then(data => {
                        return Swal.fire({
                            title: 'Todo correcto',
                            text: data.mensaje,
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'http://localhost/Walweb/profile/';
                            form.reset(); 
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
                break;

            case 'create_publication':
                
                if(ArrayInputs[0]=== '' || ArrayInputs[1].size === 0 ){
                    errores.textContent = 'Todos los campos deben estar llenos';
                    errores.style.color = 'red';
                }else{
                    errores.textContent='';
                }
                // hacer envio
                if (!errores.textContent) {
                    fetch('/Walweb/ajax/PublicacionesAjax.php', {
                        method: 'POST',
                        body: Datos
                    })
                    .then(response => response.json())
                    .then(data => {
                        return Swal.fire({
                            title: 'Todo correcto',
                            text: data.mensaje,
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'http://localhost/Walweb/profile/';
                            form.reset(); 
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }   
                break;
            default:
                
                break;
        }
        ArrayInputs = [];
    })
}

RecuperarDatos(form_post,error_frm_publication);

RecuperarDatos(form_editphotos,error_frm_foto);

// craremos funciones para recuperar los datos y enviarlos a los ajax
function RecuperarDatos1() {
    
}

//validacion
