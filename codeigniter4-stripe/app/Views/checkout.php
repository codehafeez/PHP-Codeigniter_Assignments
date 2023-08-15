<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

    <div style="margin-top:10%;" class="row justify-content-center">

        <h2 style="margin-bottom:50px; text-align:center;">Codeigniter4 Stripe Payment Gateway</h2>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div 
                            style="color: green;
                                border: 2px green solid;
                                text-align: center;
                                padding: 5px;margin-bottom: 10px;">
                            Payment Successful!
                        </div>
                    <?php endif ?>
                    <form id='checkout-form' method='post' action="<?php echo base_url('/stripe/create-charge'); ?>">             
                        <input type='hidden' name='stripeToken' id='stripe-token-id'>                              
                        <label for="card-element" class="mb-5">Checkout Forms</label>
                        <br>
                        <div id="card-element" class="form-control" ></div>
                        <button 
                            id='pay-btn'
                            class="btn btn-success mt-3"
                            type="button"
                            style="margin-top: 20px; width: 100%;padding: 7px;"
                            onclick="createToken()">PAY $5
                        </button>
                    <form>
                </div>
            </div>
        </div>
    </div>
  
<script src="https://js.stripe.com/v3/" ></script>
<script>
    var stripe = Stripe("<?php echo getenv('stripe.key') ?>");
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    function createToken() {
        document.getElementById("pay-btn").disabled = true;
        stripe.createToken(cardElement).then(function(result) {

                
            if(typeof result.error != 'undefined') {
                document.getElementById("pay-btn").disabled = false;
                alert(result.error.message);
            }

            // creating token success
            if(typeof result.token != 'undefined') {
                document.getElementById("stripe-token-id").value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    }
</script>
</body>
</html>
