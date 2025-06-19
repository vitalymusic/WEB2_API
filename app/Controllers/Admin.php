<?php

namespace App\Controllers;
class Admin extends BaseController{
      function __construct(){

        $this->db = \Config\Database::connect();
        $this->request = service('request');

    }


    public function index(){
        $data = [
            "active_page"=>"index"
        ];
        return view('admin/main_screen.php',$data);
    }

    
    public function login(){
        $data = [
            
        ];
        return view('admin/login_screen.php',$data);
    }



    

      public function users(){
        $data = [
             "active_page"=>"users"
        ];
        return view('admin/users_screen.php',$data);
    }

     public function gallery(){
        $data = [
             "active_page"=>"gallery"
        ];    
        return view('admin/gallery_screen.php',$data);
    }
     public function posts(){
        $data = [
             "active_page"=>"posts"
        ];
        return view('admin/posts_screen.php',$data);
    }




}