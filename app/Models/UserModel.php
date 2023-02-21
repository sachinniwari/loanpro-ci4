<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = [
        'firstName',
        'lastName',
        'email',
        'mobile',
        'password',
    ];

    public function getUser()
    {
        return $this->findAll();
    }


    public function searchData($firstname){
        $result = $this->select()->like('firstName', $firstname);
            return $result;
        }
        public function userList(){
            $result = $this->select()->get()->getResultArray();
            // ->db->table($this->table)
            return $result;
        }
        public function sortData($sort){
              
             if($sort!=null){
            
                $result = $this->select()->orderBy('firstName', $sort);
                return $result;
            }
            }
            
              

//     public function GetSearchdata()
//   {
//     $this->db->select("*");  
//     $this->db->like('user',$this->input->get('search'));
//     $query = $this->db->get("user"); 
//     return $query->result();
//   }
}