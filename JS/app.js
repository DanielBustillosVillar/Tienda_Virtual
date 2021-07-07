/* =========== VARIABLES Y CONSTANTES ============*/

const slider = document.querySelector('#banner_contenido')
let sliderImg = document.querySelectorAll('#banner_contenido img')
let sliderImgLast = sliderImg[sliderImg.length - 1]


/* =================== EVENTOS ============================= */


if(slider != null){
    slider.insertAdjacentElement('afterbegin', sliderImgLast)
}
/* =================== SLIDER =================== */
window.addEventListener('load', mover)



/* ================= FUNCTIONES ====================== */

function mover(){
    setInterval(moverDerecha, 3000)
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