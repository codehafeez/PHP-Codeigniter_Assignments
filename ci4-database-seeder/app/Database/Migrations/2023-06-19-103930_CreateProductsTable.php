<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateProductsTable extends Migration {

     public function up() {
         $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => '2',
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => '2',
            ],
         ]);
         $this->forge->addKey('id', true);
         $this->forge->createTable('products');
     }

     public function down() {
         $this->forge->dropTable('products');
     }
}