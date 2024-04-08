<?php

namespace App\Controllers;

use App\Models\UsersModel;

class ValidationController extends BaseController
{
    public function login()
    {
        return view('validation/login');
    }

    public function processLogin()
    {
        helper(['form']);

        
        if ($this->request->getPost()) {
            $validation = \Config\Services::validation(); 
            if (! $validation->run($this->request->getPost(),'login')) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            
        }
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new UsersModel();
        $user = $model->where('username', $username)
                      ->where('password', $password)
                      ->first();

        if ($user) {
            session()->set([
                'id' => $user['id'],
                'photo' => $user['photo'],
                'username' => $user['username'],
                'level' => $user['level'],
            ]);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        // Hapus sesi pengguna
        session()->destroy();

        // Redirect ke halaman login atau halaman lain yang Anda tentukan
        return redirect()->to('/login')->with('success', 'Anda telah berhasil keluar.');
    }
}
