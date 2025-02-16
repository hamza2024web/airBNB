// const dateStarte = "{{ dateStart }}"; // نصي
// const dateFine = "{{ dateFine }}";    // نصي
// const prixTotale = {{ prixTotale }};  // رقمي
// const days = {{ days }};               // رقمي
// const prix = {{ prix }};     

// console.log("dateStarte:", dateStarte);
// console.log("dateFine:", dateFine);
// console.log("prixTotale:", prixTotale);
// console.log("days:", days);
// console.log("prix:", prix);
 var prix = document.getElementById('PrixTotal').value;
   
    paypal.Buttons({
createOrder: function(data, actions) {
    return actions.order.create({
        purchase_units: [{
            amount: {
                value: prix 
            }
        }]
    });
},




onApprove: function(data, actions) {
    return actions.order.capture().then(function(details) {
        fetch('http://localhost:82/verifyPayment', {
            
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                orderID: data.orderID,
                payerID: details.payer.payer_id,
                // dateStarte: dateStarte,  
                // dateFine: dateFine,
                // prixTotale: prixTotale,
                // days: days,
                // prix: prix
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                 window.location.href = `/validation/${data.orderID}`;
            } else {
                alert(data.message || 'Piyment is not successful');
            }
        })
        .catch(error => {
            console.error('sum erorr is hupen', error);
            alert('sum erorr is hupen ples call seporte');
        });
    });
}
}).render('#paypal-button-container');