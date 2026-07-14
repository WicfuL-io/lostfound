<?php

namespace App\Controllers\Admin;


use App\Controllers\BaseController;
use App\Models\ClaimModel;
use App\Models\BarangModel;



class Claim extends BaseController
{


    protected $claimModel;

    protected $barangModel;



    public function __construct()
    {

        $this->claimModel =
        new ClaimModel();


        $this->barangModel =
        new BarangModel();

    }




    public function index()
    {


        $claims = $this->claimModel

        ->select(
            'claims.*, 
            barang.judul,
            barang.foto_utama,
            users.nama'
        )


        ->join(
            'barang',
            'barang.id=claims.barang_id'
        )


        ->join(
            'users',
            'users.id=claims.user_id'
        )


        ->orderBy(
            'claims.created_at',
            'DESC'
        )


        ->findAll();



        return view(
            'admin/claim/index',
            [
                'claims'=>$claims
            ]
        );


    }






    public function terima($id)
    {


        $claim =
        $this->claimModel
        ->find($id);



        if(!$claim)
        {
            return redirect()
            ->back();
        }




        // update klaim

        $this->claimModel
        ->update(

            $id,

            [
                'status'=>'diterima'
            ]

        );




        // update barang

        $this->barangModel
        ->update(

            $claim['barang_id'],

            [

                'status'=>'sudah_kembali'

            ]

        );




        return redirect()
        ->back()
        ->with(
            'success',
            'Klaim diterima'
        );


    }







    public function tolak($id)
    {


        $this->claimModel
        ->update(

            $id,

            [
                'status'=>'ditolak'
            ]

        );



        return redirect()
        ->back()
        ->with(
            'success',
            'Klaim ditolak'
        );


    }


}