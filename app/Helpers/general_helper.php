<?php
/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/]=>n(s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}

if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}


/*
 * @make_menu return a set of menu items for nav bar
 * @param $arr array mixed multi-dimensional array for menu items
 * @return $str string
 */
if(!function_exists('make_menu')){
    function make_menu(array $arr): string {
        $str = '';

        foreach ($arr as $key => $val ){
            //is it single item or drop down
            if(is_array($val)) {
                //it is a drop down
                $keys = lang("Front.$key");
                $str .= '<li class="dropdown simple-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">'.$keys.'<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">';

                foreach ($val as $k => $v){
                    $vals = lang("Front.$v");
                    $str .= '<li><a href="'.$v.'">'.$vals.'</a></li>';
                }
                $str .= '</ul></li>';

            } else {

                $vals = lang("Front.$val");

                $str .='<li class="simple-menu"><a href="'.$val.'" role="button">'.$vals.'</a></li>';
            }
        }

        return $str;
    }
}
