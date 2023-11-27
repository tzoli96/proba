<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hotels extends Migration
{
    public function up()
    {
        /**
         * Hotel
         */
        $this->forge->addField(
            [
                'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'hotel_id'              => ['type' => 'int', 'constraint' => 11, 'null' => false, 'default' => null],
                'hotel_name'            => ['type' => 'varchar', 'constraint' => 25, 'null' => false],
                'country'               => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
                'city'                  => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
                'star'                  => ['type' => 'int', 'constraint' => 11,'null' => true, 'default' => 0],
                'price'                 => ['type' => 'DECIMAL', 'constraint' => '10,2','null' => false, 'default' => 0],
                'image'                 => ['type' => 'varchar', 'constraint' => 255,'null' => true, 'default' => 0]
            ]
        );

        $this->forge->addKey('id','primary');
        $this->forge->addKey('country');
        $this->forge->addKey('city');
        $this->forge->addKey('star');
        $this->forge->addKey('price');

        $this->forge->createTable('hotel', true);
    }

    public function down()
    {
        $this->forge->dropTable('hotel', true);
    }
}
