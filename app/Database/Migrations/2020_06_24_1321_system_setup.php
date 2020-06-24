<?php namespace App\Database\Migrations;

class SystemSetup extends \CodeIgniter\Database\Migration {

    //clients [cust_id, customer_name, cust_phone, admin_email, admin_password,created_at]

    public function up()
    {
        //customers table
        $this->forge->addField([
            'cust_id'            => ['type' => 'INT', 'constraint' => 7, 'unsigned' => TRUE, 'auto_increment' => TRUE],
            'account_type'       => ['type' => 'ENUM("free","subscription")','default'=>'free'],
            'account_key'        => ['type' => 'VARCHAR','constraint'=>'100','null'=>TRUE],
            'account_expiry'     => ['type' => 'DATETIME','null'=>TRUE],
            'deployment_type'    => ['type' => 'ENUM("single","multiple")','default'=>'single'],
            'customer_name'      => ['type' => 'VARCHAR', 'constraint' => '100'],
            'cust_phone_primary' => ['type' => 'VARCHAR', 'constraint' => 20],
            'admin_email'        => ['type' => 'VARCHAR', 'constraint' => 150],
            'admin_password'     => ['type' => 'VARCHAR', 'constraint'    => 255],
            'customer_logo'      => ['type' => 'VARCHAR', 'constraint'    => 255, 'null'=>TRUE],
            'cust_ip_address'    => ['type' => 'VARCHAR', 'constraint'    => 20, 'null'=>TRUE],
            'created_at'         => ['type' => 'DATETIME'],
        ]);

        $this->forge->addKey('cust_id', TRUE);
        $this->forge->createTable('ff_customers');


        //church
        $this->forge->addField([
            'church_id'            => ['type' => 'INT', 'constraint' => 8, 'unsigned' => TRUE, 'auto_increment' => TRUE],
            'customer_id'          => ['type' => 'INT', 'constraint' => 7, 'unsigned' => TRUE],
            'cp_user_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned'=>TRUE], //church pastor
            'ca_user_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned'=>TRUE], //church admin
            'church_name'          => ['type' => 'VARCHAR', 'constraint'=>150],
            'church_parent'        => ['type' => 'VARCHAR', 'constraint'=>150, 'null'=>TRUE], //when a parent creates a child
            'church_type'          => ['type' => 'ENUM("ce","other_ministry")', 'default'=>'ce'], //for configuration
            'church_address'       => ['type' => 'VARCHAR', 'constraint'=>255],
            'church_country'       => ['type' => 'INT',      'constraint'=>3],
            'church_longitude'     => ['type' => 'VARCHAR', 'constraint'=>50],
            'church_latitude'      => ['type' => 'VARCHAR', 'constraint'=>50],
            'church_phone'         => ['type' => 'VARCHAR', 'constraint'=>50],
            'church_email'         => ['type' => 'VARCHAR', 'constraint'=>150],
            'church_extra_info'    => ['type' => 'VARCHAR', 'constraint'=>255],
            'created_at'           => ['type' => 'DATETIME'],
            'updated_at'           => ['type' => 'TIMESTAMP'],

        ]);
        $this->forge->addKey('church_id', TRUE);
        $this->forge->createTable('ff_churches');


        //Profiles

        $this->forge->addField([
            'user_id'            => ['type' => 'INT', 'constraint'  => 5, 'unsigned' => TRUE, 'auto_increment' => TRUE],
            'church_id'          => ['type' => 'INT', 'constraint'  => 8, 'unsigned'=>TRUE],
            'customer_id'        => ['type' => 'INT', 'constraint'  => 8, 'unsigned'=>TRUE],
            'title'              => ['type' => 'VARCHAR', 'constraint'=> 50],
            'first_name'         => ['type' => 'VARCHAR', 'constraint'=>60],
            'last_name'          => ['type' => 'VARCHAR', 'constraint'=>60],
            'birth_date'         => ['type' => 'DATE',    'null'=>TRUE],
            'phone_number'       => ['type' => 'VARCHAR', 'constraint' => 20],
            'email_address'      => ['type' => 'VARCHAR', 'constraint'=>255],
            'password'           => ['type' => 'VARCHAR', 'constraint'=>255],
            'random_key'         => ['type' => 'VARCHAR', 'constraint'=>255, 'null'=>TRUE],
            'random_key_expiry'  => ['type' => 'DATETIME', 'null'=>TRUE],
            'location_address'   => ['type' => 'VARCHAR', 'constraint'=>255],
            'country_id'         => ['type' => 'INT', 'constraint'=>3, 'null'=>TRUE],
            'gender'             => ['type' => 'ENUM("male","female")',  'null'=>TRUE],
            'is_saved'           => ['type' => 'ENUM("yes","no")',  'null'=>TRUE],
            'is_baptised'        => ['type' => 'ENUM("yes","no")',  'null'=>TRUE],
            'marital_status'     => ['type' => 'VARCHAR', 'constraint'=>20, 'null'=>TRUE],
            'created_at'         => ['type' => 'DATETIME'],
            'updated_at'         => ['type' => 'TIMESTAMP'],
        ]);
        $this->forge->addKey('user_id', TRUE);
        $this->forge->addKey('email_address', FALSE,TRUE);
        $this->forge->createTable('ff_users');


        //giving categories
        $this->forge->addField([
            'cat_id'            => ['type' => 'INT', 'constraint'  => 6, 'unsigned' => TRUE, 'auto_increment' => TRUE],
            'church_id'         => ['type' => 'INT', 'constraint'  => 8, 'unsigned' => TRUE],
            'cat_name'          => ['type' => 'VARCHAR', 'constraint'  => 100],
            'cat_code'          => ['type' => 'VARCHAR', 'constraint'  => 50, 'null'=>TRUE], //for sync with grow p1234 or L0293 type, ID
            'cat_desc'          => ['type' => 'TEXT' ],
            'is_enabled'        => ['type' => 'ENUM("yes","no")', 'default'=>'yes'],
            'created_at'        => ['type' => 'DATETIME'],
            'updated_at'        => ['type' => 'TIMESTAMP'],
        ]);
        $this->forge->addKey('cat_id', TRUE);
        $this->forge->addKey('cat_code', FALSE,TRUE);
        $this->forge->createTable('ff_giving_cat');



        //giving records
        $this->forge->addField([
            'txn_id'            => ['type' => 'INT', 'constraint'  => 5, 'unsigned' => TRUE, 'auto_increment' => TRUE],
            'church_id'         => ['type' => 'INT', 'constraint'  => 11, 'unsigned' => TRUE],
            'user_id'           => ['type' => 'INT', 'constraint'  => 11, 'unsigned' => TRUE],
            'payment_date'      => ['type' => 'DATE'],
            'cat_id'            => ['type' => 'INT', 'constraint'=>6, 'unsigned'=> TRUE],
            'payment_mode'      => ['type' => 'ENUM("offline","online")', 'default'=>'online'],
            'currency'          => ['type' => 'VARCHAR', 'constraint'=>3],
            'amount'            => ['type' => 'DOUBLE(12,2)'],
            'reference'         => ['type' => 'VARCHAR','constraint'=>100],
            'description'       => ['type' => 'VARCHAR','constraint'=>100], //str name, purpose
            'citation'          => ['type' => 'VARCHAR', 'constraint'=>255, 'null'=>TRUE],
            'created_at'        => ['type' => 'DATETIME'],
            'updated_at'        => ['type' => 'TIMESTAMP']
        ]);

        $this->forge->addKey('txn_id', TRUE);
        $this->forge->createTable('ff_transactions');


        //hold flutterwave details
        $this->forge->addField([
            'account_id'        => ['type' => 'INT', 'constraint'=> 9, 'unsigned'=>TRUE, 'auto_increment'=>TRUE],
            'customer_id'       => ['type' => 'INT', 'constraint'=> 9],
            'flw_public'        => ['type' => 'VARCHAR', 'constraint'=> 50],
            'flw_secret'        => ['type' => 'VARCHAR', 'constraint'=> 50],
            'created_at'        => ['type' => 'DATETIME'],
            'updated_at'        => ['type' => 'TIMESTAMP']

        ]);
        $this->forge->addKey('account_id', TRUE);
        $this->forge->createTable('ff_flutterwave');


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

    public function down()
    {
        $this->forge->dropTable('ff_customers');
        $this->forge->dropTable('ff_churches');
        $this->forge->dropTable('ff_giving_cat');
        $this->forge->dropTable('ff_flutterwave');
        $this->forge->dropTable('ff_users');
        $this->forge->dropTable('ff_transactions');
        $this->forge->dropTable('ff_services');
    }
}