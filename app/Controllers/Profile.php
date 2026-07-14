<?php

namespace App\Controllers;


use App\Models\UserModel;


class Profile extends BaseController
{

    protected $userModel;


    public function __construct()
    {

        $this->userModel = new UserModel();

    }



    public function index()
    {

        $user = $this->userModel
            ->find(session('id'));



        return view(
            'profile/index',
            [
                'user'=>$user
            ]
        );

    }




    public function update()
    {


        $id = session('id');


        $user = $this->userModel
            ->find($id);



        $foto = $this->request
            ->getFile('foto');



        $namaFoto = $user['foto'];



        if($foto && $foto->isValid())
        {


            if(
                !empty($user['foto']) &&
                file_exists(
                    FCPATH.'uploads/profile/'.$user['foto']
                )
            ){

                unlink(
                    FCPATH.'uploads/profile/'.$user['foto']
                );

            }



            $namaFoto =
            $foto->getRandomName();



            $foto->move(
                FCPATH.'uploads/profile',
                $namaFoto
            );


        }



        $this->userModel
            ->update(
                $id,
                [

                    'nama'=>$this->request->getPost('nama'),

                    'nim'=>$this->request->getPost('nim'),

                    'fakultas'=>$this->request->getPost('fakultas'),

                    'prodi'=>$this->request->getPost('prodi'),

                    'no_hp'=>$this->request->getPost('no_hp'),

                    'foto'=>$namaFoto

                ]
            );



        return redirect()
            ->to('/profile')
            ->with(
                'success',
                'Profil berhasil diperbarui'
            );


    }

}