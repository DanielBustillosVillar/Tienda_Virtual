/* =========== VARIABLES Y CONSTANTES ============*/
const menu__movil = document.querySelector('#menu__movil')
const navegacion = document.querySelector('#navegacion')

const slider = document.querySelector('#banner_contenido')
let sliderImg = document.querySelectorAll('#banner_contenido img')
let sliderImgLast = sliderImg[sliderImg.length - 1]


/* =================== EVENTOS ============================= */

menu__movil.addEventListener('click', salirMenu)


slider.insertAdjacentElement('afterbegin', sliderImgLast)
/* =================== SLIDER =================== */
window.addEventListener('load', mover)



/* ================= FUNCTIONES ====================== */

function mover(){
    setInterval(moverDerecha, 3000)
}
function salirMenu(){
    if(navegacion.classList.contains('left')){
        navegacion.classList.remove('left')
    }else{
        navegacion.classList.add('left')
    }
}

function moverDerecha(){
    let sliderImgFirst = document.querySelectorAll('#banner_contenido img')[0]
    slider.style.marginLeft = "-200%"
    slider.style.transition = "all 0.5s"
    setTimeout(function(){
        slider.style.transition = "none"
        slider.insertAdjacentElement('beforeend', sliderImgFirst)
        slider.style.marginLeft = "-100%"
    }, 500)
}