<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Home extends BaseController
{

    protected $barangModel;


    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }


    public function index()
    {

        $data = [

            'title' => 'Lost & Found Kampus',

            'barangTerbaru' => $this->barangModel
                ->getBarangLengkap()
                ->orderBy('barang.created_at', 'DESC')
                ->findAll(3),


            'totalHilang' => $this->barangModel
                ->where('status','Hilang')
                ->countAllResults(),


            'totalDitemukan' => $this->barangModel
                ->where('status','Ditemukan')
                ->countAllResults(),


            'totalKembali' => $this->barangModel
                ->where('status','Kembali')
                ->countAllResults()

        ];


        return view('home/index',$data);

    }

}