<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://www.paypal.com/sdk/js?client-id=AROmjhbl9vKVBkKVf5ZBWARe6Q20fkzj0TzpLigWhKIdJbXcSIdyV6PVf5Dvu6km5JlXTT69yfsaSGUn&currency=USD"></script>
    <script src="app.js"></script>
    
</head>
<body>
    <div id="paypal-button-container"></div>

    <script>
        paypal.Buttons({
            style:{
                color:"blue",
                shape: "pill",
                label: "pay"
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 100
                        }
                    }]

                });
            },
            onApprove: function(data, action){
                action.order.capture().then(function(detalles){
                    window.location.href="./index.html"

                });
            },
            onCancel: function(data){
                alert("Pago Cancelado");
                console.log(data);
            }
        }).render("#paypal-button-container");
    </script>
</body>
</html>