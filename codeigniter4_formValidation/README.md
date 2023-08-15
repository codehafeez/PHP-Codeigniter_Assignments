composer create-project codeigniter4/appstarter formValidation
cd formValidation


app\Config\Database.php (update file => db)


php spark migrate:create create_users_table
php spark migrate


php spark make:model FormModel
php spark make:controller FormController


// app/Config/Routes.php
$routes->get('/', 'FormController::index');
$routes->match(['get', 'post'], 'FormController/store', 'FormController::store');



php spark serve
http://localhost:8080/index.php/contact-form


