<?php
/**
 * Created by PhpStorm.
 * User: mis
 * Date: 25/06/2020
 * Time: 10:40 AM
 */

namespace App\Controllers;


class Member extends BaseController
{
    public function dashboard(){

        //$_SESSION['logged_in'] = 'yes';


        echo view('partials/header.php',$data);
        echo view('pages/slider.php');

        echo view('pages/home.php');
        echo view('pages/live_service.php');
        echo view('partials/footer.php');
    }

}