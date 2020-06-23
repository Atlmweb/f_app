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
        'first_name'       => 'required|max-length[60]',
        'last_name'        => 'required|max-length[60]',
        'birth_date'       => 'required|valid-date',
        'phone_number'     => 'required|max-length[20]',
        'email_address'    => 'required|max-length[255]',
        'password'         => 'required|max-length[255]',
        'random_key'       => 'required|max-length[255]',
        'random_key_expiry'=> 'required|valid-date',
        'location_address' => 'required|max-length[255]',
        'country_id'       => 'required|integer',
        'gender'           => 'required|in-list[male,female]',
        'is_saved'         => 'required|in-list[yes,no]',
        'is_baptised'      => 'required|in-list[yes,no]',
        'marital_status'   => 'required|integer',
        'created_at'       => 'required|valid-date',

    ];

    protected $validationMessages = [
        'email'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ]
    ];
}