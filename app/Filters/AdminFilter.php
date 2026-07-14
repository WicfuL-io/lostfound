<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class AdminFilter implements FilterInterface
{

    /**
     * Before Filter
     */
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {


        $session = session();



        // Cek apakah user sudah login
        if (!$session->get('logged_in')) {

            return redirect()
                ->to('/login')
                ->with('error', 'Silahkan login terlebih dahulu');

        }



        // Cek role admin
        if ($session->get('role') !== 'admin') {


            return redirect()
                ->to('/')
                ->with('error', 'Anda tidak memiliki akses admin');

        }


    }



    /**
     * After Filter
     */
    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {


    }


}