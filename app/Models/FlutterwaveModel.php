<?php namespace App\Models;

use CodeIgniter\Model;

class FlutterwaveModel extends Model
{
    protected $table      = 'ff_flutterwave';
    protected $primaryKey = 'account_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['customer_id','flw_public','flw_secret','created_at']; //customise

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


//in_list[a,d,c]
    protected $validationRules    = [
        'customer_id'    => 'required|integer',
        'flw_public'    => 'required|max-length[50]',
        'flw_secret'    => 'required|max-length[50]',
        'created_at'    => 'required|valid-date',

    ];

    protected $validationMessages = [
        'email'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ]
    ];
}
