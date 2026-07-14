<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFakultasToUsers extends Migration
{
    public function up()
    {
        $fields = [
            'fakultas' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'nama', // Ganti jika kolom 'nama' tidak ada
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'fakultas');
    }
}