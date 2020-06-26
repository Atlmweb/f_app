

<section class="job-header ptb20">
    <div class="container">

        <!-- Start of Row -->
        <div class="row">

            <div class="col-md-6 col-xs-12">
                <h3><?=$title ?? '';?></h3>
                <a href="#" class="btn btn-green btn-small btn-effect mt15">Member</a>
            </div>

            
            <div class="col-md-6 col-xs-12 clearfix">
                <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-blue btn-effect pull-right mt15"><i class="fa fa-pagelines"></i>SOW A SEED</a>
            </div>


        </div>
        <!-- End of Row -->

    </div>
</section>


<section class="ptb80" id="job-page">
    <div class="container">


        <div class="row">

            <!-- ===== Start of Job Details ===== -->
            <div class="col-md-8 col-xs-12">

                <!-- Start of Company Info -->
                <div class="row company-info">

                    <!-- Job Company Image -->
                    <div class="col-md-12">
                        <h1><?=$service_title?></h1>
                        <h4><?=$service_date?></h4>
                    </div>



                </div>
                <!-- End of Company Info -->


                <!-- Start of Job Details -->
                <div class="row job-details mt40">
                    <div class="col-md-12">



                        <!-- Vimeo Video -->
                        <div class="blog-post-thumbnail video-post">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$stream_url?>?rel=0" allowfullscreen=""></iframe>
                            </div>
                        </div>

                        <!-- Div wrapper -->
                        <div class="pt40">
                            <h5>Service Notes</h5>

                            <?=$service_notes?>
                        </div>

                    </div>
                </div>
                <!-- End of Job Details -->

            </div>
            <!-- ===== End of Job Details ===== -->





            <!-- ===== Start of Job Sidebar ===== -->
            <div  class="col-md-4 col-xs-12 ">

                <!-- Start of Job Sidebar -->
                <div class="job-sidebar" >

                    <h4 class="uppercase">Share this Service</h4>

                    <!-- Start of Social Media ul -->
                    <ul class="social-btns list-inline mt20">
                        <!-- Social Media -->
                        <li>
                            <a href="#" class="social-btn-roll facebook transparent">
                                <div class="social-btn-roll-icons">
                                    <i class="social-btn-roll-icon fa fa-facebook"></i>
                                    <i class="social-btn-roll-icon fa fa-facebook"></i>
                                </div>
                            </a>
                        </li>

                        <!-- Social Media -->
                        <li>
                            <a href="#" class="social-btn-roll twitter transparent">
                                <div class="social-btn-roll-icons">
                                    <i class="social-btn-roll-icon fa fa-twitter"></i>
                                    <i class="social-btn-roll-icon fa fa-twitter"></i>
                                </div>
                            </a>
                        </li>

                        <!-- Social Media -->
                        <li>
                            <a href="#" class="social-btn-roll whatsapp transparent">
                                <div class="social-btn-roll-icons">
                                    <i class="social-btn-roll-icon fa fa-whatsapp"></i>
                                    <i class="social-btn-roll-icon fa fa-whatsapp"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- End of Social Media ul -->



                    <ul class="job-overview nopadding mt40 pre-scrollable">
                        <li>
                            <h5><i class="fa fa-user-circle"></i> Brother Samuel:</h5>
                            <p>Glory be to God, i just received my healing</p>
                            <span class="text-muted text-gray">Posted 1 year ago</span>
                        </li>


                        <li>
                            <h5><i class="fa fa-user-circle"></i>Sister Faustina:</h5>
                            <p>Glory be to God, i am moving forward in every area of my life</p>
                            <span class="text-muted text-gray">Posted 1 hour ago</span>
                        </li>

                        <li>
                            <h5><i class="fa fa-user-circle"></i>Sister Faustina:</h5>
                            <p>Glory be to God, i am moving forward in every area of my life</p>
                            <span class="text-muted text-gray">Posted 1 hour ago</span>
                        </li>

                        <li>
                            <h5><i class="fa fa-user-circle"></i>Sister Faustina:</h5>
                            <p>Glory be to God, i am moving forward in every area of my life</p>
                            <span class="text-muted text-gray">Posted 1 hour ago</span>
                        </li>





                    </ul>
                    <ul class="job-overview nopadding mt40>
                        <li>
                            <form action="changeme" method="post">
                                <textarea class="form-control" placeholder="Comment"></textarea>
                            </form>
                        </li>
                    </ul>

                    <div class="mt20">
                        <a href="#" class="btn btn-blue btn-effect">Comment</a>
                    </div>

                </div>
                <!-- Start of Job Sidebar -->



            </div>
            <!-- ===== End of Job Sidebar ===== -->

        </div>
    </div>
</section>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
