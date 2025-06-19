<?php

namespace App\Controllers;
class Admin extends BaseController{
      function __construct(){

        $this->db = \Config\Database::connect();
        $this->request = service('request');
        $this->session = session();

    }

    private function checkUser(){
         if( !$this->session->get("email") || $this->session->get('logged_in')!==true ){
                return false;
            }
    }

    public function index(){

            if($this->checkUser()===false){
                return redirect()->to('/login');
            };

        $data = [
            "active_page"=>"index"
        ];
        return view('admin/main_screen.php',$data);
    }


    public function login(){

            // username
            // password 
        $data = [
            
        ];
        return view('admin/login_screen.php',$data);
    }

    public function authorize(){
            // admin@gmail.com
            // 12345


            $data = esc($this->request->getPost());
            $builder = $this->db->table('users');
            $query = $builder->like('email', $data["email"])->get();

            $user = "";
           
            $user = $query->getResultArray();

            if($user){
                // return dd($user);
               if(password_verify($data["password"], $user[0]["password"])){
                    $this->session->set($user[0]);
                    $this->session->set("logged_in",true);
                    $this->session->remove("error");
               } else{
                    //   $this->session->remove('');
                      $this->session->set("logged_in",false);
                      $this->session->setFlashdata("error","Nepareizs lietotājs un vai parole");
                      $this->session->close();
               }   
            }else{
                    
                    $this->session->set("logged_in",false);
                    $this->session->setFlashdata("error","Nepareizs lietotājs un vai parole");
            }  
            
            if( $this->session->get("email") && $this->session->get('logged_in')===true ){
                return redirect()->to('/admin');
            }else{
                return redirect()->to('/login');
            }
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