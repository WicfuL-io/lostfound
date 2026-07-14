<?php

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;



function generateQR($id)
{


    $url = base_url(
        'barang/detail/'.$id
    );



    $result = (new Builder(

        writer: new PngWriter(),

        data: $url,

        size: 300,

        margin: 10

    ))->build();





    $name = 'qr_'.$id.'.png';



    $folder = FCPATH.'uploads/qr/';




    // buat folder otomatis jika belum ada

    if(!is_dir($folder))
    {

        mkdir(
            $folder,
            0777,
            true
        );

    }





    $result->saveToFile(

        $folder.$name

    );





    return $name;


}