
const inputs = document.querySelectorAll('#formulario input')
const alerta = document.querySelector("#alerta")
const boton = document.querySelector('#boton')

boton.addEventListener('click', validarFormulario)

function validarFormulario(e){
    e.preventDefault()
    let i = 0

    if(inputs[i].value === '' || inputs[i + 1].value === '' || inputs[i + 2].value === '' || inputs[i + 3].value === '' || inputs[i + 4].value === '' || inputs[i + 5].value === ''){
        mostrarAlerta('Complete todos los campos', 0)
        return 
    }else{
        let dato = new FormData(formulario)
        dato.get('idUsuario')
        dato.get('Nombres')
        dato.get('Apellidos')
        dato.get('Direccion')
        dato.get('Usuario')
        dato.get('Clave')
        fetch('registrar.php', {
            method: 'POST',
            body: dato
        })
            .then(function(respuesta){
                respuesta.json().then(function(data){
                    mostrarAlerta(data)
                })
            })
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
