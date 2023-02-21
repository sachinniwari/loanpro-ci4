<?php

namespace App\Controllers;

use App\Models\UserModel;

// use Config\Services;



class Home extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('user/signup');

    }

    public function register()
    {
        helper(['form']);
        $validation = \Config\Services::validation();
        $model = new UserModel();
        $data = [];
        
        $rules = [

            'firstName' => "required|min_length[2]|max_length[20]",
            'lastName' => "required|min_length[3]|max_length[20]",
            'email' => "required|min_length[3]|max_length[20]|valid_email",
            'mobile' => "required|min_length[10]|max_length[10]",
            'password' => "required|min_length[8]|max_length[20]",
            'confirmPassword' => "matches[password]"

        ];
        if ($this->request->getMethod() === 'post' && $this->validate($rules)) {
           
            $data = [
                'firstName' => $this->request->getPost('firstName'),
                'lastName' => $this->request->getPost('lastName'),
                'email' => $this->request->getPost('email'),
                'mobile' => $this->request->getPost('mobile'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role' => 0
            ];
            $model->save($data);

            echo view('user/login');


        } else {
            $data['validation'] = $this->validator;
            echo view('user/signup', $data);


        }
    }

    // public function register()
    // {

    //     helper(['form']);
    //     $rules = [
    //         'firstName' => 'required|min_length[2]|max_length[50]',
    //         'lastName' => 'required|min_length[2]|max_length[50]',
    //         'mobile' => 'required|min_length[10]|max_length[10]|',
    //         'email' => 'required|min_length[4]|max_length[100]|valid_email',
    //         'password' => 'required|min_length[4]|max_length[50]',
    //         'confirmPassword' => 'matches[password]'
    //     ];
    //     if ($this->validate($rules)) {
    //         $usermodel = new UserModel();
    //         $firstName = $this->request->getPost('firstName');
    //         $lastName = $this->request->getPost('lastName');
    //         $mobile = $this->request->getPost('mobile');
    //         $email = $this->request->getPost('email');
    //         $password = $this->request->getPost('password');
    //         $password = password_hash($password, PASSWORD_DEFAULT);

    //         $data = ['fname' => $firstName, 'lname' => $lastName, 'mobile' => $mobile, 'email' => $email, 'password' => $password];
    //         //  print_r($data);
    //         // die();
    //         $result = $usermodel->insert($data);

    //         if ($result) {
    //             echo "User registered successfully";
    //             //  $session->set("users", $result);

    //             return redirect()->to('/dashboard');
    //         } else {
    //             echo "Error during registration";
    //         }
    //     }
    //     else{
    //         $data['validation'] = $this->validator;
    //         echo view('user/signup', $data);
    //             }
    // }
    public function login()
    {
        echo view('user/login');

    }

    public function auth()
    {

        $session = session();
        $model = new UserModel();

        if (
            $this->request->getMethod() === 'post' && $this->validate([

                "email" => 'required',
                "password" => 'required'

            ])
        ) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $data = $model->where('email', $email)->first();
            print_r($data);

            if ($data) {
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);
                if ($verify_pass) {
                    $ses_data = [
                        'email' => $data['email'],
                        'logged_in' => TRUE
                    ];
                    $session->set($ses_data);
                    if (!$data['role'])
                        return redirect()->to('user/dashboard');
                    else
                        return redirect()->to('admin/dashboard');
                } else {
                    $session->setFlashdata('msg', 'Wrong Password');
                    return redirect()->to('Home/login');
                }
            } else {
                $session->setFlashdata('msg', 'Email not Found');
                return redirect()->to('Home/login');
            }
        } else
            echo view('Home/login');

    }
    public function dashboard()
    {
        $session = session();
        echo view('user/dashboard');
    }
    public function admindashboard()
    {
        return redirect()->to('/admin/fetchData');
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/user/login');
    }
    public function fetchData()
    {
       
        $model = new UserModel();
      
        if($this->request->getGet('search')){

            $search = $this->request->getGet('search');
            
            $result = $model->searchData($search);
            
            $data = [
                'user' => $model->paginate(5),
                'pager' => $model->pager,
            ];
        }
        else if($this->request->getGet('sort')){
            $sort = $this->request->getGet('sort');
            $result = $model->sortData($sort);
            $data = [
                'user' => $model->paginate(5),
                'pager' => $model->pager,
            ];
    
        }
        else{
            $result = $model->getUser();
            $data = [
                'user' => $model->paginate(5),
                'pager' => $model->pager,

            ];
            
        }
        echo view('admin/dashboard', $data);
        
        // //$data['user'] = $model->getUser();
        // $data = [
        //     'user' => $model->paginate(5),
        //     'pager' => $model->pager,
        // ];
        
    }
    
    
    public function delete($id = null){
        $model = new UserModel();
        $data['user'] = $model->where('id', $id)->delete($id);
        return redirect()->to('admin/dashboard');
    }
    public function update($id = null){
       
        $model = new UserModel();
        $data['user'] = $model->where('id', $id)->first();
        return view('admin/edit', $data);
    }
    public function updateData(){
        $model = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'firstName' => $this->request->getVar('firstName'),
            'lastName' => $this->request->getVar('lastName'),
            'email'  => $this->request->getVar('email'),
            'mobile'  => $this->request->getVar('mobile'),

        ];
        $model->update($id, $data);
        return redirect()->to('admin/dashboard');
    }
    
}