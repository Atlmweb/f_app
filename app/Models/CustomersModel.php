<?php namespace App\Models;

use CodeIgniter\Model;

class CustomersModel extends Model
{
    protected $table      = 'ff_customers';
    protected $primaryKey = 'church_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cust_id','account_type','account_key','account_expiry','deployment_type','customer_name','cust_phone_primary','admin_email','admin_password','customer_logo','cust_ip_address','created_at',]; //customise

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


//in_list[a,d,c]
    protected $validationRules    = [
        'account_type'    => 'required|in_list[free,subscription]',
        'account_key'     => 'required|max-length[100]',
        'account_expiry'  => 'required|valid-date',
        'deployment_type' => 'required|in_list[single,multiple]',
        'customer_name'   => 'required|max-length[100]',
        'cust_phone_primary'=> 'required|max-length[20]',
        'admin_email'     => 'required|max-length[150]|valid_email',
        'admin_password'  => 'required|max-length[255]',
        'customer_logo'=> 'required|max-length[255]',
        'cust_ip_address' => 'required|max-length[20]',
    ];

    protected $validationMessages = [
        'email'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ]
    ];
}
