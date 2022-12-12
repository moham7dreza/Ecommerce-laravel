<header class="main-header header-style-2 mb-40">
    <div class="header-bottom header-sticky background-white text-center">
        <div class="scroll-progress gradient-bg-1"></div>
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="header-logo d-none d-lg-block">
                        <a href="<?php echo e(route('digital-world.home')); ?>">
                            <img class="logo-img d-inline" src="<?php echo e(asset('news-viral-assets/imgs/logo.svg')); ?>"
                                 alt="<?php echo e($setting->title); ?>">
                        </a>
                    </div>
                    <div class="logo-tablet d-md-inline d-lg-none d-none">
                        <a href="<?php echo e(route('digital-world.home')); ?>">
                            <img class="logo-img d-inline" src="<?php echo e(asset('news-viral-assets/imgs/logo.svg')); ?>"
                                 alt="<?php echo e($setting->title); ?>">
                        </a>
                    </div>
                    <div class="logo-mobile d-block d-md-none">
                        <a href="<?php echo e(route('digital-world.home')); ?>">
                            <img class="logo-img d-inline" src="<?php echo e(asset('news-viral-assets/imgs/favicon.svg')); ?>"
                                 alt="<?php echo e($setting->title); ?>">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 main-header-navigation">
                    <div class="main-nav text-right float-lg-right float-md-left">
                        <ul class="mobi-menu d-none menu-3-columns" id="navigation">
                            <li class="cat-item cat-item-2"><a href="<?php echo e(route('digital-world.home')); ?>">صفحه اصلی</a>
                            </li>
                            <li class="cat-item cat-item-3"><a href="<?php echo e(route('digital-world.posts.all')); ?>">پست ها</a>
                            </li>
                            <li class="cat-item cat-item-4"><a href="<?php echo e(route('digital-world.posts.authors')); ?>">نویسنده
                                    ها</a></li>
                            <?php if(auth()->guard()->check()): ?>
                                <li class="cat-item cat-item-5"><a href="#"><?php echo e(auth()->user()->fullName); ?></a></li>
                                <li class="cat-item cat-item-6"><a href="">خروج</a></li>
                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                                <li class="cat-item cat-item-7"><a href="">ثبت نام</a></li>
                                <li class="cat-item cat-item-2"><a href="">ورود</a></li>
                            <?php endif; ?>
                        </ul>
                        <nav>
                            <ul class="main-menu d-none d-lg-inline">
                                <li>
                                    <a href="<?php echo e(route('digital-world.home')); ?>">
                                        صفحه اصلی
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('digital-world.posts.all')); ?>">
                                        پست ها
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('digital-world.posts.authors')); ?>">
                                        نویسنده ها
                                    </a>
                                </li>
                                <li class="mega-menu-item">
                                    <a href="#">
                                        دسته بندی ها
                                    </a>
                                    <div class="sub-mega-menu sub-menu-list row text-muted font-small">
                                        <?php $__currentLoopData = $categories->chunk(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <ul class="col-md-2">
                                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="<?php echo e($category->path()); ?>"><?php echo e($category->name); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </li>
                                
                                
                                
                                <?php if(auth()->guard()->check()): ?>
                                    <li>
                                        <a href="">
                                            <span class="ml-15">
                                                <ion-icon name="mail-unread-outline"></ion-icon>
                                            </span>
                                            پروفایل
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('digital-world.user.favorites')); ?>">
                                            علاقه مندی
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="ml-15">
                                                <ion-icon name="mail-unread-outline"></ion-icon>
                                            </span>
                                            لاگ اوت
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->guard()->guest()): ?>
                                    <li>
                                        <a href="">
                                            <span class="ml-15">
                                                <ion-icon name="mail-unread-outline"></ion-icon>
                                            </span>
                                            ثبت نام
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="ml-15">
                                                <ion-icon name="mail-unread-outline"></ion-icon>
                                            </span>
                                            ورود
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <form action="#" method="get"
                          class="search-form d-lg-inline float-left position-relative ml-30 d-none">
                        <input type="text" class="search_field" placeholder="جستجو ..." value="" name="s">
                        <span class="search-icon"><i class="ti-search mr-5"></i></span>
                    </form>
                    <div class="off-canvas-toggle-cover">
                        <div class="off-canvas-toggle hidden d-inline-block mr-15" id="off-canvas-toggle">
                            <ion-icon name="grid-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/layouts/header.blade.php ENDPATH**/ ?>