<!-- section staff -->
<div class="section padding_layout_1 service_list border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <h2>پرسنل اسمبل سیستم</h2>
                        <p class="large">کارشناسان ما بارها در مطبوعات معرفی شده اند.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $personnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 col-sm-6">
                    <div class="full team_blog_colum">
                        <div class="it_team_img"><img class="img-responsive"
                                                      src="<?php echo e(asset('it-next-assets/images/it_service/team-member-1.jpg')); ?>"
                                                      alt="#"></div>
                        <div class="team_feature_head">
                            <h4><?php echo e($person->fullName); ?></h4>
                        </div>
                        <div class="team_feature_social">
                            <div class="social_icon">
                                <ul class="list-inline">
                                    <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram"
                                           target="_blank"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- end section -->
<?php /**PATH C:\CODEX\techzilla\resources\views/it-city/layouts/components/personnel.blade.php ENDPATH**/ ?>