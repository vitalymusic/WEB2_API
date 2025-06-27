<?php

namespace App\Controllers;
class Admin extends BaseController{
      function __construct(){

        $this->db = \Config\Database::connect();
        $this->request = service('request');
        $this->session = session();

    }

    private function checkUser(){
         if( $this->session->get("email")==="" || $this->session->get('logged_in') !== true ){
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


    public function logout(){
               $this->session->destroy();
               return redirect()->to('/login');

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
          if($this->checkUser()===false){
                return redirect()->to('/login');
            };

            $table = new \CodeIgniter\View\Table();

        $data = [
             "active_page"=>"users"
        ];

        // Ielādēt lietotājus no DB, 
        // ielikt tos tabulā

           $builder = $this->db->table('users');
           $users = [];
            $query = $builder->select('id,name,email,role,status,created_at')->get();


            $table->setHeading('NPK', 'Vārds', 'Epasts','Loma','Aktīvs','Izveides datums');
                    $template = [
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table table-bordered">',
        ];

        $table->setTemplate($template);

           $data["users"] = $table->generate($query);

        return view('admin/users_screen.php',$data);
    }

     public function gallery(){
          if($this->checkUser()===false){
                return redirect()->to('/login');
            };


        $data = [
             "active_page"=>"gallery"
        ];    
        return view('admin/gallery_screen.php',$data);
    }
     public function posts(){
         if($this->checkUser()===false){
                return redirect()->to('/login');
        };


        $data = [
             "active_page"=>"posts"
        ];

          $table = new \CodeIgniter\View\Table();
            $builder = $this->db->table('posts');
            $query = $builder->get();
             $table->setHeading('NPK', 'Virsraksts', 'Saturs','Izveides datums');

              $template = [
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table table-bordered">',
        ];

        $table->setTemplate($template);

           $data["posts"] = $table->generate($query);

        return view('admin/posts_screen.php',$data);
    }



    public function upload_file(){


        // admin/gallery/upload

         $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();
            $data = ['uploaded_fileinfo' => new File($filepath)];
            $data = [
                'success' => true
            ];
            return $this->response->setJSON($data);
        }

        $data = [
            'errors' => 'The file has already been moved.'
        ];
        return $this->response->setJSON($data);

    }







}