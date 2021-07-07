/* =========== VARIABLES Y CONSTANTES ============*/
const menu__movil = document.querySelector('#menu__movil')
const navegacion = document.querySelector('#navegacion')


/* =================== EVENTOS ============================= */

menu__movil.addEventListener('click', salirMenu)


function salirMenu(){
    if(navegacion.classList.contains('left')){
        navegacion.classList.remove('left')
    }else{
        navegacion.classList.add('left')
    }
}