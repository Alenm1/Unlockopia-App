<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div class="paquetes__grid">
        <div class="paquete">
            <h3 class="paquete__nombre">Plan Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso limitado</li>
                <li class="paquete__elemento">Soporte básico por correo electrónico</li>
            </ul>

            <p class="paquete__precio">S/.0</p>

            <form method="POST" action="/finalizar-registro/gratis">
                <input class="paquetes__submit" type="submit" value="Inscripción Gratis">
            </form>
        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Plan Premium</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Plan Familiar STEAM</li>
                <li class="paquete__elemento">Descuentos y ofertas anticipadas en juegos recien añadidos</li>
                <li class="paquete__elemento">Soporte premium 24/7 por chat y correo electrónico</li>
                <li class="paquete__elemento">Participación en sorteos mensuales de juegos y contenido adicional</li>
            </ul>

            <p class="paquete__precio">S/.15</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>


        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Plan Platino</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Descuentos exclusivos en juegos seleccionados</li>
                <li class="paquete__elemento">Soporte prioritario por correo electrónico</li>
                <li class="paquete__elemento">Acceso a ofertas y promociones especiales</li>
            </ul>

            <p class="paquete__precio">S/.10</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container-virtual"></div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="https://www.paypal.com/sdk/js?client-id=Adc6YGqAvfmtD_7WCDB9mf3AidMfM18ZQr49mGkIHEOF8XuFTW7aAMFuB09wVfMsKy54lOoFfpWqL3HS&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>

<script>
    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',
            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "description": "1",
                        "amount": {
                            "currency_code": "USD",
                            "value": 199
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    const datos = new FormData();
                    datos.append('paquete_id', orderData.purchase_units[0].description);
                    datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                    fetch('/finalizar-registro/pagar', {
                            method: 'POST',
                            body: datos
                        })
                        .then(respuesta => respuesta.json())
                        .then(resultado => {
                            if (resultado.resultado) {
                                actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                            }
                        })

                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');


        // Pase virtual
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',
            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "description": "2",
                        "amount": {
                            "currency_code": "USD",
                            "value": 49
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    const datos = new FormData();
                    datos.append('paquete_id', orderData.purchase_units[0].description);
                    datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                    fetch('/finalizar-registro/pagar', {
                            method: 'POST',
                            body: datos
                        })
                        .then(respuesta => respuesta.json())
                        .then(resultado => {
                            if (resultado.resultado) {
                                actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                            }
                        })

                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container-virtual');

    }
    initPayPalButton();
</script>