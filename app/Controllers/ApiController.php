<?php
namespace App\Controllers;

use CodeIgniter\HTTP\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use \Firebase\JWT\JWT;

class ApiController extends ResourceController
{
    use ResponseTrait;
    public function __construct()
    {
        
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, Authorization, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
      
    }

    public function index()
    {

        $usermodel = model(UsersModel::class);

        $data = $usermodel->findAll();
        return $this->respond($data);

    }


    public function userdetail($id)
    {

        $usermodel = model(UsersModel::class);
        $data = $usermodel->getWhere(['id' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No Data Found with id ' . $id);
        }
    }

    public function create()
    {

        $usermodel = model(UsersModel::class);


        $data = [
            'firstName' => $this->request->getVar('firstName'),
            'lastName' => $this->request->getVar('lastName'),
            'email' => $this->request->getVar('email'),
            'mobile' => $this->request->getVar('mobile'),
            'password' => $this->request->getVar('password'),
        ];
        $result = $usermodel->insert($data);

        if (!$result) {
            $message = $usermodel->errors();
            $response = [
                'status' => 403,
                'error' => null,
                'messages' => [
                    'success' => $result,
                    'message' => $message

                ]
            ];
            return $this->respondCreated($response);
        }

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => "true"
            ]
        ];
        return $this->respondCreated($response);

    }

    public function login()
    {

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');



        $usermodel = model(UsersModel::class);
        $where = [
            'email' => $email
        ];
        $result = $usermodel->getWhere(['email' => $email])->getResultArray();

        if (isset($result[0]['password'])) {

            $password1 = isset($result[0]['password']) ? $result[0]['password'] : '';
        }


        if (isset($password1) && !empty($password1)) {
            if ($password1 == $password) {
                $session = \Config\Services::session();
                $session->set('id', $result[0]['id']);
                $response = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'true',
                        'message' => "Login Successful",
                        'role' => $result[0]['role'],
                        'id' => $result[0]['id']
                    ]
                ];
                return $this->respondCreated($response);
            }else{
                $response = [
                    'status' => 403,
                    'error' => "Invalid user or password",
                    'messages' => [
                        'success' => 'false',
                        'message' => "Login failed"
                    ]
                ];
                return $this->respondCreated($response);
            }
        } else {
            $response = [
                'status' => 403,
                'error' => "Invalid user or password",
                'messages' => [
                    'success' => 'false',
                    'message' => "Login failed"
                ]
            ];
            return $this->respondCreated($response);
        }
    }
    public function delete($id = null)
    {
        $usermodel = model(UsersModel::class);
        $data = $usermodel->find($id);
        if ($data) {
            $usermodel->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No Data Found with id ' . $id);
        }

    }

    public function update($id = null)
    {
        $usermodel = model(UsersModel::class);
       $data = [
           'firstName' => $this->request->getVar('firstName'),
           'lastName' => $this->request->getVar('lastName'),
           'email' => $this->request->getVar('email'),
           'mobile' => $this->request->getVar('mobile'),
           'role' => $this->request->getVar('role'),
        ];
        $result = $usermodel->where('mobile', $data['mobile'])->findAll();
        $result1 = $usermodel->where('email', $data['email'])->findAll();
        if($result&&$result[0]['id']!=$id){
            $response = [
                'status'   => 403,
                'error'    => null,
                'messages' => [
                    'success' => false,
                    'message'=>"This Mobile number already present"
                    ]
                ];
                return $this->respond($response);
            
                
            }

            else if ($result1 && $result1[0]['id']!=$id){
                $response = [
                    'status'   => 403,
                    'error'    => null,
                    'messages' => [
                        'success' => false,
                        'message'=>"This email already present"
                        ]
                    ];
                    return $this->respond($response);

        } else {

            $data1 = $usermodel->find($id);
            if ($data1) {
                $result = $usermodel->update($id, $data);
                $response = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => true,
                        'message' => "data updated Successfully"
                    ]
                ];
                return $this->respond($response);
            } else {

                $response = [
                    'status' => 404,
                    'error' => null,
                    'messages' => [
                        'success' => false,
                        'message' => "user not Found"
                    ]
                ];
                return $this->respond($response);

            }
        }
        
    }



}