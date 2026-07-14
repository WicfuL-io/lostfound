<?php

namespace App\Controllers;


use App\Models\NotificationModel;


class Notification extends BaseController
{


    protected $notificationModel;



    public function __construct()
    {

        $this->notificationModel =
        new NotificationModel();

    }




    public function index()
    {


        $data =
        $this->notificationModel

        ->where(
            'user_id',
            session('id')
        )

        ->orderBy(
            'created_at',
            'DESC'
        )

        ->findAll();



        return view(
            'notification/index',
            [
                'notifications'=>$data
            ]
        );


    }






    public function read($id)
    {


        $this->notificationModel

        ->update(

            $id,

            [
                'dibaca'=>1
            ]

        );



        return redirect()
        ->back();


    }



}