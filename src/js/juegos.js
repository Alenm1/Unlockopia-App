(function() {
    const juegosInput = document.querySelector('#juegos');

    if(juegosInput) {
        let juegos = [];
        let juegosFiltrados = [];

        const listadoJuegos = document.querySelector('#listado-juegos')
        const juegoHidden = document.querySelector('[name="juego_id"]') 

        obtenerJuegos();
        juegosInput.addEventListener('input', buscarJuegos)

        if(juegoHidden.value) {
           (async() => {
                const juego = await obtenerJuego(juegoHidden.value)
                const { nombre, estudio} = juego

                // Insertar en el HTML
                const juegoDOM = document.createElement('LI');
                juegoDOM.classList.add('listado-juegos__juego', 'listado-juegos__juego--seleccionado');
                juegoDOM.textContent = `${nombre} ${estudio}`

                listadoJuegos.appendChild(juegosDOM)
           })()
        }

        async function obtenerJuegos() {
            const url = `/api/juegos`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            //console.log(juegos)
            formatearJuegos(resultado)
        }

        async function obtenerJuego(id) {
            const url = `/api/juego?id=${id}`;
            const respuesta = await fetch(url)
            const resultado = await respuesta.json()
            return resultado;
        }

        function formatearJuegos(arrayJuegos = []) {
            juegos = arrayJuegos.map( juego => {
                return {
                    nombre: `${juego.nombre.trim()} ${juego.estudio.trim()}`,
                    id: juego.id
                } 
            })
            //console.log(juegos)
        }

        function buscarJuegos(e) {
            const busqueda = e.target.value;

            if(busqueda.length > 3) {
                const expresion = new RegExp(busqueda, "i");
                juegosFiltrados = juegos.filter(juego => {
                    if(juego.nombre.toLowerCase().search(expresion) != -1) {
                        return juego
                    }
                })
            } else {
                juegosFiltrados = []
            }

            mostrarJuegos();
        }

        function mostrarJuegos() {

            while(listadoJuegos.firstChild) {
                listadoJuegos.removeChild(listadoJuegos.firstChild)
            }

            if(juegosFiltrados.length > 0) {
                juegosFiltrados.forEach(juegos => {
                    const juegoHTML = document.createElement('LI');
                    juegoHTML.classList.add('listado-juegos__juego')
                    juegoHTML.textContent = juego.nombre;
                    juegoHTML.dataset.juegoId = juego.id
                    juegoHTML.onclick = seleccionarJuego

                    // Añadir al dom
                    listadoJuegos.appendChild(juegoHTML)
                })
            } else {
                const noResultados = document.createElement('P')
                noResultados.classList.add('listado-juegos__no-resultado')
                noResultados.textContent = 'No hay resultados para tu búsqueda'
                listadoJuegos.appendChild(noResultados)              
            }
        }

        function seleccionarJuegos(e) {
            const juego = e.target;

            // Remover la clase previa
            const juegoPrevio = document.querySelector('.listado-juegos__juego--seleccionado')
            if(juegoPrevio) {
                juegoPrevio.classList.remove('listado-juegos__juego--seleccionado')
            }
            juego.classList.add('listado-juegos__juego--seleccionado')

            juegoHidden.value = juego.dataset.juegoId
        }
    }
    

})();