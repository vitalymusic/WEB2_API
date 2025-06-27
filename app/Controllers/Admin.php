<?php

namespace App\Controllers;

use CodeIgniter\Files\FileCollection;
use CodeIgniter\Files\File;

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


     public function list_files()
    {

        $folder = FCPATH . 'uploads/';
        $collection = new FileCollection();

        // Ielasa visus failus no mapes (neieskaitot apakšmapes)
        $collection->add($folder);

        // Atlasīt tikai failus (ne mapes)
        // $files = $collection->filter(static fn($file) => $file->isFile());

         $files = $collection;

        $output = [];

        foreach ($files as $file) {
            /** @var File $file */
            $output[] = [
                'name' => $file->getBasename(),
                'size' => $file->getSize(),
                'url'  => base_url('uploads/' . $file->getBasename()), // Ja publiskā mape
            ];
        }

        return $this->response->setJSON([
            'success' => true,
            'files'   => $output,
        ]);
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
       $uploadedFiles = $this->request->getFiles();
$results = [];

if (isset($uploadedFiles['files'])) {
    foreach ($uploadedFiles['files'] as $file) {
        if ($file->isValid() && !$file->hasMoved()) {
            $originalName = $file->getName();
            $uploadPath = FCPATH . 'uploads/';

            // Ja fails jau eksistē, pievieno timestamp
            if (file_exists($uploadPath . $originalName)) {
                $originalName = time() . '_' . $originalName;
            }

            $file->move($uploadPath, $originalName);
            $results[] = [
                'file' => $originalName,
                'status' => 'success'
            ];
        } else {
            $results[] = [
                'file' => $file->getName(),
                'status' => 'error',
                'message' => $file->getErrorString()
            ];
        }
    }

    return $this->response->setJSON([
        'success' => true,
        'results' => $results
    ]);
} else {
    return $this->response->setJSON([
        'success' => false,
        'message' => 'Faili netika saņemti.'
    ]);
}

    }







}