<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use App\Models\Users;
class UserSeeder extends Seeder
{
    public function run()
    {
         // Helper to generate random values
         helper('text');

         // Insert Record with Fix values
         $user = new Users();

         $insertdata['name'] = 'Yogesh';
         $insertdata['username'] = 'yssyogesh';
         $insertdata['email'] = 'yogesh@makitweb.com';
         $insertdata['age'] = 29;
         $insertdata['status'] = 1;

         $user->insert($insertdata);

         // Insert 5 Records with Dynamic values 
         for($num=0;$num<5;$num++){
              $user = new Users();

              $insertdata['name'] = random_string('alpha');
              $insertdata['username'] = random_string('alpha');
              $insertdata['email'] = random_string('alpha').'@makitweb.com';
              $insertdata['age'] = rand(25,40);
              $insertdata['status'] = alternator(0,1);

              $user->insert($insertdata);
         }
    }
}