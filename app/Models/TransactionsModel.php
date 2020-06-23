<?php namespace App\Models;

use CodeIgniter\Model;

class TransactionsModel extends Model
{
    protected $table      = 'ff_transactions';
    protected $primaryKey = 'txn_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['church_id','user_id','payment_date','cat_id','payment_mode','currency','amount','reference','description','citation','created_at',]; //customise

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


//in_list[a,d,c]
    protected $validationRules    = [
        'church_id'    => 'required|integer',
        'user_id'      => 'required|integer',
        'payment_date' => 'required|valid-date',
        'cat_id'       => 'required|integer',
        'payment_mode' => 'required|in-list[offline,online]',
        'currency'     => 'required|max-length[3]',
        'amount'       => 'required|decimal',
        'reference'    => 'required|max-length[100]',
        'description'  => 'required|max-length[100]',
        'citation'     => 'required|max-length[255]',
        'created_at'   => 'required|valid-date',

    ];

    protected $validationMessages = [
        'email'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ]
    ];
}
