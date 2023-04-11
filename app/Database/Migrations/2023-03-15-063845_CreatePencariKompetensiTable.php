<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePencariKompetensiTable extends Migration
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
            'jenis_kompetensi' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'judul_kompetensi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'bukti_kompetensi' => [
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
        $this->forge->createTable('pencari_kompetensi');
    }


    public function down()
    {
        $this->forge->dropTable('pencari_kompetensi');
    }
}
