<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'    => 'Profil Mahasiswa - Ageng Prayogo',
            'nama'     => 'Ageng Prayogo',
            'nrp'      => '5025241225',
            'jurusan'  => 'Teknik Informatika',
            'angkatan' => '2024',
            'semester' => 'Semester 5',
            'status'   => 'Mahasiswa Aktif',
        ];

        return view('profil_view', $data);
    }
}
