<?php $__env->startSection('head-tag'); ?>
    <title>
        سیستم اسمبل هوشمند
    </title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- start carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo e(asset('lion-ezpc-images/banner/main-banner.png')); ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end carousel -->


    <div class="album py-5 bg-light">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center">سیستم اسمبل هوشمند</h1>
                <p class="lead text-center text-danger">لطفا متناسب با کاربری دسته بندی موردنطرتون رو انتخاب کنید.</p>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">

            <!-- start breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item font-size-12"><a href="#"
                                                                class="text-decoration-none text-dark">فروشگاه</a></li>
                    <li class="breadcrumb-item font-size-12"><a href="#" class="text-decoration-none text-dark">سیستم
                            اسمبل هوشمند</a></li>
                    <li class="breadcrumb-item font-size-12 active" aria-current="page"> دسته بندی سیستم ها</li>
                </ol>
            </nav>
            <!-- end breadcrumb -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

                <?php $__currentLoopData = $systemCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $systemCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <a class="text-decoration-none text-dark"
                               href="<?php echo e(route('smart.assemble.types', $systemCategory)); ?>">
                                
                                
                                
                                

                                
                                
                                <img src="<?php echo e(asset($systemCategory->image['indexArray']['medium'])); ?>"
                                     class="bd-placeholder-img card-img-top" alt="...">
                                <div class="card-body w-100">
                                    <h5 class="card-title"><?php echo e($systemCategory->name); ?></h5>
                                    <p class="card-text"><?php echo e($systemCategory->brief); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                                <?php
                                    $metas = \App\Models\SmartAssemble\SystemMeta::where('system_category_id', $systemCategory->id)->get();
                                ?>
                                <ul class="list-group list-group-flush">
                                    <?php $__currentLoopData = $metas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item"><?php echo e($meta->meta_value); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <div class="card-body">
                                    <a type="button" href="<?php echo e(route('smart.assemble.types', $systemCategory)); ?>"
                                       class="btn btn-outline-primary card-link mt-3 d-block">مشاهده سیستم ها</a>
                                    
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item font-size-12"><a href="#">فروشگاه</a></li>
                    <li class="breadcrumb-item font-size-12"><a href="#">سیستم اسمبل هوشمند</a></li>
                    <li class="breadcrumb-item font-size-12 active" aria-current="page">نمونه سیستم های اسمبل شده</li>
                </ol>
            </nav>
            <div class="card-group">
                <?php $__currentLoopData = $offeredSystems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offeredSystem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <img src="<?php echo e(asset($offeredSystem->image['indexArray']['medium'] )); ?>" class="card-img-top"
                             alt="...">
                        
                        
                        
                        
                        
                        
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $sampleOfGamingSystemImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $system): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <img src="<?php echo e(asset($system->image['indexArray']['medium'] )); ?>" class="card-img-top"
                                 alt="...">
                            
                            
                            
                            
                            
                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <!-- start brand part-->
    <section class="brand-part mb-4 py-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex align-items-center">
                            <h2 class="content-header-title">
                                <span>برندهای ویژه</span>
                            </h2>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="brands-wrapper py-4">
                        <section class="brands dark-owl-nav owl-carousel owl-theme">
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#">
                                            <img class="rounded-2"
                                                 src="<?php echo e(asset($brand->logo['indexArray']['medium'])); ?>" alt="">
                                        </a>
                                    </section>
                                </section>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end brand part-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layouts.master-one-col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/smart-assemble/category.blade.php ENDPATH**/ ?>