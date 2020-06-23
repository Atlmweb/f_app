<?php namespace App\Models;

use CodeIgniter\Model;

class ChurchesModel extends Model
{
    protected $table      = 'ff_churches';
    protected $primaryKey = 'church_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['customer_id','cp_user_id','ca_user_id','church_name','church_parent','church_type','church_address','church_country','church_longitude','church_latitude','church_phone','church_email','church_extra_info','created_at']; //customise

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


//in_list[a,d,c]
    protected $validationRules    = [
        'customer_id'     => 'required|integer',
        'cp_user_id'      => 'required|integer',
        'ca_user_id'      => 'required|integer',
        'church_name'     => 'required|max-length[150]',
        'church_parent'   => 'required|max-length[150]',
        'church_type'     => 'required|in_list[ce,other_ministry]',
        'church_address'  => 'required|max-length[255]',
        'church_country'  => 'required|integer',
        'church_longitude'=> 'required|max-length[50]',
        'church_latitude' => 'required|max-length[50]',
        'church_latitude' => 'required|max-length[50]',
        'church_email'    => 'required|max-length[150]',
        'church_email'    => 'required|max-length[255]',
        'created_at'      => 'required|valid-date',

    ];

    protected $validationMessages = [
        'email'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ]
    ];
}