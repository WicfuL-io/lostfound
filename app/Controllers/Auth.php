<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        helper(['form', 'url']);

        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('auth/login', [
            'title' => 'Login'
        ]);
    }

    public function register()
{
    return view('auth/register', [
        'title' => 'Register'
    ]);
}

public function prosesRegister()
{
    $rules = [

        'nama' => 'required|min_length[3]',

        'nim' => 'required|is_unique[users.nim]',

        'email' => 'required|valid_email|is_unique[users.email]',

        'password' => 'required|min_length[6]',

        'password_confirm' => 'matches[password]'

    ];

    if (!$this->validate($rules)) {

        return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());

    }

    $this->userModel->save([

        'nama' => $this->request->getPost('nama'),

        'nim' => $this->request->getPost('nim'),

        'email' => $this->request->getPost('email'),

        'password' => password_hash(
            $this->request->getPost('password'),
            PASSWORD_DEFAULT
        ),

        'role' => 'mahasiswa'

    ]);

    return redirect()
        ->to('/login')
        ->with('success', 'Registrasi berhasil, silakan login.');
}

    public function prosesLogin()
    {
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');

        $user = $this->userModel
            ->groupStart()
                ->where('email', $login)
                ->orWhere('nim', $login)
            ->groupEnd()
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email atau NIM tidak ditemukan.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah.');
        }

        session()->set([
            'id'      => $user['id'],
            'nama'    => $user['nama'],
            'email'   => $user['email'],
            'role'    => $user['role'],
            'logged'  => true,
        ]);

        if ($user['role'] === 'admin') {
            return redirect()->to('/admin');
        }

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}