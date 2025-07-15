<?php

namespace App\Controllers;
class Shop extends BaseController 
{

 function __construct(){

        $this->db = \Config\Database::connect();
        $this->request = service('request');

    }

    public function index(){

          $builder = $this->db->table('digital_products');
            $data["products"] = [];
               $query   = $builder->get();
             foreach ($query->getResultArray() as $row) {
               $data["products"][] =  $row;
            }

       $data["title"] = "Veikals";

        return view('shop/main_screen',$data);
    }

}

