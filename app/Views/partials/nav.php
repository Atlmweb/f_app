
<ul class="nav navbar-nav pull-right">

    <!-- Mobile Menu Title -->
    <li class="mobile-title">
        <h4><?php echo lang('Front.main_menu');?></h4></li>

    <!-- Simple Menu Item -->
   <?php echo make_menu($menu_items);?>

    <!-- Login Menu Item -->
    <?php if(!isset($_SESSION['logged_in'])) { ?>
    <li class="menu-item login-btn">
        <a id="modal_trigger" href="javascript:void(0)" role="button" class="disabled"><i class="fa fa-lock"></i>login</a>
    </li>

    <?php }?>

</ul>