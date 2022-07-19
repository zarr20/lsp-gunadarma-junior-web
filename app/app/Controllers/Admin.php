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
        // $builder->join('jadwal_kursus', 'jadwal_kursus.id_kursus = kursus.id');
        $builder->orderBy('nama_kursus', 'ASC');
        $this->data['data_kursus'] = $builder->get();
        $builder = $this->db->table('kursus');
        $builder->orderBy('nama_kursus', 'ASC');
        $this->data['materi_kursus'] = $builder->get();
        return view('pages/admin/data_kursus', $this->data);
    }

    public function kursus_tambah(){
        return view('pages/admin/data_kursus_tambah');
    }

    public function kursus_tambah_post(){
        $nama = $this->request->getVar('nama_kursus');
        $keterangan = $this->request->getVar('keterangan_kursus');


        $data = [
            'nama_kursus' => $nama,
            'keterangan_kursus'  => $keterangan,
        ];

        $builder = $this->db->table('kursus');
        $builder->insert($data);
        // return view('pages/admin/data_kursus_tambah');
        return redirect()->to('/admin/data-kursus');
    }

    public function kursus_edit($id){
        // echo $id;
        $builder = $this->db->table('kursus');
        $builder->where('id',  $id);

        $this->data['data'] = $builder->get()->getFirstRow();
        return view('pages/admin/data_kursus_edit', $this->data);
    }

    public function kursus_edit_post($id){
        $nama = $this->request->getVar('nama_kursus');
        $keterangan = $this->request->getVar('keterangan_kursus');


        $data = [
            'nama_kursus' => $nama,
            'keterangan_kursus'  => $keterangan,
        ];

        $builder = $this->db->table('kursus');
        $builder->where('id',  $id);
        $builder->update($data);
        // return view('pages/admin/data_kursus_tambah');
        return redirect()->to('/admin/data-kursus');
    }

    public function kursus_delete($id){
        $builder = $this->db->table('kursus');
        $builder->where('id',  $id);
        $builder->delete();
        return redirect()->to('/admin/data-kursus');
    }

    // data jadwal kursus

    public function jadwal_kursus(){
        $builder = $this->db->table('kursus');
        $builder->join('jadwal_kursus', 'jadwal_kursus.id_kursus = kursus.id');
        $builder->orderBy('nama_kursus', 'ASC');
        $this->data['data_kursus'] = $builder->get();
        $builder = $this->db->table('kursus');
        $builder->orderBy('nama_kursus', 'ASC');
        $this->data['materi_kursus'] = $builder->get();
        return view('pages/admin/data_jadwal_kursus', $this->data);
    }

    // data pendaftaran peserta

    public function pendaftaran_peserta(){
        $builder = $this->db->table('kursus_daftar');
        $builder->select('*, kursus_daftar.id AS iddaftar');
        $builder->join('mahasiswa', 'kursus_daftar.id_mhs = mahasiswa.id');
        $builder->join('jadwal_kursus', 'kursus_daftar.id_jadwal = jadwal_kursus.id');
        $builder->join('kursus', 'jadwal_kursus.id_kursus = kursus.id');
        $builder->orderBy('tanggal_permintaan', 'ASC');
        $this->data['data_pendaftaran'] = $builder->get();
        return view('pages/admin/data_pendaftaran_peserta', $this->data);
    }

    // data mahasiswa

    public function mahasiswa(){
        $builder = $this->db->table('mahasiswa');
        $builder->orderBy('id', 'ASC');
        $this->data['data_mahasiswa'] = $builder->get();
        return view('pages/admin/data_mahasiswa', $this->data);
    }
}
