<?php

namespace App\Controllers;
class Home extends BaseController

{
    function __construct(){

        $this->db = \Config\Database::connect();
        $this->request = service('request');

    }




    public function index()
        
    {
        $data = [
            'success' => true,
            'products' => [
                [
                    'name'=>"Burkani",
                    'id'      => 123,
                ],
                [
                    'name'=>"Katupeļi",
                    'id'      => 124,
                ],
                [
                    'name'=>"Kafija",
                    'id'      => 124,
                ],
            ]
        ];

        return $this->response->setJSON($data);

        // return view('welcome_message');
    }


    public function listUsers($id = "")
{
    $users = [
        [
            'id'    => 1,
            'name'  => 'Anna Ozoliņa',
            'email' => 'anna@example.com',
        ],
        [
            'id'    => 2,
            'name'  => 'Jānis Bērziņš',
            'email' => 'janis@example.com',
        ],
        [
            'id'    => 3,
            'name'  => 'Laura Kalniņa',
            'email' => 'laura@example.com',
        ],
        [
            'id'    => 4,
            'name'  => 'Mārtiņš Liepa',
            'email' => 'martins@example.com',
        ],
        [
            'id'    => 5,
            'name'  => 'Ilze Lapiņa',
            'email' => 'ilze@example.com',
        ],
    ];

    if ($id === "") {
        return $this->response->setJSON($users);
    } else {
        $filtered = array_values(array_filter($users, function 
        ($item) use ($id) {
            return $item['id'] == $id;
        }));

        return $this->response->setJSON($filtered);
    }
}


    public function showProducts($id = ""){
            $data = [];
            $builder = $this->db->table('products');
            
            if($id==""){
                $query   = $builder->get();
            }else{
                $query   = $builder->where('id',$id)->get();
            }
            
            foreach ($query->getResult() as $row) {
                $data[] = $row;
            }

              return $this->response->setJSON($data);   
    }


    public function addProduct(){
           

            $builder = $this->db->table('products');
            //$data = $this->request->getPost();
            $data = [
                "nosaukums"=>esc($this->request->getPost('nosaukums')),
                "apraksts"=>esc($this->request->getPost('apraksts')),
                "cena"=>esc($this->request->getPost('cena')),
                "attels"=>esc($this->request->getPost('attels'))
            ];
            if($builder->insert($data)){
                    return $this->response->setJSON(["success"=>true]);}  
                    else{
                    return $this->response->setJSON(["success"=>false]); 
                    }
            }


            public function updateProduct($id=""){
                    if($id=="") return false;
                      $builder = $this->db->table('products');
                     $data = [
                        "nosaukums"=>esc($this->request->getPost('nosaukums')),
                        "apraksts"=>esc($this->request->getPost('apraksts')),
                        "cena"=>esc($this->request->getPost('cena')),
                        "attels"=>esc($this->request->getPost('attels'))
                    ];

             if($builder->where('id',$id)->update($data)){
                    return $this->response->setJSON(["success"=>true]);}  
                    else{
                    return $this->response->setJSON(["success"=>false]); 
                    }

            }



            public function deleteProduct($id){
               // $data = $this->request->getPost();
              
                    $builder = $this->db->table('products');
                    if($builder->delete(['id' => $id])){
                             return $this->response->setJSON(["deleted"=>true]); 
                    }
                
            }

    }
