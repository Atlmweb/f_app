<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'ff_users';
    protected $primaryKey = 'user_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['church_id','customer_id','title','first_name','last_name','birth_date','phone_number','email_address','password','random_key','random_key_expiry','location_address','country_id','gender','is_saved','is_baptised','marital_status','created_at']; //customise

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';





//in_list[a,d,c]
    protected $validationRules    = [
        'church_id'        => 'required|integer',
        'customer_id'      => 'required|integer',
        'title'            => 'required|max-length[50]',
        'first_name'       => 'trim|required|max-length[60]',
        'last_name'        => 'trim|required|max-length[60]',
        'birth_date'       => 'trim|valid_date[Y-m-d H:i:s]',
        'phone_number'     => 'trim|max-length[20]',
        'email_address'    => 'required|valid_email|max-length[150],is_unique[ff_users.email_address]',
        'password'         => 'trim|required|max_length[255]',
        'random_key'       => 'max_length[255]',
        'random_key_expiry'=> 'required|valid_date[Y-m-d H:i:s]',
        'location_address' => 'trim|required|max_length[255]',
        'country_id'       => 'required|integer',
        'gender'           => 'required|in_list[male,female]',
        'is_saved'         => 'required|in_list[yes,no]',
        'is_baptised'      => 'required|in_list[yes,no]',
        'marital_status'   => 'in_list[married,single,divorced,widowed]',
        'created_at'       => 'required|valid_date',

    ];

    protected $validationMessages = [
        'email_address'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ]
    ];
}
