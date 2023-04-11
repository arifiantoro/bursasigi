<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePencariTable extends Migration
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
            'NIK' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM("Laki-laki", "Perempuan")',
                'default' => 'Laki-laki',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'kota_tinggal' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_member' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi_member' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'keahlian_member' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'pendidikan_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ],
            'pasfoto' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'pekerjaan_dicari' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('pencari');
    }


    public function down()
    {
        $this->forge->dropTable('pencari');
    }
}
