<?php

namespace App\Models;

use CodeIgniter\Model;


class ClaimModel extends Model
{

    protected $table = 'claims';

    protected $primaryKey = 'id';

    protected $returnType = 'array';


    protected $allowedFields = [

        'barang_id',
        'user_id',
        'alasan',
        'bukti',
        'status'

    ];


    protected $useTimestamps = true;



    public function getClaimsLengkap()
    {

        return $this->select('
                claims.*,
                users.nama,
                barang.judul
            ')

            ->join(
                'users',
                'users.id = claims.user_id',
                'left'
            )

            ->join(
                'barang',
                'barang.id = claims.barang_id',
                'left'
            );

    }


}