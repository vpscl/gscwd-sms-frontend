<?php

namespace App\Controllers;

class IncidentController extends BaseController
{
    public function incident()

    {
        helper('endpoints');
        $getEndPoint = endPoints();
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];

        $data['domain'] = $domain;
        $data['local'] = $local;

        echo view('templates/header',$data);
        echo view('components/navbar');
        echo view('pages/incident',$data);
        echo view('templates/footer',$data);
        echo view('script/incident',$data);
    }

    public function view_incident()

    {
        helper('endpoints');
        $getEndPoint = endPoints();
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];

        $data['domain'] = $domain;
        $data['local'] = $local;

        echo view('templates/header',$data);
        echo view('components/navbar');
        echo view('pages/view_incident',$data);
        echo view('templates/footer',$data);
        echo view('script/view-incident',$data);
    }

    public function new_incident()

    {
        helper('endpoints');
        $getEndPoint = endPoints();
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];

        $data['domain'] = $domain;
        $data['local'] = $local;

        echo view('templates/header',$data);
        echo view('components/navbar');
        echo view('pages/new-incident',$data);
        echo view('templates/footer',$data);
        echo view('script/new-incident',$data);
    }

}
