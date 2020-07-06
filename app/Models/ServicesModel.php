<?php namespace App\Models;

use CodeIgniter\Model;
class ServicesModel extends Model{


    protected $table      = 'ff_services';
    protected $primaryKey = 'service_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['service_id','church_id','service_date','service_title','stream_platform','stream_url','video_url','video_platform','service_notes','visibility','created_at']; //customise

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';



    protected $validationRules   = [

           'church_id'       => 'trim',
           'service_date'    => 'required|valid_date',
           'service_title'   => 'required|max_length[100]',
           'stream_platform' => 'required|in_list[youtube,imm,vimeo,facebook]',
           'stream_url'      => 'required|max_length[200]',
           'video_url'       => 'required|max_length[200]',
           'video_platform'  => 'required|in_list[youtube,imm,vimeo,facebook]',
           'service_notes'   => 'trim',
           'visibility'      => 'in_list[public,logged,admin]',
           'created_at'      => 'trim'

    ];



}