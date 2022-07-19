<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Login extends Controller
{
    public function index()
    {
        return redirect()->to('/login');
    } 
 
    public function auth()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        echo $email;
       
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
} 