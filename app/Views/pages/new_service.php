<?php
if (isset($record)){
    $data = $record;
} else {
    $data = empty_field_values('ff_services');
    //defaults only
    $data['service_date'] = date('Y-m-d');
}




?>
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

<!-- ===== Start of Main Wrapper Section ===== -->
<section class="ptb80" id="post-job">
    <div class="container">

        <h3 class="uppercase text-blue">Create a church service</h3>



        <!-- Start of Account Question -->
        <div class="row account-question">
            <div class="col-md-10 nopadding">
                <p class="nomargin">The service you are about to create will be displayed on the home page and videos page, sorted by the date in descending order.</p>
            </div>

            <div class="col-md-2 text-right nopadding">
                <a href="service_list" class="btn btn-blue btn-effect mt5">All Services</a>
            </div>
        </div>
        <!-- End of Account Question -->




        <!-- Start of Post Job Form -->
        <?php echo form_open('new_service',['method'=>'post', 'class'=>'post-job-resume mt50']);?>
<!--        <form action="new_service" method="post" class="post-job-resume mt50">-->

            <!-- Start of Job Details -->
            <div class="row">

                <div class="col-md-8">

                    <!-- Form Group -->
                    <div class="form-group">
                        <input type="hidden" id="church_id" name="church_id" value="237">
                        <input type="hidden" id="service_id" name="service_id" value="<?= $data['service_id']?>">
                        <label>Service date</label>
                        <input name="service_date" value="<?= $data['service_date']?>" class="form-control date" data-provide="datepicker" data-date-format="yyyy-mm-dd" type="text" required>
                    </div>

                    <!-- Form Group -->
                    <div class="form-group">
                        <label>Service title</label>
                        <input name="service_title" class="form-control" type="text" required value="<?= $data['service_title']?>">
                    </div>


                    <!-- Form Group -->
                    <div class="form-group">
                        <label>Stream platform</label>
                        <select name="stream_platform" class="selectpicker" data-size="5" data-container="body" required>

                            <option value="<?php echo $data['stream_platform']?>"> <?= $data['stream_platform']?> </option>
                            <option value="youtube">Youtube</option>
                            <option value="imm">IMM</option>
                            <option value="vimeo">Vimeo</option>
                            <option value="facebook">Facebook</option>

                        </select>
                    </div>

                    <!-- Form Group -->
                    <div class="form-group">
                        <label>Stream URL</span></label>
                        <input name="stream_url" value="<?= $data['stream_url']?>" class="form-control" type="url" placeholder='https://www.youtube.com/embed/gbqMjW_Fr2I?rel=0' required>
                    </div>


                    <!-- Form Group -->
                    <div class="form-group">
                        <label>Video URL</span></label>
                        <input name="video_url" value="<?= $data['video_url']?>" class="form-control" type="url" placeholder='https://www.youtube.com/embed/gbqMjW_Fr2I?rel=0'>
                    </div>

                    <!-- Form Group -->
                    <!-- Form Group -->
                    <div class="form-group">
                        <label>Video platform</label>
                        <select name="video_platform" class="selectpicker" data-size="5" data-container="body">
                            <option value="<?php echo $data['video_platform']?>"> <?= $data['video_platform']?> </option>
                            <option value="youtube">Youtube</option>
                            <option value="imm">IMM</option>
                            <option value="vimeo">Vimeo</option>
                            <option value="facebook">Facebook</option>

                        </select>
                    </div>



                    <!-- Form Group -->
                    <div class="form-group">
                        <label>Service notes</span></label>
                        <textarea name="service_notes" class="tinymce"><?= $data['service_notes']?></textarea>
                    </div>

                    <!-- Form Group -->
                    <div class="form-group">
                        <label>Visibility</label>
                        <select name="visibility" class="selectpicker" data-size="5" data-container="body" required>
                            <option value="<?php echo $data['visibility']?>"> <?= $data['visibility']?> </option>
                            <option value="public">Public</option>
                            <option value="members">Members</option>

                        </select>
                    </div>



                    <div class="form-group pt30 nomargin" id="last">
                        <button class="btn btn-blue btn-effect">submit</button>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="pt5">
                        <p class="nomargin">The service will be immediately available when you save it.</p>
                    </div>

                </div>
            </div>
            <!-- End of Job Details -->




        </form>
        <!-- End of Post Job Form -->

    </div>
</section>
<!-- ===== End of Main Wrapper Section ===== -->