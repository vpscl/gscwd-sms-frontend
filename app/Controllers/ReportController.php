<?php

namespace App\Controllers;

class ReportController extends BaseController
{
    public function report()

    {
        helper('endpoints');
        $getEndPoint = endPoints();
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];
        $user = $getEndPoint['user'];

        $data['domain'] = $domain;
        $data['local'] = $local;
        $data['user'] = $user;
        

        echo view('templates/header', $data);
        echo view('components/navbar');
        echo view('pages/report', $data);
        echo view('templates/footer', $data);
        echo view('script/report', $data);
        echo view('script/report_staff', $data);
    }

    public function report_staff()

    {
        helper('endpoints');
        $getEndPoint = endPoints();
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];
        $user = $getEndPoint['user'];

        $data['domain'] = $domain;
        $data['local'] = $local;
        $data['user'] = $user;


        echo view('templates/header', $data);
        echo view('pages/printreport-staff', $data);
        echo view('templates/footer', $data);
        echo view('script/print_report_staff', $data);
    }

    public function printreport()

    {
        helper('endpoints');
        $getEndPoint = endPoints();
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];
        $user = $getEndPoint['user'];

        $data['domain'] = $domain;
        $data['local'] = $local;
        $data['user'] = $user;
        
        echo view('templates/header', $data);
        echo view('pages/printreport', $data);
        echo view('templates/footer', $data);
        echo view('script/print_report', $data);
        
    }
}
