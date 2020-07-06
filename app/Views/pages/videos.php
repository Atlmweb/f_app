<section class="get-started ptb30">
    <div class="container">
        <div class="row ">

            <!-- Column -->
            <div class="col-md-10 col-sm-9 col-xs-12">
                <h3 class="text-white">Watch Videos on our channel</h3>
            </div>

            <!-- Column -->
            <div class="col-md-2 col-sm-3 col-xs-12">
                <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-blue btn-effect pull-right mt15"><i class="fa fa-pagelines"></i>SOW A SEED</a>
            </div>

        </div>
    </div>
</section>






<section class="blog-masonry ptb80">
    <div class="container">
        <div class="row blog-grid">

            <?php if (!empty($services)) { foreach($services as $val): ?>
            <!-- Start of Blog Post 6 with Youtube Video -->
            <div class="element col-md-3 col-xs-12">


                    <article class="blog-single shadow-hover pb30">
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail video-post">
                            <div class="embed-responsive embed-responsive-16by9">

                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=youtube($val['stream_url']) ??'EeRvVOJEa4A'?>?rel=0" allowfullscreen></iframe>
                            </div>
                        </div>

                        <!-- Post Detail -->
                        <div class="blog-post-title pt30 pb10">
                            <h3><a href="#"><?=$val['title']?? 'Partner with us'?></a></h3>
                            <p class="nomargin pt5"><span class="blog-date"><?=nice_date($val['service_date']) ?? date('Y-m-d')?></span></p>
                        </div>
                        <div class="blog-post-details pt20">
                            <p class="nomargin pb20"><?=$val['summary'] ?? ''?>...</p>
<!--                            <a class="btn btn-blue btn-small btn-effect" href="videos/--><?//=$val['service_id']?? ''?><!--">Watch</a>-->
                        </div>
                    </article>




            </div>
            <?php  endforeach; } ?>

        </div>
        <!-- End of Row -->

        <!-- Start of Show More Button -->
<!--        <div class="row">-->
<!--            <div class="col-md-12 text-center">-->
<!--                <a href="#" class="btn btn-purple btn-effect">show more</a>-->
<!--            </div>-->
<!--        </div>-->
        <!-- End of Show More Button -->

    </div>
</section>













<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sow a seed</h4>
            </div>
            <div class="modal-body">
                <?php echo $this->include('pages/giving_form_guest')?>
            </div>

        </div>
    </div>