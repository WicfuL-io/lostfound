<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddQrToBarang extends Migration
{

    public function up()
    {

        $this->forge->addColumn(
            'barang',
            [

                'qr_code'=>[
                    'type'=>'VARCHAR',
                    'constraint'=>255,
                    'null'=>true
                ]

            ]
        );

    }


    public function down()
    {

        $this->forge->dropColumn(
            'barang',
            'qr_code'
        );

    }

}