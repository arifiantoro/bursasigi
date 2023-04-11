<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLowonganTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'posisi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal_dibuka' => [
                'type' => 'DATE',
            ],
            'tanggal_ditutup' => [
                'type' => 'DATE',
            ],
            'kota_domisili' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_lowongan' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('lowongan');
    }

    public function down()
    {
        $this->forge->dropTable('lowongan');
    }
}
