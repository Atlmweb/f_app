
<section class="blog-masonry ptb10">
    <div class="container">
        <div class="row blog-grid">

            <!-- Start of Blog Post 6 with Youtube Video -->
            <div class="element col-md-12 col-xs-12">
                <article class="blog-single shadow-hover pb10">
                    <!-- Post Thumbnail -->
                    <div class="blog-post-thumbnail video-post">
                        <div class="owl-carousel post-thumbnail-slider">
                            <!-- Slider Item -->
                            <div class="item embed-responsive embed-responsive-16by9">

                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$stream_url??''?>?rel=0" allowfullscreen=""></iframe>
<!--                                <video class="embed-responsive-item" controls autoplay>-->
<!--                                    <source src="https://immout.netromedia.com/Superscreen/nungua/playlist.m3u8" type="video/mp4">-->
<!---->
<!--                                </video>-->
                            </div>

                            <!-- Slider Item -->
                            <div class="item embed-responsive embed-responsive-16by9">

                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/EeRvVOJEa4A?rel=0" allowfullscreen=""></iframe>
                            </div>

                            <!-- Slider Item -->

                            <div class="item embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/gbqMjW_Fr2I?rel=0" allowfullscreen=""></iframe>
                            </div>
                        </div>


                    </div>


                    <!-- Post Detail -->
                    <div class="row mt15" style="margin-left: 2px; margin-right: 2px;">

                        <div class="blog-post-title pt30 pb20 text-center">
                            <h3><a href="#">Share this service with someone </a></h3>
                            <?php echo share('https://live.christembassynungua.org',lang('Front.join_service'));?>
                        </div>

                        <div class="pt40" style="margin-left: 20px; margin-right: 20px;">
                            <h5>Service Notes</h5>

                            <?=$service_notes?>
                        </div>

                    </div>

                </article>


            </div>


        </div>


    </div>
</section>



