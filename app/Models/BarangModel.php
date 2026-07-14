<?php

namespace App\Models;

use CodeIgniter\Model;


class BarangModel extends Model
{

    protected $table = 'barang';

    protected $primaryKey = 'id';

    protected $returnType = 'array';


    protected $allowedFields = [

        'user_id',
        'kategori_id',
        'judul',
        'nama_barang',
        'deskripsi',
        'jenis',
        'status',
        'lokasi',
        'tanggal_kejadian',
        'kontak',
        'foto_utama',
        'qr_code'

    ];


    protected $useTimestamps = true;



    public function searchBarang($keyword = null)
    {

        $builder = $this->select(
            'barang.*, kategori.nama_kategori'
        );


        $builder->join(
            'kategori',
            'kategori.id = barang.kategori_id',
            'left'
        );



        if($keyword)
        {

            $builder->groupStart();


            $builder->like(
                'barang.nama_barang',
                $keyword
            );


            $builder->orLike(
                'barang.judul',
                $keyword
            );


            $builder->orLike(
                'barang.lokasi',
                $keyword
            );


            $builder->groupEnd();

        }


        return $builder;

    }



    public function getBarangLengkap()
    {
        return $this->select(
            'barang.*, kategori.nama_kategori'
        )
        ->join(
            'kategori',
            'kategori.id = barang.kategori_id',
            'left'
        );
    }


}