<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    function __construct()
    {
        // Mendapatkan header info
        $this->db = \Config\Database::connect();

    }
    public function daftar()
    {
        $builder = $this->db->table('kursus');
        $builder->join('jadwal_kursus', 'jadwal_kursus.id_kursus = kursus.id');
        $builder->orderBy('nama_kursus', 'ASC');
        $this->data['data_kursus'] = $builder->get();
        return view('pages/mahasiswa/kursus_daftar', $this->data);
    }

    public function daftar_form($idjadwal)
    {
        $builder = $this->db->table('kursus');
        $builder->join('jadwal_kursus', 'jadwal_kursus.id_kursus = kursus.id');
        
        $builder->orderBy('nama_kursus', 'ASC');
        $builder->where('jadwal_kursus.id',  $idjadwal);
        $this->data['data_kursus'] = $builder->get();

    

        return view('pages/mahasiswa/kursus_daftar_form', $this->data);
    }

    public function daftar_form_post($idjadwal)
    {
        $id_user = session()->get('userid');
        $builder = $this->db->table('mahasiswa');
        $builder->where('id_user',$id_user );
 
        $id_mhs = $builder->get()->getFirstRow()->id;

        $fileuploaded = "tidak ada berkas";
        if($_FILES["file"]["name"]){
            print_r($_FILES["file"]["name"]);
            $upload_dir =  dirname(dirname(dirname(__FILE__))) . '/public/uploads/krs/';

            $fileType = explode(".",  $_FILES["file"]["name"]);
            $FileNameChangeTo =  md5($_FILES["file"]["name"]);
            $newfilename = $FileNameChangeTo . '.' . end($fileType);
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $upload_dir . $newfilename)) {
                $fileuploaded = '/uploads/krs/'.$newfilename;
            }

        }

        
        $builder2 = $this->db->table('kursus_daftar');
        $builder2->set('id_mhs',"$id_mhs");
        $builder2->set('id_user',"$id_user");
        $builder2->set('id_jadwal',"$idjadwal");
        $builder2->set('krs',"$fileuploaded");
        $builder2->set('status',"menunggu persetujuan");
        if($builder2->insert()){
            echo "berhasil tabel mahasiswa";
        }else{
            $builder->insert()->error(); 
        }
        return redirect()->to("/status-pendaftaran/");

    }

    public function status_pendaftaran()
    {
        $id_user = session()->get('userid');
        $builder = $this->db->table('kursus_daftar');
        $builder->join('mahasiswa', 'kursus_daftar.id_mhs = mahasiswa.id');
        $builder->orderBy('tanggal_permintaan', 'ASC');
        $builder->where('kursus_daftar.id_user',$id_user );
        $this->data['data_pendaftaran'] = $builder->get();
        return view('pages/mahasiswa/status_pendaftaran', $this->data);
    }

}
