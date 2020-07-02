

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
                        <h2><?=$service_title?></h2>
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
                        <?php echo share('https://live.christembassynungua.org', $service_date.' Will bless you tremendously')?>
                    </ul>
                    <!-- End of Social Media ul -->

                    <ul class="job-overview nopadding mtb20 pre-scrollable" id="message-container">

                    </ul>
                    <ul class="job-overview nopadding mt20">
                        <li>
                            <form action="#" method="post" id="send_comment">
                                <input value="<?=$_SESSION['logged_in']['name'];?>" name="name" type="hidden">
                                <input value="<?=$service_id;?>" name="sid" type="hidden">
                                <textarea id="msg"  name="msg" class="form-control" placeholder="Comment" required></textarea>
                            </form>
                        </li>
                    </ul>

                    <div class="mt20">
                        <a id="btn_send_msg" href="#" class="btn btn-blue btn-effect">Comment</a>
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
        <h4 class="modal-title">Sow a seed</h4>
      </div>
      <div class="modal-body">
         <?php echo $this->include('pages/giving_form')?>
    </div>

  </div>
</div>

    <script type="text/javascript">


        function getMessages(){
            var id = jQuery('.message-list:last-child').attr("id");
            if(!id) id = 0;

            jQuery.get("home/comments/"+id,function(data) {
                if (data) {
                    jQuery("#message-container")
                        .append(data)
                        .animate({
                            scrollTop: jQuery("#message-container").prop("scrollHeight")
                        }, 1000);
                }

                setTimeout(function(){
                    getMessages();
                }, 4000);
            })
        }

        setTimeout(function(){
            getMessages();

            $("#btn_send_msg").on("click",function(e){
                e.preventDefault();

                $.ajax({
                    url: 'home/post_comment',
                    type: 'post',
                    dataType: 'json',
                    data: $('#send_comment').serialize(),
                    success: function(data) {
                        $("#msg").val("")
                    }
                });
            })


        },2000)

    </script>
