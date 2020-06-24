<?php
/**
 * Created by PhpStorm.
 * User: mis
 * Date: 24/06/2020
 * Time: 2:35 PM
 */

namespace app\Libraries;


class Auth_lib
{
    protected $user;

    public function __construct($user_id)
    {
        $this->user = $user_id;

    }

    public function check_username($username){
        $w = ['email_address'=>"'$username'"];
        $q = ask_db('email_address','ff_users',$w);

    }
    public function password_verify($username,$password){

    }

    public function login(){

    }

    public function logout(){

    }

    public function set_user_group($user_id){
        $arr = ['super_admin','client_admin','church_admin','member'];

        return $user_group;
    }

    public function user_menu_items($user_group){

    }
}

