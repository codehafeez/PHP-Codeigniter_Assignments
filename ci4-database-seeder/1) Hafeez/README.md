# CodeIgniter 4 


composer create-project codeigniter4/appstarter ci4-seeder
cd ci4-seeder


php spark migrate:create create_users_table
php spark migrate:create create_products_table
php spark migrate


php spark make:model Users
php spark make:model Products


php spark make:seeder user --suffix
php spark make:seeder product --suffix
php spark make:seeder manage --suffix


php spark db:seed UserSeeder
php spark db:seed ProductSeeder
php spark db:seed ManageSeeder

