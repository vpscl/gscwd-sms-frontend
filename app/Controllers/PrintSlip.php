<?php

namespace App\Controllers;

class PrintSlip extends BaseController
{
    public function printslip()

    {
        helper('endpoints');
        $getEndPoint = endPoints();
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];

        $data['domain'] = $domain;
        $data['local'] = $local;

        echo view('templates/header',$data);
        echo view('pages/printslip',$data);
        echo view('templates/footer');
    }


}
