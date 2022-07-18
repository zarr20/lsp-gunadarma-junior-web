<?php

namespace App\Controllers;

class Admin extends BaseController
{

    function __construct()
    {
        // Mendapatkan header info
        $this->db = \Config\Database::connect();

    }

    public function index()
    {
        $builder = $this->db->table('kursus');
        $builder->join('jadwal_kursus', 'jadwal_kursus.id_kursus = kursus.id');
        $builder->orderBy('nama_kursus', 'ASC');
        $this->data['data_kursus'] = $builder->get();
        $builder = $this->db->table('kursus');
        $builder->orderBy('nama_kursus', 'ASC');
        $this->data['materi_kursus'] = $builder->get();
        return view('pages/home', $this->data);
    }
}
