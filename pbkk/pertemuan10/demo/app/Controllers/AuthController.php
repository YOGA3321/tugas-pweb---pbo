<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function loginForm()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(session()->get('role') === 'admin' ? '/admin/products' : '/');
        }

        return view('auth/login', [
            'title'  => 'Login – ShopEase',
            'active' => 'login',
        ]);
    }

    public function login()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $email    = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');

        $userModel = new UserModel();
        $user      = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->regenerate();
            session()->set([
                'user_id'   => $user['id'],
                'name'      => $user['name'],
                'email'     => $user['email'],
                'role'      => $user['role'],
                'logged_in' => true,
            ]);

            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/products')
                    ->with('success', 'Selamat datang kembali, ' . $user['name'] . '!');
            }

            return redirect()->to('/')
                ->with('success', 'Login berhasil! Selamat berbelanja, ' . $user['name'] . '.');
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Email atau password salah.');
    }

    public function registerForm()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }

        return view('auth/register', [
            'title'  => 'Registrasi Akun – ShopEase',
            'active' => 'register',
        ]);
    }

    public function register()
    {
        $rules = [
            'name'             => 'required|min_length[3]|max_length[100]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]',
        ];

        $messages = [
            'email' => [
                'is_unique' => 'Email sudah terdaftar, silakan gunakan email lain atau login.',
            ],
            'password' => [
                'min_length' => 'Password minimal 6 karakter.',
            ],
            'password_confirm' => [
                'matches' => 'Konfirmasi password tidak cocok.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $userModel->insert([
            'name'     => trim((string) $this->request->getPost('name')),
            'email'    => trim((string) $this->request->getPost('email')),
            'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'customer',
        ]);

        return redirect()->to('/login')
            ->with('success', 'Registrasi berhasil! Silakan login dengan akun baru Anda.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')
            ->with('success', 'Anda telah keluar dari sesi.');
    }
}
