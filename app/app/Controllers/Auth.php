<?php

namespace App\Controllers;

class Auth extends BaseController
{
    function __construct()
    {
        // Mendapatkan header info
        $this->db = \Config\Database::connect();

    }
    public function login()
    {
        return view('pages/login');
    }

    public function login_post()
    {
        $session = session();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $builder = $this->db->table('users');
        $builder->where('username',  $username);

        $data = $builder->get()->getFirstRow();
        if($data){
            if($password == $data->password) {
                
                 
                if($data->jenis_user == "admin"){
                    $ses_data = [
                        'userid'       => $data->id,
                        'logged_in'     => TRUE,
                        'userrole'     => "admin"
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/admin');
                }else {
                    $ses_data = [
                        'userid'       => $data->id,
                        'logged_in'     => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/');
                }
                
            }else{
                $session->setFlashdata('error', 'Password salah!');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('error', 'Username tidak ditemukan!');
            return redirect()->to('/login');
        }
        
    }

    public function register()
    {
        return view('pages/register');
    }
    public function register_post()
    {
        $session = session();
        $Var = array(
            $this->request->getVar('nama'),
            $this->request->getVar('kelas'),
            $this->request->getVar('npm'),
            $this->request->getVar('password')
        );

        print_r($Var);

        // insert data ke Tabel User
        $builder = $this->db->table('users');
        $builder->set('username', $Var[2]);
        $builder->set('password', $Var[3]);
        $builder->set('jenis_user', "mhs");
        if($builder->insert()){
            echo "berhasil tabel user<br>";
        }else{
            $session->setFlashdata('error', 'Registrasi gagal!');
        }

        // cek id berdasarkan username
        $builder = $this->db->table('users');
        $builder->where('username',  $Var[2]);

        $id_user = $builder->get()->getFirstRow()->id;

        // insert data ke Tabel Mahasiswa
        $builder = $this->db->table('mahasiswa');
        $builder->set('id_user', $id_user);
        $builder->set('nama', $Var[0]);
        $builder->set('kelas', $Var[1]);
        $builder->set('npm', $Var[2]);
        $builder->set('file_krs', '');
        $builder->set('status', "menunggu");
        if($builder->insert()){
            echo "berhasil tabel mahasiswa";
        }else{
            $session->setFlashdata('error', 'Registrasi gagal!');
        }
        return redirect()->to('/register');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
