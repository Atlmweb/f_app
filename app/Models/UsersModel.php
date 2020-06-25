<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'ff_users';
    protected $primaryKey = 'user_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['church_id','customer_id','title','first_name','last_name','birth_date','phone_number','email_address','password','random_key','random_key_expiry','location_address','country_id','gender','is_saved','is_baptised','marital_status','created_at']; //customise

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (! isset($data['password'])) {
            return $data;
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);



        return $data;
    }



//in_list[a,d,c]
    protected $validationRules    = [
        'church_id'        => 'required|integer',
        'customer_id'      => 'required|integer',
        'title'            => 'required|max_length[50]',
        'first_name'       => 'trim|required|max_length[60]',
        'last_name'        => 'trim|required|max_length[60]',
        'birth_date'       => 'trim',
        'phone_number'     => 'trim|max_length[20]',
        'email_address'    => 'required|valid_email|max_length[150],is_unique[ff_users.email_address]',
        'password'         => 'trim|required|min_length[6]',
        'random_key'       => 'trim|max_length[255]',
        'random_key_expiry'=> 'trim',
        'location_address' => 'trim|max_length[255]',
        'country_id'       => 'if_exist|integer',
        'gender'           => 'if_exist|in_list[male,female]',
        'is_saved'         => 'if_exist|in_list[yes,no]',
        'is_baptised'      => 'if_exist|in_list[yes,no]',
        'marital_status'   => 'if_exist|in_list[married,single,divorced,widowed]',
        'created_at'       => 'if_exist|valid_date[Y-m-d]',

    ];

    protected $validationMessages = [
        'email_address'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ]
    ];
}
