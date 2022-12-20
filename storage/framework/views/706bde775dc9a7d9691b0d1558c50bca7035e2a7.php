<!-- header -->
<header id="default_header" class="header_style_1">
    <!-- header top -->
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="full">
                        <div class="topbar-left">
                            <ul class="list-inline">
                                <li><span
                                        class="topbar-hightlight"><?php echo e(json_decode($settings->address, true)['addresses']['central_office']); ?></span>
                                    <span
                                        class="topbar-label"><i
                                            class="fa  fa-home"></i></span></li>
                                <li><span class="topbar-hightlight"><a
                                            href="mailto:<?php echo e(json_decode($settings->email, true)['office_mail']); ?>"> <?php echo e(json_decode($settings->email, true)['office_mail']); ?> </a></span>
                                    <span class="topbar-label"><i class="fa fa-envelope-o"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 right_section_header_top">
                    <div class="float-left">
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
                                <li><a class="fa fa-instagram"
                                       href="<?php echo e(json_decode($settings->social_media, true)['instagram']); ?>"
                                       title="Instagram"
                                       target="_blank"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="make_appo"><a class="btn white_btn"
                                                  href="<?php echo e(route('it-city.pages.make-appointment')); ?>">قرار ملاقات
                                بزار</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header top -->
    <!-- header bottom -->
    <div class="header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <!-- logo start -->
                    <div class="logo"><a href="<?php echo e(route('it-city.home')); ?>"><img
                                src="<?php echo e(asset($settings->logo)); ?>" alt="logo"/></a></div>
                    <!-- logo end -->
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <!-- menu start -->
                    <div class="menu_side">
                        <div id="navbar_menu">
                            <ul class="first-ul">
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(urldecode($menu->url)); ?>"><?php echo e($menu->name); ?></a>
                                        <?php if(count($menu->children) > 0): ?>
                                            <ul class="text-center">
                                                <?php $__currentLoopData = $menu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($subMenu->status == 1): ?>
                                                        <li>
                                                            <a href="<?php echo e(urldecode($subMenu->url)); ?>"><?php echo e($subMenu->name); ?></a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="active" href="<?php echo e(route('it-city.home')); ?>">خانه</a>
                                    <ul class="text-right">
                                        <li><a href="<?php echo e(route('customer.home')); ?>">فروشگاه</a></li>
                                        <li><a href="<?php echo e(route('digital-world.home')); ?>">دنیای دیجیتالی</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo e(route('panel.home')); ?>">پنل</a></li>
                                <li><a href="#">تک صفحه</a>
                                    <ul class="text-right">
                                        <li><a href="<?php echo e(route('single-pages.letter')); ?>">ایمیل</a></li>
                                        <li><a href="<?php echo e(route('single-pages.ultra-profile')); ?>">پروفایل</a></li>
                                        <li><a href="<?php echo e(route('single-pages.motion')); ?>">استرو</a></li>
                                        <li><a href="<?php echo e(route('single-pages.app')); ?>">اپ موبایل</a></li>
                                        <li><a href="<?php echo e(route('single-pages.hydrogen')); ?>">هیدروژن</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">استور</a>
                                    <ul class="text-right">
                                        <li><a href="<?php echo e(route('it-city.store.special-sale')); ?>">فروش ویژه</a></li>
                                        <li><a href="#">محصولات</a>
                                            <ul class="text-right">
                                                <li><a href="it_career.html">سیستم های گیمینگ</a></li>
                                                <li><a href="it_price.html">اداری</a></li>
                                                <li><a href="it_faq.html">رندرینگ</a></li>
                                                <li><a href="it_privacy_policy.html">اقتصادی</a></li>
                                                <li><a href="it_error.html">تریدینگ</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="#">بلاگ</a>
                                    <ul class="text-right">
                                        <li><a href="<?php echo e(route('it-city.blog.index')); ?>">بلاگ</a></li>
                                        <li><a href="<?php echo e(route('it-city.blog.news')); ?>">اخبار</a></li>
                                    </ul>
                                </li>

                                <li><a onclick="dark()" type="button"><i
                                            class="fa fa-moon-o fa-sm mr-2"></i>حالت شب
                                    </a></li>
                                <li><a href="#">صفحات سایت</a>
                                    <ul class="text-right">
                                        <li><a href="<?php echo e(route('it-city.pages.about-us')); ?>">درباره ما</a></li>
                                        <li><a href="<?php echo e(route('it-city.pages.why-this-shop')); ?>">چرا این شاپ</a></li>
                                        <li><a href="<?php echo e(route('it-city.pages.warranty-rules')); ?>">شرایط گارانتی</a></li>
                                        <li><a href="<?php echo e(route('it-city.pages.installment')); ?>">خرید اقساطی</a></li>
                                        <li><a href="<?php echo e(route('it-city.pages.contact-us')); ?>">تماس با ما</a></li>
                                        <li><a href="<?php echo e(route('it-city.pages.faq')); ?>">سوالات متداول</a></li>
                                        <li><a href="<?php echo e(route('it-city.pages.price')); ?>">پلن قیمت گذاری</a></li>
                                        <li><a href="<?php echo e(route('it-city.pages.career')); ?>">پرسنل</a></li>
                                        <li><a href="<?php echo e(route('it-city.pages.privacy-policy')); ?>">سیاست های حریم
                                                خصوصی</a></li>
                                        <li><a href="<?php echo e(route('it-city.pages.make-appointment')); ?>">ثبت قرار ملاقات</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">سرویس ها</a>
                                    <ul class="text-right">
                                        <li><a href="<?php echo e(route('it-city.service.index')); ?>">سرویس های اصلی</a></li>
                                        <li><a href="<?php echo e(route('it-city.service.all-services')); ?>">همه ی سرویس ها</a>
                                        </li>
                                    </ul>
                                </li>

                                
                                
                                
                                
                                
                                
                                

                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            </ul>
                        </div>
                        <div class="search_icon">
                            <ul>
                                <li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search"
                                                                                                 aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
    <!-- header bottom end -->
</header>
<!-- end header -->
<?php /**PATH C:\CODEX\techzilla\resources\views/it-city/layouts/header.blade.php ENDPATH**/ ?>