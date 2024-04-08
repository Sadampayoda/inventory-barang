<?php

namespace App\Controllers;

use App\Models\UsersModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $profile = new UsersModel();
        return view('profile/index',[
            'active' => 'profile',
            'data' => $profile->where('username',session()->get('username'))->first(),
        ]);
    }

    public function profil()
    {
        $profile = new UsersModel();
        return view('profile/profil',[
            'active' => 'profile',
            'data' => $profile->where('username',session()->get('username'))->first(),
        ]);
    }
    public function sandi()
    {
        $profile = new UsersModel();
        return view('profile/sandi',[
            'active' => 'profile',
            'data' => $profile->where('username',session()->get('username'))->first(),
        ]);
    }

    public function editPassword()
    {
        
        $rules = [
            'password'          => 'required',
            'new_password'      => 'required',
            'confirm_password'  => 'matches[new_password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        
        $password = $this->request->getPost('password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        
        if (!$this->passwordVerify($password)) {
            return redirect()->back()->withInput()->with('error', 'Password lama tidak cocok.');
        }

        
        $userId = session()->get('username'); 
        if (!$this->updatePassword($userId, $newPassword)) {
            return redirect()->back()->with('error', 'Gagal mengupdate password.');
        }

        return redirect()->to('/')->with('success', 'Password berhasil diubah.');
    }

    
    private function passwordVerify($password)
    {
        $userName = session()->get('username'); 

        
        $userModel = new UsersModel();
        $user = $userModel->where('username',$userName)->first();

        if ($password != $user['password']) {
            return false;
        }

        return true;
    }

    
    private function updatePassword($username, $newPassword)
    {

        
        $userModel = new UsersModel();
        $id = $userModel->where('username',session()->get('username'))->first();
        $data = [
            'password' => $newPassword
        ];
        

        return $userModel->update($id['id'], $data);
    }
}

