<?php namespace App\Models;

use CodeIgniter\Model;

class GivingCategoryModel extends Model
{
    protected $table          = 'ff_giving_cat';
    protected $primaryKey     = 'cat_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields  = ['church_id','cat_name','cat_code','cat_desc','is_enabled','created_at']; //customise

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    //in_list[a,d,c]
    protected $validationRules    = [
        'church_id'    => 'required|integer',
        'cat_name'     => 'required|max_length[100]',
        'cat_code'     => 'required|max_length[50]',
        'cat_desc'     => 'required',
        'is_enabled'   => 'required|in-list[yes,no]',
        'created_at'   => 'required|valid-date',

    ];

    protected $validationMessages = [
    'email'        => [
    'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
    ]
    ];
}
