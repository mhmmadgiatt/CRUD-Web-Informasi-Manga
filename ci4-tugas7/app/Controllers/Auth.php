<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User as UserModel;

class Auth extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]',
                'password' => 'required|min_length[5]|max_length[32]|validateUser[username,password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'Email or password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('fail', 'Email or password don\'t match');
            } else {
                $model = new UserModel();

                $user = $model->where('username', $this->request->getVar('username'))->first();
                $this->setUserSession($user);

                $remember = $this->request->getVar('remember');
                if($remember != NULL)
                {
                    setcookie('username', true, time() + (8640 * 30));
                }
                session()->setFlashData('success', 'Login Success!');
                return redirect()->to('komik');
            }
        }
        return view('login', $data);
    }

    public function setUserSession($user)
    {
        $data = [
            'nama' => $user['nama'],
            'level' => $user['level'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        // dd(session()->get());
        return true;
    }

    public function register()
    {
        $data = [];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'nama' => 'required|min_length[3]|max_length[20]',
                'password' => 'required|min_length[5]|max_length[32]',
                'password_confirm' => 'matches[password]',
            ];
            $model = new UserModel();

            $data = [
                'nama' => $this->request->getVar('nama'),
                'level' => 1,
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
            ];
            $model->insert($data);
            session()->setFlashData('success', 'Register Success!');
            return redirect()->to('/');
        }
        return view('register', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
        setcookie("username", "", time() - 3600);
        setcookie("password", "", time() - 3600);
        return redirect()->to('/');
    }
}
