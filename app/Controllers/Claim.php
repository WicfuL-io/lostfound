<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ClaimModel;
use App\Models\BarangModel;
use App\Models\NotificationModel;


class Claim extends BaseController
{

    protected $claimModel;

    protected $barangModel;

    protected $notificationModel;



    public function __construct()
    {

        $this->claimModel = new ClaimModel();

        $this->barangModel = new BarangModel();

        $this->notificationModel = new NotificationModel();

    }



    // halaman form klaim

    public function create($id)
    {

        $barang = $this->barangModel
            ->find($id);


        if(!$barang)
        {
            return redirect()
                ->to('/barang');
        }



        return view(
            'claim/create',
            [
                'barang'=>$barang
            ]
        );

    }





    // simpan klaim

    public function store()
    {


        $barangId = $this->request
            ->getPost('barang_id');



        $barang = $this->barangModel
            ->find($barangId);



        if(!$barang)
        {
            return redirect()
                ->back();
        }




        // upload bukti

        $bukti = $this->request
            ->getFile('bukti');


        $namaBukti = null;



        if($bukti && $bukti->isValid())
        {

            $namaBukti =
            $bukti->getRandomName();


            $bukti->move(
                FCPATH.'uploads/claim',
                $namaBukti
            );

        }




        // simpan klaim

        $this->claimModel->insert([


            'barang_id'=>$barangId,


            'user_id'=>session('id'),


            'alasan'=>
            $this->request->getPost('alasan'),


            'bukti'=>$namaBukti,


            'status'=>'pending'


        ]);





        // ==============================
        // BUAT NOTIFIKASI PEMILIK BARANG
        // ==============================


        $this->notificationModel->insert([


            'user_id'=>$barang['user_id'],


            'judul'=>'Klaim Barang Baru',


            'pesan'=>
            'Barang '.$barang['judul'].' mendapatkan pengajuan klaim baru.',


            'link'=>
            '/admin/claim',


            'dibaca'=>0


        ]);





        return redirect()

            ->to('/claim/saya')

            ->with(
                'success',
                'Klaim berhasil dikirim'
            );


    }





    // daftar klaim saya

    public function index()
    {


        $claims = $this->claimModel

        ->select(
            'claims.*, barang.judul'
        )


        ->join(
            'barang',
            'barang.id=claims.barang_id'
        )


        ->where(
            'claims.user_id',
            session('id')
        )


        ->orderBy(
            'claims.created_at',
            'DESC'
        )


        ->findAll();



        return view(
            'claim/index',
            [
                'claims'=>$claims
            ]
        );


    }


}