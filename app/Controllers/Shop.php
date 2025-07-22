<?php

namespace App\Controllers;
class Shop extends BaseController 
{

 function __construct(){

        $this->db = \Config\Database::connect();
        $this->request = service('request');
          $this->session = session();
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



    public function login(){
        // 1.  lietotājs
        // janis@example.com
        // 12345

        // 2. lietotājs
        // anna.k@example.com
        


            $data = $this->request->getPost();
            $builder = $this->db->table('customers');
            $query = $builder->like('email', $data["email"])->get();

            // $user = "";
           
            $user = $query->getResultArray();

            if($user){
               
               if(password_verify($data["password"], $user[0]["password"])){
                    $this->session->set($user[0]);
                    $this->session->set("logged_in",true);
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
                $data["user"] = $user;
                $data["message"]="success";
                return $this->response->setJSON($data);
            }else{
                $data["message"]="false";
                return $this->response->setJSON($data);
            }
    }

    public function show_products(){
          $data["title"] = "iegādātie produkti";



           $builder = $this->db->table('digital_products');
            $data["products"] = [];
            $builder->select('digital_products.id,digital_products.name, digital_products.price,digital_products.image,digital_products.file_url,digital_products.category');
            $builder->join('customers_digital_products', 'customers_digital_products.product_id = digital_products.id');
            $builder->join('customers', 'customers_digital_products.customer = customers.id');
            $builder->where('customers.id',session()->id);
            $query = $builder->get();
            foreach ($query->getResultArray() as $row) {
               $data["products"][] =  $row;
            }
            
       $data["title"] = "Veikals";
    

        return view('shop/main_screen',$data);

    }

     private function checkProduct(){

      
     }



}

