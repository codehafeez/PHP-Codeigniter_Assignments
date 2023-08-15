# CodeIgniter 4 

composer create-project codeigniter4/appstarter ci4-stripe
cd ci4-stripe

composer require stripe/stripe-php



# .env (add)
stripe.key = '*********************************'
stripe.secret = '******************************'



php spark make:controller StripeController


php spark serve


http://localhost:8080/index.php/stripe


