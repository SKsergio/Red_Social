const list = document.querySelectorAll('.nav_item');//lista de nodos
let clase_menu = [];

const listaArray = Array.from(list); //array

function ativelist(){
    list.forEach((item)=> 
        // Para cada elemento en la lista, remueve la clase 'active'
        item.classList.remove('active'));
    // Agrega la clase 'active' al elemento que desencadenó el evento click (this)    
    this.classList.add('active');
}

list.forEach((item => 
    item.addEventListener('click',ativelist)//agrega un evento click para cada elemento de la lista
))


//cada vez que le demos clic al menu y accedamos a una nueva pagina esto se ejecutara
document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('a');
    const currentUrl = window.location.href;//con esta linea extraemos la url de la pagina

    menuItems.forEach(function(item) {
        // Compara la URL actual con el href de cada enlace del menú
        if (currentUrl === item.getAttribute('href')) {
            // Si la URL coincide, agrega la clase 'active' al elemento del menú
            item.closest('li').classList.add('active');
            // item.classList.add('hov_del');
        }
    });

    const arraylist = Array.from(menuItems);//convertimos la nodelist en un array papaaaa


    arraylist.forEach((item => {
        item.addEventListener('click',function(e){//agregamos un evento click a todos los items
            e.preventDefault();
            arraylist.forEach((elemnto) => elemnto.classList.add('hov_del'));
            this.classList.remove('hov_del');


            const urlDestino = this.getAttribute('href'); //descomentar esto para activar el funcionamiento del menu

            //  Redirigimos a la nueva página
            window.location.href = urlDestino;
        })
    }));
    
});

//ya funcionaa, perooooo hay que arregelar algunas cosas sobre el hover, ya que se distorsiona un poco al ir a otras paginas.....