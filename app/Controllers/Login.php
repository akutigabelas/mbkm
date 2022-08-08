<?php

namespace App\Controllers;

use CodeIgniter\Controller;
//use App\Models\UserModel;
use App\Libraries\AuthLdap;

class Login extends Controller
{
    public function getIndex()
    {
        if (session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/pages/home');
        }
        helper(['form']);
        echo view('login');
    }

    public function postAuth()
    {
        $session = session();
        //$model = new UserModel();

        $userName = $this->request->getPost('userName');
        $password = $this->request->getPost('password');
        //$authldap = new AuthLdap();
        $this->authLdap = new AuthLdap('userName', 'password');
        if (
            is_object($this->authLdap)
            && method_exists($this->authLdap, 'authenticate')
        ) {
            $authenticatedUserData  =   $this->authLdap->authenticate($userName, $password);
            //exit('<pre>'.print_r($authenticatedUserData,true).'</pre>');
            if (is_array($authenticatedUserData) && !empty($authenticatedUserData['dn'])) {
                $session->set($authenticatedUserData);
                return redirect()->to('/pages');
            } else {
                $session->setFlashdata('msg', 'Wrong Username/Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'LDAP error');
            return redirect()->to('/login');
        }
        //exit('<pre>'.print_r($data).'</pre>');

    }

    public function getLogout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
