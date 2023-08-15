<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use App\Models\Products;
class ProductSeeder extends Seeder
{
     public function run()
     {
          // Helper to generate random values
          helper('text');

          // Insert 5 Records with Dynamic values 
          for($num=0;$num<5;$num++){
              $product = new Products();
              $insertdata['name'] = random_string('alpha');
              $insertdata['description'] = random_string('alpha',30);
              $insertdata['quantity'] = rand(10,200);
              $insertdata['status'] = alternator(0,1);

              $product->insert($insertdata);
          }
     }
}