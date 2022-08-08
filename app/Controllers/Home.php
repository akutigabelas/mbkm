<?php

namespace App\Controllers;

use AuthLdap\Libraries\AuthLdap;
use CodeIgniter\View\View;

/**
 * Class User
 * @package App\Controllers
 * @author Karthikeyan C <karthikn.mca@gmail.com>
 */
class User extends BaseController
{
    /**
     * @var AuthLdap $authLdap
     */
    private $authLdap;

    /**
     * If Already declared Session in BaseController,
     * then comment the below declaration
     * @var \CodeIgniter\Session\Session
     */
    private $session;

    /**
     * User constructor.
     */
    public function __construct()
    {
        /**
         * If Already declared Session in BaseController,
         * then comment the below declaration
         */
        $this->session = \Config\Services::session();
    }

    /**
     * @return \CodeIgniter\HTTP\RedirectResponse|View  (postlogin redirect | pre-login template)
     * @author Karthikeyan C <karthikn.mca@gmail.com>
     */
    public function login()
    {
        if (
            null !== $this->request->getPost('username')
            && null !== $this->request->getPost('password')
        ) {
            $this->authLdap = new AuthLdap();
            if (
                is_object($this->authLdap)
                && method_exists($this->authLdap, 'authenticate')
            ) {
                $authenticatedUserData  =   $this->authLdap->authenticate(
                    trim($this->request->getPost('username')),
                    trim($this->request->getPost('password'))
                );
                if (!empty($authenticatedUserData)) {
                    $this->session->set($authenticatedUserData);
                    return redirect()->to('/user/dashboard');
                } else {
                    // report login failure
                }
            } else {
                //report about ldap error
            }
        }
        return view('user/login');
    }

    /**
     * @return string
     * @author Karthikeyan C <karthikn.mca@gmail.com>
     */
    public function logout()
    {
        $this->session->destroy();
        return view('user/logout');
    }

    /**
     * @author Karthikeyan C <karthikn.mca@gmail.com>
     */
    public function dashboard()
    {
        // do your own stuff here
    }
}
