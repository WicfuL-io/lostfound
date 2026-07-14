<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\ClaimModel;

class Dashboard extends BaseController
{
    protected $barangModel;
    protected $claimModel;


    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->claimModel = new ClaimModel();
    }


    public function index()
    {

        $userId = session()->get('id');


        $laporanSaya = $this->barangModel
            ->where('user_id',$userId)
            ->countAllResults();


        $barangHilang = $this->barangModel
            ->where('user_id',$userId)
            ->where('jenis','hilang')
            ->countAllResults();


        $barangDitemukan = $this->barangModel
            ->where('user_id',$userId)
            ->where('jenis','ditemukan')
            ->countAllResults();



        $klaimSaya = $this->claimModel
            ->where('user_id',$userId)
            ->countAllResults();



        $barangTerbaru = $this->barangModel
            ->where('user_id',$userId)
            ->orderBy('created_at','DESC')
            ->findAll(5);



        return view('dashboard/index',[

            'laporanSaya'=>$laporanSaya,

            'barangHilang'=>$barangHilang,

            'barangDitemukan'=>$barangDitemukan,

            'klaimSaya'=>$klaimSaya,

            'barangTerbaru'=>$barangTerbaru

        ]);

    }
}