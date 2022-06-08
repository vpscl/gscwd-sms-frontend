<?php

namespace App\Controllers;

class Tickets extends BaseController
{
    public function tickets()

    {
        helper('endpoints');
        $getEndPoint = endPoints();
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];

        $data['domain'] = $domain;
        $data['local'] = $local;


        echo view('templates/header',$data);
        echo view('components/navbar');
        echo view('pages/tickets');
        echo view('templates/footer', $data);
        echo view('script/ticket_list', $data);
    }

    public function newticket()

    {
        helper('endpoints');
        $getEndPoint = endPoints();
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];

        $data['domain'] = $domain;
        $data['local'] = $local;


        echo view('templates/header',$data);
        echo view('components/navbar');
        echo view('pages/newticket', $data);
        echo view('templates/footer', $data);
        echo view('script/new_ticket', $data);
    }

      public function viewticket()

    {
        helper('endpoints');
        $getEndPoint = endPoints();
        $domain = $getEndPoint['domain'];
        $local = $getEndPoint['local'];

        $data['domain'] = $domain;
        $data['local'] = $local;


        echo view('templates/header',$data);
        echo view('components/navbar');
        echo view('pages/viewticket', $data);
        echo view('templates/footer', $data);
        echo view('script/view_ticket', $data);
    }
}
