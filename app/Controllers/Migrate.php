<?php namespace App\Controllers;


class Migrate extends \CodeIgniter\Controller
{
    protected $forge;

    public function index()
    {
        $this->forge= \Config\Database::forge();


        //prigional migration not working, paste code here and run it.
        //TODO investigate later
        //setup church services for streaming live or recorded
        $this->forge->addField([
            'service_id'        => ['type' => 'INT', 'constraint'=> 9, 'unsigned'=>TRUE, 'auto_increment'=>TRUE],
            'church_id'         => ['type' => 'INT', 'constraint'=>9, 'unsigned'=>TRUE],
            'service_date'      => ['type' => 'DATETIME'],
            'service_title'     => ['type' => 'VARCHAR', 'constraint'=>100],
            'stream_platform'   => ['type' => 'ENUM("youtube","imm","vimeo","facebook")'],
            'stream_url'        => ['type' => 'VARCHAR', 'constraint'=>200],
            'video_url'         => ['type' => 'VARCHAR', 'constraint'=>200],
            'video_platform'    => ['type' => 'ENUM("youtube","vimeo","facebook")'],
            'visibility'        => ['type' => 'ENUM("public","logged_in","admin_only")', 'default'=>'public'],
            'created_at'        => ['type' => 'DATETIME'],
            'updated_at'        => ['type' => 'TIMESTAMP'],

        ]);
        $this->forge->addKey('service_id', TRUE);
        $this->forge->createTable('ff_services');


    }

}