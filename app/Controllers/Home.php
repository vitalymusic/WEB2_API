<?php

namespace App\Controllers;
class Home extends BaseController

{
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


    public function listUsers($id = ""){
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

        
        if($id==""){
                 return $this->response->setJSON($users);
        }else{
            $users_filtered = array_filter($users,function($item){
                if($item["id"]==$id){
                    return $item;
                }
            });
            return $this->response->setJSON($users_filtered);
        }

         

        
    }


}
