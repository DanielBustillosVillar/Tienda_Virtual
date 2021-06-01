
const input = document.querySelector('#nombreProducto')
const alerta = document.querySelector("#alerta")
const boton = document.querySelector('#busqueda')

boton.addEventListener('click', validarFormulario)

function validarFormulario(){

    if(input.value === ''){
        mostrarAlerta('Ingrese el nombre del producto', 0)
        return 
    }else{
        formulario.reset()
    }
    
}

function mostrarAlerta(mensaje, tipo){
        if(alerta.classList.contains('alerta')){

        }else{
            alerta.classList.add('alerta')
            const mensajeAlerta = document.createElement('p')
            mensajeAlerta.textContent = mensaje
            if(tipo == 0){
                alerta.style.background = '#d82323'
            }else{
                alerta.style.background = '#23d83b'
            }

            alerta.appendChild(mensajeAlerta)
            
            setTimeout(() => {
                mensajeAlerta.remove()
                alerta.classList.remove('alerta')
            },3000)
        }
}
