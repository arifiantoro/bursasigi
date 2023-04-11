<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePencariPendidikanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'pendidikan_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'instansi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tahun_lulus' => [
                'type' => 'YEAR',
            ],
            'ipk' => [
                'type' => 'FLOAT',
                'constraint' => '3,2',
                'null' => true,
            ],
            'gelar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pencari_pendidikan');
    }


    public function down()
    {
        $this->forge->dropTable('pencari_pendidikan');
    }
}
