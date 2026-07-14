<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'kategori_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],

            'nama_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],

            'deskripsi' => [
                'type' => 'TEXT',
            ],

            'jenis' => [
                'type'       => 'ENUM',
                'constraint' => ['hilang', 'ditemukan'],
            ],

            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['belum_ditemukan', 'sudah_kembali'],
                'default'    => 'belum_ditemukan',
            ],

            'lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'tanggal_kejadian' => [
                'type' => 'DATE',
            ],

            'kontak' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],

            'foto_utama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

        ]);

        $this->forge->addKey('id', true);

        $this->forge->addKey('user_id');
        $this->forge->addKey('kategori_id');

        $this->forge->addForeignKey(
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'kategori_id',
            'kategori',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}