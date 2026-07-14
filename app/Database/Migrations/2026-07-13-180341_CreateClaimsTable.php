<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClaimsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'auto_increment'=>true
            ],

            'barang_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true
            ],

            'user_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true
            ],

            'alasan'=>[
                'type'=>'TEXT'
            ],

            'bukti'=>[
                'type'=>'TEXT'
            ],

            'status'=>[
                'type'=>'ENUM',
                'constraint'=>[
                    'pending',
                    'diterima',
                    'ditolak'
                ],
                'default'=>'pending'
            ],

            'created_at DATETIME NULL',

            'updated_at DATETIME NULL'

        ]);

        $this->forge->addKey('id',true);

        $this->forge->addForeignKey(
            'barang_id',
            'barang',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('claims');
    }

    public function down()
    {
        $this->forge->dropTable('claims');
    }
}