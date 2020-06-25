<?php
/**
 * Created by PhpStorm.
 * User: mis
 * Date: 25/06/2020
 * Time: 3:05 PM
 */
if(!function_exists('info')){
    function info(){
        if(isset($_SESSION['info'])){
            echo '<span class="text-primary">'.$_SESSION['info'] ?? ''.'</span>';
            unset($_SESSION['info']);
        }

    }
}

if(!function_exists('error')){
    function error(){
        if(isset($_SESSION['error'])){
            echo '<span class="text-danger">'.$_SESSION['error'] ?? ''.'</span>';
            unset($_SESSION['error']);
        }

    }
}

if(!function_exists('success')){
    function success(){
        if(isset($_SESSION['success'])){
            echo '<span class="text-success">'.$_SESSION['error'] ?? ''.'</span>';
            unset($_SESSION['success']);
        }

    }
}