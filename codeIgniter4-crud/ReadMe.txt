composer create-project codeigniter4/appstarter crud-app

cd crud-app

php spark serve

php spark make:model UserModel
php spark make:controller UserController
php spark migrate:create CreateUsersTable
php spark migrate



php spark serve
http://localhost:8080/index.php/users-list

