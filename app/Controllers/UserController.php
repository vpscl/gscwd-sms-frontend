<?php


namespace App\Controllers;

class UserController extends BaseController
{
   
    public function index()
    {
        //helpers

        // helper('html');
        helper('endpoints');
        $getEndPoint = endPoints();
        $check_endpoint = $getEndPoint['check'];
        $login = $getEndPoint['login'];
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];
        $home = $getEndPoint['home'];

        //data helper
        $data['checkEP'] = $check_endpoint;
        $data['domain'] = $domain;
        $data['login'] = $login;
        $data['local'] = $local;
        $data['home'] = $home;

        echo view('templates/header',$data);
        echo view('pages/login', $data);
        echo view('templates/footer');
        echo view('script/login', $data);
    }

    public function signup()
    {
        //helpers

        // helper('html');
        helper('endpoints');
        $getEndPoint = endPoints();
        $check_endpoint = $getEndPoint['check'];
        $login = $getEndPoint['login'];
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];
        $home = $getEndPoint['home'];
        $user = $getEndPoint['user'];

        //data helper
        $data['checkEP'] = $check_endpoint;
        $data['domain'] = $domain;
        $data['login'] = $login;
        $data['local'] = $local;
        $data['home'] = $home;
        $data['user'] = $user;

        echo view('templates/header',$data);
        echo view('pages/signup', $data);
        echo view('templates/footer');
    }

    public function dashboard()
    {
        // helper('html');

        helper('endpoints');
        $getEndPoint = endPoints();
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];
        $user = $getEndPoint['user'];

        $data['domain'] = $domain;
        $data['local'] = $local;
        $data['user'] = $user;

        echo view('templates/header',$data);
        echo view('components/navbar');
        echo view('pages/dashboard', $data);
        echo view('templates/footer');
        echo view('script/dashboard', $data);
    }
}
