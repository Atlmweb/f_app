<?php namespace App\Controllers;


class Migrate extends \CodeIgniter\Controller
{
    protected $forge;

    public function index()
    {
        $this->forge= \Config\Database::forge();


        //prigional migration not working, paste code here and run it.
        //TODO investigate later
        $this->forge->addField([
            'account_id'        => ['type' => 'INT', 'constraint'=> 9],
            'customer_id'       => ['type' => 'INT', 'constraint'=> 9],
            'flw_public'        => ['type' => 'VARCHAR', 'constraint'=> 50],
            'flw_secret'        => ['type' => 'VARCHAR', 'constraint'=> 50],
            'created_at'        => ['type' => 'DATETIME'],
            'updated_at'        => ['type' => 'TIMESTAMP']

        ]);
        $this->forge->addKey('account_id', TRUE);
        $this->forge->createTable('ff_flutterwave');

    }

}