<section class="get-started ptb30">
    <div class="container">
        <div class="row ">

            <!-- Column -->
            <div class="col-md-10 col-sm-9 col-xs-12">
                <h3 class="text-white">In the morning sow thy seed, and in the evening withhold not thine hand: for thou knowest not whether shall prosper, either this or that, or whether they both shall be alike good. Ecc 6:11</h3>
            </div>

            <!-- Column -->
            <div class="col-md-2 col-sm-3 col-xs-12">
                <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-blue btn-effect pull-right mt15"><i class="fa fa-pagelines"></i>SOW A SEED</a>
            </div>

        </div>
    </div>
</section>
<!-- ===== Start of Pricing Tables Section ===== -->
<section class="pricing-tables pb80">
    <div class="container">

        <!-- Start Row -->
        <div class="row">


            <!-- Start of 1st Pricing Table -->
            <div class="col-md-6 col-xs-12 mt80">
                <div class="pricing-table shadow-hover" id="popular">

                    <!-- Pricing Header -->
                    <div class="pricing-header">
                        <h2>Seeds this month</h2>
                    </div>

                    <!-- Pricing -->
                    <div class="pricing">
                        <span class="currency">GHS</span>
                        <span class="amount"><?=$total_m?></span>
                        <span class="month">month</span>
                    </div>

                    <!-- Pricing Body -->
                    <div class="pricing-body">
                        <ul class="list">

                            <?php
                            if(!empty($summary_m)){
                                foreach ($summary_m as $key => $val){
                                    echo "<li>{$val['cat_name']} <span class=\"pull - right\">{$val['currency']} {$val['tot']}</span></li><hr/></li>";
                                }
                            }

                            ?>


                        </ul>
                    </div>



                </div>
            </div>
            <!-- End of 1st Pricing Table -->


            <!-- Start of 2nd Pricing Table -->
            <div class="col-md-6 col-xs-12 mt80">
                <div class="pricing-table shadow-hover">

                    <!-- Pricing Header -->
                    <div class="pricing-header">
                        <h2>Year summary </h2>
                    </div>

                    <!-- Pricing -->
                    <div class="pricing">
                        <span class="currency">GHS</span>
                        <span class="amount"><?=$total_y?></span>
                        <span class="month">year</span>
                    </div>

                    <!-- Pricing Body -->
                    <div class="pricing-body">
                        <ul class="list">
                            <?php
                            if(!empty($summary_y)){
                                foreach ($summary_y as $key => $val){
                                    echo "<li>{$val['cat_name']} <span class=\"pull-right\">{$val['currency']} {$val['tot']}</span></li><hr/>";
                                }
                            }

                            ?>
                        </ul>
                    </div>



                </div>
            </div>
            <!-- End of 2nd Pricing Table -->


            <div class="col-md-12 col-xs-12 mt80">
                <div class="pricing-table shadow-hover">

                    <!-- Pricing Header -->
                    <div class="pricing-header">
                        <h2>All time giving (Prior to 28th June 2020)</h2>
                    </div>

                    <!-- Pricing -->
                    <div class="pricing">

                        <h3>Records  be made available soon</h3>

                    </div>

                    <!-- Pricing Body -->
                    <div class="pricing-body">
                        <ul class="list">
                           <h5><?php echo $table;?></h5>
                        </ul>

                    </div>



                </div>


            </div>

            <!-- End of 3rd Pricing Table -->

        </div>
        <!-- End Row -->

    </div>
</section>
<!-- ===== End of Pricing Tables Section ===== -->

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sow a seed</h4>
            </div>
            <div class="modal-body">
                <?php echo $this->include('pages/giving_form')?>
            </div>

        </div>
    </div>
