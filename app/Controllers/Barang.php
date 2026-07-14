<?php

namespace App\Controllers;


use App\Models\BarangModel;
use App\Models\KategoriModel;


class Barang extends BaseController
{


    protected $barangModel;

    protected $kategoriModel;



    public function __construct()
    {

        helper([
            'form',
            'url',
            'qr'
        ]);


        $this->barangModel =
        new BarangModel();


        $this->kategoriModel =
        new KategoriModel();

    }







    public function index()
    {


        $keyword =
        $this->request->getGet('keyword');


        $jenis =
        $this->request->getGet('jenis');


        $kategori =
        $this->request->getGet('kategori');


        $status =
        $this->request->getGet('status');



        $builder =
        $this->barangModel
        ->searchBarang($keyword);




        if($jenis)
        {

            $builder->where(
                'barang.jenis',
                $jenis
            );

        }




        if($kategori)
        {

            $builder->where(
                'barang.kategori_id',
                $kategori
            );

        }





        if($status)
        {

            $builder->where(
                'barang.status',
                $status
            );

        }




        $data = [


            'title'=>'Daftar Barang',



            'barang'=>

            $builder

            ->orderBy(
                'barang.created_at',
                'DESC'
            )

            ->paginate(9),




            'pager'=>

            $this->barangModel->pager,




            'kategori'=>

            $this->kategoriModel->findAll()


        ];





        return view(
            'barang/index',
            $data
        );

    }









    public function create()
    {


        return view(
            'barang/create',
            [

                'title'=>'Tambah Barang',

                'kategori'=>
                $this->kategoriModel->findAll()

            ]
        );

    }









    public function store()
    {



        $rules = [


            'judul'=>
            'required|min_length[5]',



            'nama_barang'=>
            'required',



            'kategori_id'=>
            'required|integer',



            'jenis'=>
            'required|in_list[hilang,ditemukan]',



            'lokasi'=>
            'required',



            'tanggal_kejadian'=>
            'required',



            'kontak'=>
            'required',



            'deskripsi'=>
            'required',



            'foto_utama'=>
            'uploaded[foto_utama]|max_size[foto_utama,2048]|is_image[foto_utama]'


        ];






        if(!$this->validate($rules))
        {


            return redirect()

            ->back()

            ->withInput()

            ->with(

                'errors',

                $this->validator->getErrors()

            );


        }







        // UPLOAD FOTO


        $foto =

        $this->request
        ->getFile('foto_utama');




        $namaFoto =

        $foto->getRandomName();




        $foto->move(

            FCPATH.'uploads/barang',

            $namaFoto

        );








        // SIMPAN DATA BARANG


        $data=[


            'user_id'=>
            session()->get('id'),



            'kategori_id'=>
            $this->request
            ->getPost('kategori_id'),



            'judul'=>
            $this->request
            ->getPost('judul'),



            'nama_barang'=>
            $this->request
            ->getPost('nama_barang'),



            'deskripsi'=>
            $this->request
            ->getPost('deskripsi'),



            'jenis'=>
            $this->request
            ->getPost('jenis'),



            'status'=>
            'belum_ditemukan',



            'lokasi'=>
            $this->request
            ->getPost('lokasi'),



            'tanggal_kejadian'=>
            $this->request
            ->getPost('tanggal_kejadian'),



            'kontak'=>
            $this->request
            ->getPost('kontak'),



            'foto_utama'=>
            $namaFoto



        ];







        // INSERT DAN AMBIL ID


        $id =

        $this->barangModel
        ->insert($data);








        // BUAT QR CODE


        $qr = generateQR($id);






        // UPDATE QR


        $this->barangModel
        ->update(

            $id,

            [

                'qr_code'=>$qr

            ]

        );







        return redirect()

        ->to('/barang')

        ->with(

            'success',

            'Laporan berhasil ditambahkan.'

        );


    }









    public function detail($id)
    {


        $barang =

        $this->barangModel

        ->getBarangLengkap()

        ->where(

            'barang.id',

            $id

        )

        ->first();





        if(!$barang)
        {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }





        return view(

            'barang/detail',

            [

                'title'=>'Detail Barang',

                'barang'=>$barang

            ]

        );


    }









    public function edit($id)
    {


        $barang =

        $this->barangModel
        ->find($id);




        if(!$barang)
        {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }





        if(

            session()->get('role')!='admin'

            &&

            session()->get('id')!=$barang['user_id']

        )

        {

            return redirect()

            ->to('/barang')

            ->with(

                'error',

                'Tidak memiliki akses'

            );

        }





        return view(

            'barang/edit',

            [

                'title'=>'Edit Barang',

                'barang'=>$barang,

                'kategori'=>

                $this->kategoriModel->findAll()

            ]

        );


    }









    public function update($id)
    {


        $barang =

        $this->barangModel
        ->find($id);




        if(!$barang)
        {

            return redirect()
            ->to('/barang');

        }





        $foto =

        $this->request
        ->getFile('foto_utama');



        $namaFoto =

        $barang['foto_utama'];






        if(

            $foto

            &&

            $foto->isValid()

            &&

            !$foto->hasMoved()

        )

        {


            if(

                !empty($barang['foto_utama'])

                &&

                file_exists(

                FCPATH.
                'uploads/barang/'.
                $barang['foto_utama']

                )

            )

            {

                unlink(

                FCPATH.
                'uploads/barang/'.
                $barang['foto_utama']

                );

            }






            $namaFoto =

            $foto->getRandomName();




            $foto->move(

                FCPATH.'uploads/barang',

                $namaFoto

            );


        }







        $this->barangModel

        ->update(

            $id,

            [


                'kategori_id'=>
                $this->request->getPost('kategori_id'),


                'judul'=>
                $this->request->getPost('judul'),


                'nama_barang'=>
                $this->request->getPost('nama_barang'),


                'deskripsi'=>
                $this->request->getPost('deskripsi'),


                'jenis'=>
                $this->request->getPost('jenis'),


                'status'=>
                $this->request->getPost('status'),


                'lokasi'=>
                $this->request->getPost('lokasi'),


                'tanggal_kejadian'=>
                $this->request->getPost('tanggal_kejadian'),


                'kontak'=>
                $this->request->getPost('kontak'),


                'foto_utama'=>$namaFoto


            ]

        );





        return redirect()

        ->to('/barang')

        ->with(

            'success',

            'Data berhasil diperbarui.'

        );


    }









    public function delete($id)
    {


        $barang =

        $this->barangModel
        ->find($id);




        if(!$barang)
        {

            return redirect()
            ->to('/barang');

        }






        if(

            session()->get('role')!='admin'

            &&

            session()->get('id')!=$barang['user_id']

        )

        {

            return redirect()
            ->to('/barang');

        }






        if(

            !empty($barang['foto_utama'])

            &&

            file_exists(

            FCPATH.
            'uploads/barang/'.
            $barang['foto_utama']

            )

        )

        {

            unlink(

            FCPATH.
            'uploads/barang/'.
            $barang['foto_utama']

            );

        }





        $this->barangModel
        ->delete($id);





        return redirect()

        ->to('/barang')

        ->with(

            'success',

            'Data berhasil dihapus.'

        );


    }



}