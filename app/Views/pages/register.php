<section class="get-started ptb30">
    <div class="container">
        <div class="row ">

            <!-- Column -->
            <div class="col-md-10 col-sm-9 col-xs-12">
                <h3 class="text-white">Register to be a part of our family, join a group, attend foundation school and be notified whenever we are live </h3>
            </div>

            <!-- Column -->
            <div class="col-md-2 col-sm-3 col-xs-12">
                <a href="#" class="btn btn-blue btn-effect">Learn more</a>
            </div>

        </div>
    </div>
</section>

    <!-- ===== Start of Login - Register Section ===== -->
    <section class="ptb80" id="register">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Start of Nav Tabs -->
                    <ul class="nav nav-tabs" role="tablist">

                        <!-- Personal Account Tab -->
                        <li role="presentation" class="active">
                            <a href="#personal" aria-controls="personal" role="tab" data-toggle="tab" aria-expanded="true">
                                <h6>Personal Account</h6>
                                <span>If you had an account on this site before 28th June 2020, you will have to create a new account with that same email address</span>
                            </a>
                        </li>


                    </ul>
                    <!-- End of Nav Tabs -->



                    <!-- Start of Tab Content -->
                    <div class="tab-content ptb60">

                        <!-- Start of Tabpanel for Personal Account -->
                        <div role="tabpanel" class="tab-pane active" id="personal">
                            <div id="cd-signusp">
                                <!-- sign up form -->


                                <?php echo form_open('register',['method'=>'post','class'=>'cd-form']);?>

                                <?php msg()//TODO make church id read from config file?>

                                <p class="fieldset">

                                    <select name="title" class="selectpicker bootstrap-select table-bordered" required>

                                        <option value="">Select Title</option>
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
                        </div>
                        <!-- End of Tabpanel for Personal Account -->



                    </div>
                    <!-- End of Tab Content -->

                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Login - Register Section ===== -->




