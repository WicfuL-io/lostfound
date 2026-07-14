<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $kategori = [

            [

                'nama_kategori' => 'Elektronik',

                'icon' => 'bi-phone',

            ],

            [

                'nama_kategori' => 'Tas',

                'icon' => 'bi-backpack',

            ],

            [

                'nama_kategori' => 'Dompet',

                'icon' => 'bi-wallet2',

            ],

            [

                'nama_kategori' => 'Kunci',

                'icon' => 'bi-key',

            ],

            [

                'nama_kategori' => 'Dokumen',

                'icon' => 'bi-file-earmark',

            ],

            [

                'nama_kategori' => 'Helm',

                'icon' => 'bi-shield',

            ],

            [

                'nama_kategori' => 'Buku',

                'icon' => 'bi-book',

            ],

            [

                'nama_kategori' => 'Kartu Identitas',

                'icon' => 'bi-person-vcard',

            ],

            [

                'nama_kategori' => 'Pakaian',

                'icon' => 'bi-bag',

            ],

            [

                'nama_kategori' => 'Lainnya',

                'icon' => 'bi-box',

            ],

        ];

        foreach ($kategori as $item) {

            $item['created_at'] = date('Y-m-d H:i:s');

            $item['updated_at'] = date('Y-m-d H:i:s');

            $this->db->table('kategori')->insert($item);
        }
    }
}