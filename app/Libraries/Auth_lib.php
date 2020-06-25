<?php


class Auth_lib
{

    public function __construct()
    {
        //$this->user = $user_id;

    }

    public function check_username($username){
        $w = ['email_address'=>"'$username'"];
        $q = ask_db('email_address','ff_users',$w);
        return (!empty($q));

    }


    //do a login check, return boolean
    public function verify_password($username,$password){
        $w = ['email_address'=>"'$username'"];
        $q = ask_db('password','ff_users',$w);
        $pass = $q[0]['password'];

        return password_verify($password,$pass);
    }



    public function grant_access($username){
        //add login session to session //client, admin, member,
        $w = ['email_address'=>"'$username'"];
        $q = ask_db('church_id,user_id,access_level,title,first_name,last_name','ff_users',$w)[0];
        $name = $q['title'].' '.$q['first_name'].' '.$q['last_name'];

        $data = [
            'user_id'   => $q['user_id'],
            'level'     => $q['access_level'],
            'email'     => $username,
            'name'      => $name,
            'church_id' => $q['church_id'],
        ];

        $_SESSION['logged_in'] = $data;

        return TRUE;
    }





}

