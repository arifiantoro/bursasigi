<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendidikanTable extends Migration
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
            'nama_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenjang' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'keterangan' => [
                'type' => 'TEXT',
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
        $this->forge->createTable('pendidikan');
    }


    public function down()
    {
        $this->forge->dropTable('pendidikan');
    }
}
