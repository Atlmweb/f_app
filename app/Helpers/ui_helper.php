<?php
/**
 * Created by PhpStorm.
 * User: mis
 * Date: 25/06/2020
 * Time: 3:05 PM
 */
if(!function_exists('msg')){
    function msg(){
        if(isset($_SESSION['info'])){
            echo '<p class="text-primary">'.$_SESSION['info'] ?? ''.'</p>';
            unset($_SESSION['info']);
        }
        if(isset($_SESSION['error'])){
            echo '<p class="text-danger">'.$_SESSION['error'] ?? ''.'</p>';
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
            echo '<p class="text-success">'.$_SESSION['success'] ?? ''.'</p>';
            unset($_SESSION['success']);
        }

    }
}



if(!function_exists('youtube')){
    function youtube($video_url){
        return substr($video_url,-11,50);
    }
}

if(!function_exists('comment')){
     function comments($arr)
    {

        $html = '';

        foreach ($arr as $com) {
            $html .= '<li id="'.$com['id'].'" class="message-list">
                            <h5><i class="fa fa-user-circle"></i>' . $com['name'] . '</h5>
                            <p>' . $com['comment'] . '</p>
                            <span class="text-muted text-gray">' . $com['date'] . '</span>
                        </li>';
        }

        return $html;

    }

}