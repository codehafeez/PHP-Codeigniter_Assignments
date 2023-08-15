composer create-project codeigniter4/appstarter codeigniter-pagination
cd codeigniter-pagination


php spark make:controller UserController
php spark make:model UserModel


php spark migrate:create create_users_table
php spark migrate


php spark serve
