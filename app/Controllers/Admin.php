<?php

namespace App\Controllers;
class Admin extends BaseController{
      function __construct(){

        $this->db = \Config\Database::connect();
        $this->request = service('request');

    }


    public function index(){

        return view('admin/layout.php');
    }




}