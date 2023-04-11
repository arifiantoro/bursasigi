<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePerusahaanTable extends Migration
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
            'nama_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'kota' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'bidang_usaha' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi_usaha' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'pasfoto' => [
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
        $this->forge->createTable('perusahaan');
    }


    public function down()
    {
        $this->forge->dropTable('perusahaan');
    }
}
