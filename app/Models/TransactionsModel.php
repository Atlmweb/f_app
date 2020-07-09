<?php namespace App\Models;

use CodeIgniter\Model;

class TransactionsModel extends Model
{
    protected $table      = 'ff_transactions';
    protected $primaryKey = 'reference';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['church_id','user_id','payment_date','cat_id','payment_mode','currency','amount','reference','description','citation','created_at',]; //customise

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


//in_list[a,d,c]
//'cash','cheque','pos','bank_transfer','kingspay','kind','online'
    protected $validationRules    = [
        'church_id'    => 'required|integer',
        'user_id'      => 'required|integer',
        'payment_date' => 'required|valid_date',
        'cat_id'       => 'required|integer',
        'payment_mode' => 'required|in_list[cash,cheque,pos,bank_transfer,kingspay,kind,online]',
        'currency'     => 'required|max_length[3]',
        'amount'       => 'required|decimal',
        'reference'    => 'max_length[100]',
        'description'  => 'max_length[100]',
        'citation'     => 'required|max_length[255]',
        'created_at'   => 'required|valid_date',

    ];

    protected $validationMessages = [
        'reference'        => [
            'required' => 'Reference is required and should be unique'
        ]
    ];
}
