//seleccionamos todos los formularios que tengamos en una misma vista
const formularios_ajax = document.querySelectorAll(".FormularioAjax");
const FormularioFecth = document.querySelectorAll(".FormularioFetch");

//funciones para enviar por ajax
function enviar_form_Ajax(e){
    e.preventDefault();
}

//ahora vamos a detectar cada vez que enviemos un formulario
formularios_ajax.forEach(formularios =>{
    formularios.addEventListener('submit',enviar_form_Ajax)
});

//tipos de alertas ajax
function alertas_Ajax(alerta){
    if (alerta.Alerta === 'simple') {
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Contenido,
            icon: alerta.Icon,
            confirmButtomText: 'Aceptar' 
          });
    }else if(alerta.Alerta === 'recargar'){
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Contenido,
            icon: alerta.Icon,
            confirmButtomText: 'Aceptar' 
          }).then((result) => {
            if (result.isConfirmed) {
              location.reload();
            }
          });
    }else if(alerta.Alerta === 'Limpiar'){
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Contenido,
            icon: alerta.Icon,
            confirmButtomText: 'Aceptar' 
          }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector(".FormularioAjax").reset();
            }
          });
    }else if(alerta.Alerta === 'redireccionar'){
        window.location.href = alerta.URL;
    }
}