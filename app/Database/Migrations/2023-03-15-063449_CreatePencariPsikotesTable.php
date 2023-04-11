<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePencariPsikotesTable extends Migration
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
            'kognitif' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'emotional' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'bukti_report' => [
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
        $this->forge->createTable('pencari_psikotes');
    }


    public function down()
    {
        $this->forge->dropTable('pencari_psikotes');
    }
}
