<?php
//home, about
$menu = [];

function simple_menu($arr) : string {
    $str = '';

    foreach ($arr as $key => $val ){
        $str .= '<li class="simple-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">home</a></li>';
    }

    return $str;
}

?>


<ul class="nav navbar-nav pull-right">

    <!-- Mobile Menu Title -->
    <li class="mobile-title">
        <h4>main menu</h4></li>

    <!-- Simple Menu Item -->
    <li class="simple-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">home</a>

    </li>

    <!-- Simple Menu Item -->
    <li class="dropdown simple-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Jesus</a>

    </li>


    <!-- Simple Menu Item -->
    <li class="dropdown simple-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Events</a>

    </li>

    <!-- Simple Menu Item -->
    <li class="dropdown simple-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Plant a seed</a>

    </li>




    <!-- Login Menu Item -->
    <li class="menu-item login-btn">
        <a id="modal_trigger" href="javascript:void(0)" role="button" class="disabled"><i class="fa fa-lock"></i>login</a>
    </li>

</ul>