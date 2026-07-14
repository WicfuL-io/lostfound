<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotificationsTable extends Migration
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


            'user_id'=>[
                'type'=>'INT',
                'constraint'=>11
            ],


            'judul'=>[
                'type'=>'VARCHAR',
                'constraint'=>255
            ],


            'pesan'=>[
                'type'=>'TEXT'
            ],


            'link'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
                'null'=>true
            ],


            'dibaca'=>[
                'type'=>'INT',
                'constraint'=>1,
                'default'=>0
            ],


            'created_at DATETIME NULL',


            'updated_at DATETIME NULL'


        ]);


        $this->forge->addKey(
            'id',
            true
        );


        $this->forge->createTable(
            'notifications'
        );

    }



    public function down()
    {

        $this->forge->dropTable(
            'notifications'
        );

    }

}