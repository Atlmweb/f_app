

<!-- =============== Start of Footer 1 =============== -->
<footer class="footer1">

    <!-- ===== Start of Footer Information & Links Section ===== -->

    <!-- ===== End of Footer Information & Links Section ===== -->


    <!-- ===== Start of Footer Copyright Section ===== -->
    <div class="copyright ptb40">
        <div class="container">

            <div class="col-md-6 col-sm-6 col-xs-12">
                <span>Copyright &copy; <?php echo date('Y');?><a href="#"> Christ Embassy, Online</a>. All Rights Reserved. Powered by <i class="fa fa-plane"></i> FIRST FLIGHT FRAMEWORK </span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <!-- Start of Social Media Buttons -->
                <ul class="social-btns list-inline text-right">
                    <!-- Social Media -->
                    <li>
                        <a href="https://facebook.com/cenungua" class="social-btn-roll facebook">
                            <div class="social-btn-roll-icons">
                                <i class="social-btn-roll-icon fa fa-facebook"></i>
                                <i class="social-btn-roll-icon fa fa-facebook"></i>
                            </div>
                        </a>
                    </li>

                    <!-- Social Media -->
                    <li>
                        <a href="https://twitter.com/ce_nungua" class="social-btn-roll twitter">
                            <div class="social-btn-roll-icons">
                                <i class="social-btn-roll-icon fa fa-twitter"></i>
                                <i class="social-btn-roll-icon fa fa-twitter"></i>
                            </div>
                        </a>
                    </li>

                    <!-- Social Media -->
                    <li>
                        <a href="https://youtube.com/channel/UCDGx8oCOPs5xRW-XhhR-k7A" class="social-btn-roll youtube">
                            <div class="social-btn-roll-icons">
                                <i class="social-btn-roll-icon fa fa-youtube"></i>
                                <i class="social-btn-roll-icon fa fa-youtube"></i>
                            </div>
                        </a>
                    </li>

                    <!-- Social Media -->
                    <li>
                        <a href="https://www.instagram.com/cenungua/" class="social-btn-roll instagram">
                            <div class="social-btn-roll-icons">
                                <i class="social-btn-roll-icon fa fa-instagram"></i>
                                <i class="social-btn-roll-icon fa fa-instagram"></i>
                            </div>
                        </a>
                    </li>



                </ul>
                <!-- End of Social Media Buttons -->
            </div>

        </div>
    </div>
    <!-- ===== End of Footer Copyright Section ===== -->

</footer>
<!-- =============== End of Footer 1 =============== -->





<!-- ===== Start of Back to Top Button ===== -->
<a href="#" class="back-top"><i class="fa fa-chevron-up"></i></a>
<!-- ===== End of Back to Top Button ===== -->





<!-- ===== Start of Login Pop Up div ===== -->
<div class="cd-user-modal">
    <!-- this is the entire modal form, including the background -->
    <div class="cd-user-modal-container">
        <!-- this is the container wrapper -->
        <ul class="cd-switcher">
            <li><a href="#0"><?php echo lang('Front.sign_in');?></a></li>
            <li><a href="#1"><?php echo lang('Front.new_account');?></a></li>

        </ul>

        <div id="cd-login">
            <!-- log in form -->
            <form class="cd-form" method="post" action="login">
                <p class="text-danger">If you had an account on this site before 28th June 2020, you will have to create a new account with the same email address</p>
                <p class="fieldset">
                    <label class="image-replace cd-email" for="signin-email"><?php echo lang('Front.email');?></label>
                    <input name="username" class="full-width has-padding has-border" id="signin-email" type="email" placeholder="<?php echo lang('Front.email');?>" required>
                </p>
                <p class="fieldset">
                    <label class="image-replace cd-password" for="signin-password"><?php echo lang('Front.password');?></label>
                    <input name="password" class="full-width has-padding has-border" id="signin-password" type="password" placeholder="<?php echo lang('Front.password');?>" required>
                </p>
                <p class="fieldset">
                    <input type="checkbox" id="remember-me" checked>
                    <label for="remember-me"><?php echo lang('Front.remember');?></label>
                </p>


                <div class="login-btn">
                    <button type="submit" value="Login" class="btn btn-blue btn-effect" style="background-color: dodgerblue"><?php echo lang('Front.login');?></button>
                </div>
            </form>
        </div>
        <!-- cd-login -->

        <div id="cd-signup">
            <!-- sign up form -->


                <?php echo form_open('register',['method'=>'post','class'=>'cd-form']);?>

                <?php msg()//TODO make church id read from config file?>

                <p class="fieldset">

                    <select name="title" class="selectpicker bootstrap-select table-bordered" required>

                        <option value=""><?php echo lang('Front.select');?></option>
                        <option value="brother">Brother</option>
                        <option value="sister">Sister</option>
                        <option value="pastor">Pastor</option>
                        <option value="deaconess">Deaconess</option>
                        <option value="deacon">Deacon</option>
                        <option value="saint">Saint</option>
                    </select>
                </p>

                <p class="fieldset">
                    <input type="hidden" name="church_id" value="237">
                    <input type="hidden" name="customer_id" value="1">


                </p>
                    <label class="image-replace cd-username">Surname</label>
                    <input class="full-width has-padding has-border" type="text" name="last_name" placeholder="Surname" autocomplete="off" required>

                </p>

                <p class="fieldset">
                    <label class="image-replace cd-username">First Name</label>
                    <input class="full-width has-padding has-border" type="text" name="first_name" placeholder="First Name" autocomplete="off" required>

                </p>
                <p class="fieldset">
                    <label class="image-replace cd-email" for="signup-email">E-mail</label>
                    <input name="email_address" class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail" required>
                </p>

                  <p class="fieldset">
                <label class="image-replace cd-email" for="signup-email">Phone number</label>
                <input name="phone_number" class="full-width has-padding has-border" id="signup-email" type="tel" placeholder="Phone number" required>
                 </p>
                <p class="fieldset">
                    <label class="image-replace cd-password" for="signup-password">Password</label>
                    <input name="password" class="full-width has-padding has-border" id="signup-password" type="password" placeholder="Password">
                </p>
                <p class="fieldset">
                    <input type="checkbox" id="accept-terms" name="accept_terms" required>
                    <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
                </p>
                <p class="fieldset">
                    <button class="btn btn-blue btn-effect" type="submit" value="Create account" style="background-color: dodgerblue" >Create Account</button>
                </p>
            </form>
        </div>
        <!-- cd-signup -->
    </div>
    <!-- cd-user-modal-container -->
</div>
<!-- cd-user-modal -->
<!-- ===== End of Login Pop Up div ===== -->





<!-- ===== All Javascript at the bottom of the page for faster page loading ===== -->
<script src="<?=base_url()?>/js/jquery-3.1.1.min.js"></script>
<script src="<?=base_url()?>/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>/js/bootstrap-select.min.js"></script>
<script src="<?=base_url()?>/js/swiper.min.js"></script>
<script src="<?=base_url()?>/js/jquery.ajaxchimp.js"></script>
<script src="<?=base_url()?>/js/jquery.countTo.js"></script>
<script src="<?=base_url()?>/js/jquery.inview.min.js"></script>
<script src="<?=base_url()?>/js/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>/js/jquery.easypiechart.min.js"></script>
<script src="<?=base_url()?>/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>/js/owl.carousel.min.js"></script>
<script src="<?=base_url()?>/js/tinymce/tinymce.min.js"></script>
<script src="<?=base_url()?>/js/countdown.js"></script>
<script src="<?=base_url()?>/js/isotope.min.js"></script>
<script src="<?=base_url()?>/js/custom.js"></script>
<script src="<?=base_url()?>/bsdp/js/bootstrap-datepicker.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.15/api/row().show().js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>


<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
</body>

</html>











