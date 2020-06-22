<?php

?>

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
            <li><a href="#0">Sign in</a></li>
            <li><a href="#1">New account</a></li>

        </ul>

        <div id="cd-login">
            <!-- log in form -->
            <form class="cd-form">
                <p class="fieldset">
                    <label class="image-replace cd-email" for="signin-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
                </p>
                <p class="fieldset">
                    <label class="image-replace cd-password" for="signin-password">Password</label>
                    <input class="full-width has-padding has-border" id="signin-password" type="password" placeholder="Password">
                </p>
                <p class="fieldset">
                    <input type="checkbox" id="remember-me" checked>
                    <label for="remember-me">Remember me</label>
                </p>


                <div class="login-btn">
                    <button type="submit" value="Login" class="btn btn-blue btn-effect disabled" style="background-color: dodgerblue">Login</button>
                </div>
            </form>
        </div>
        <!-- cd-login -->

        <div id="cd-signup">
            <!-- sign up form -->
            <form class="cd-form">

                <p class="fieldset">

                    <select name="currency" class="selectpicker bootstrap-select table-bordered" required>
                        <option value="">Select title</option>
                        <option value="brother">Brother</option>
                        <option value="brother">Brother</option>
                        <option value="sister">Sister</option>
                        <option value="pastor">Pastor</option>
                        <option value="deaconess">Deaconess</option>
                        <option value="deacon">Deacon</option>
                        <option value="saint">Saint</option>
                    </select>
                </p>

                <p class="fieldset">
                    <label class="image-replace cd-username">Surname</label>
                    <input class="full-width has-padding has-border" type="text" name="surname" placeholder="Surname" autocomplete="off">

                </p>

                <p class="fieldset">
                    <label class="image-replace cd-username">Other Names</label>
                    <input class="full-width has-padding has-border" type="text" name="name" placeholder="Other Names" autocomplete="off">

                </p>
                <p class="fieldset">
                    <label class="image-replace cd-email" for="signup-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
                </p>
                <p class="fieldset">
                    <label class="image-replace cd-password" for="signup-password">Password</label>
                    <input class="full-width has-padding has-border" id="signup-password" type="password" placeholder="Password">
                </p>
                <p class="fieldset">
                    <input type="checkbox" id="accept-terms">
                    <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
                </p>
                <p class="fieldset">
                    <button class="btn btn-blue btn-effect" type="submit" value="Create account" style="background-color: dodgerblue" disabled>Create Account</button>
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
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/jquery.ajaxchimp.js"></script>
<script src="js/jquery.countTo.js"></script>
<script src="js/jquery.inview.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.easypiechart.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/countdown.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/custom.js"></script>

</body>

</html>
