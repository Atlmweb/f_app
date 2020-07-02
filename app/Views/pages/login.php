<section class="get-started ptb30">
    <div class="container">
        <div class="row ">

            <!-- Column -->
            <div class="col-md-10 col-sm-9 col-xs-12">
                <h3 class="text-white">Login to share the gospel with others, participate in services, give and be a part of what we are doing </h3>
            </div>

            <!-- Column -->
            <div class="col-md-2 col-sm-3 col-xs-12">
                <a href="#" class="btn btn-blue btn-effect">Sow a seed</a>
            </div>

        </div>
    </div>
</section>
<!-- ===== Start of Login - Register Section ===== -->
<section class="ptb80" id="login">
    <div class="container">
        <div class="col-md-6 col-md-offset-3 col-xs-12">

            <!-- Start of Login Box -->
            <div class="login-box">

                <div class="login-title">
                    <h4>login</h4>
                    <?php echo msg();?>
                </div>

                <!-- Start of Login Form -->
                <form action="login" method="post">
                    <!-- Form Group -->
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Your Email" name="username">
                    </div>

                    <!-- Form Group -->
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Your Password" name="password">
                    </div>

                    <!-- Form Group -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">

                                <input type="checkbox" id="remember-me2">
                                <label for="remember-me2">Remember me?</label>

                            </div>

                            <div class="col-xs-6 text-right">
                                <a href="lost-password.html">Forgot password?</a>
                            </div>
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="form-group text-center">
                        <button class="btn btn-blue btn-effect">Login</button>
                        <a href="register.html" class="btn btn-blue btn-effect">signup</a>
                    </div>

                </form>
                <!-- End of Login Form -->
            </div>
            <!-- End of Login Box -->

        </div>
    </div>
</section>
<!-- ===== End of Login - Register Section ===== -->