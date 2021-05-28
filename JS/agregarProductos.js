/* ================================== VARIABLES Y CONTASTANTES ===================================== */
const btn_compras = document.querySelector('#btn-compras')
const compras = document.querySelector('#compras')
const btn_vaciar_carrito = document.querySelector('#btn_vaciar_carrito')
const productos = document.querySelector('#productos')
const tbody_carrito = document.querySelector('#tbody_carrito')

let comprasCarrito = []
/* ===================================== EVENTOS ======================================================== */
cargarEventos()
function cargarEventos(){
    btn_compras.addEventListener('click', mostrarCompras)

    productos.addEventListener('click', agregar_compra)

    btn_vaciar_carrito.addEventListener('click', () => {
        comprasCarrito = []
        limpiarHTML()
    })

    compras.addEventListener('click', eliminarCompras)

    document.addEventListener('DOMContentLoaded', () => {
        comprasCarrito = JSON.parse(localStorage.getItem('compras')) || []
        generarHTML()
    })
}



/* =========================================== FUNCIONES ==================================================== */
function mostrarCompras(){
    if(compras.classList.contains('ver-compras')){
        compras.classList.remove('ver-compras')
    }else{
        compras.classList.add('ver-compras')
    }
}

function agregar_compra(e){
    e.preventDefault()
    if(e.target.classList.contains('boton')){
        const informacion = e.target.parentElement.parentElement
        guardar_datos(informacion)
    }
}

function guardar_datos(informacion){
    const datos = {
        imagen: informacion.querySelector('img').src,
        titulo: informacion.querySelector('p').textContent,
        precio: informacion.querySelector('span').textContent,
        id: informacion.querySelector('button').getAttribute('data-id'),
        cantidad: 1
    }
    const existe = comprasCarrito.some( informacion => informacion.id === datos.id)
    if(existe){
        const compra = comprasCarrito.map(informacion => {
            if(informacion.id === datos.id){
                informacion.cantidad++
                return informacion
            }else{
                return informacion
            }
        })
        comprasCarrito = [...compra]
    }else{
        comprasCarrito = [...comprasCarrito, datos]
    }
    generarHTML()
}

function generarHTML(){
    limpiarHTML()
    if(comprasCarrito.length > 0){
        comprasCarrito.forEach(informacion => {
            const {imagen, titulo, precio, cantidad, id} = informacion
            const fila = document.createElement('tr')
            fila.innerHTML = `
            <td><img src="${imagen}" alt="Producto" class="image_compras"></td>
            <td>${titulo}</td>
            <td>${precio}</td>
            <td>${cantidad}</td>
            <td><button class="quitar" data-id="${id}">X</button></td>
            `
    
            tbody_carrito.appendChild(fila)
        })
    }
    ingresarLocalstorage()
}
function eliminarCompras(e){
    if(e.target.classList.contains('quitar')){
        const productoId = e.target.getAttribute('data-id')

        if(comprasCarrito.some( informacion => informacion.cantidad == 1)){
            comprasCarrito = comprasCarrito.filter(informacion => informacion.id !== productoId)
        }else{
            // Actualizamos la cantidad
            
            const compra = comprasCarrito.map(informacion => {
            if(informacion.id === productoId){
                informacion.cantidad--
                return informacion // Retorna el objeto actualizado
            }else{
                return informacion
            }
            
        })
        comprasCarrito = [...compra]
        }

        generarHTML()

    }
}
function limpiarHTML(){
    while(tbody_carrito.firstChild){
        tbody_carrito.removeChild(tbody_carrito.firstChild)
    }
}

function ingresarLocalstorage(){
    localStorage.setItem('compras', JSON.stringify(comprasCarrito))
}