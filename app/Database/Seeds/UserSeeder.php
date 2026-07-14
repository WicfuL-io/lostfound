<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [

            [
                'nama' => 'Administrator',

                'nim' => 'ADMIN001',

                'email' => 'admin@kampus.ac.id',

                'password' => password_hash('admin123', PASSWORD_DEFAULT),

                'role' => 'admin',

                'foto' => null,

                'created_at' => date('Y-m-d H:i:s'),

                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ];

        $this->db->table('users')->insertBatch($data);
    }
}