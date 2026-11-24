<?php

namespace App\Controllers;

class ContactController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'  => 'Hubungi Kami – ShopEase',
            'active' => 'contact',
        ];

        return view('frontend/contact', $data);
    }

    public function send()
    {
        $rules = [
            'name'    => 'required|min_length[3]|max_length[100]',
            'email'   => 'required|valid_email',
            'message' => 'required|min_length[10]',
        ];

        $messages = [
            'name' => [
                'required'   => 'Nama wajib diisi.',
                'min_length' => 'Nama minimal 3 karakter.',
            ],
            'email' => [
                'required'    => 'Email wajib diisi.',
                'valid_email' => 'Format email tidak valid.',
            ],
            'message' => [
                'required'   => 'Pesan wajib diisi.',
                'min_length' => 'Pesan minimal 10 karakter.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $name = trim((string) $this->request->getPost('name'));

        return redirect()->to('/contact')
            ->with('success', 'Terima kasih, ' . $name . '! Pesan Anda telah kami terima.');
    }
}
