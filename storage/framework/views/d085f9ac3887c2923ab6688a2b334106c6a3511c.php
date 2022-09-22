<?php $__env->startSection('head-tag'); ?>
    <title>
        <?php echo e($systemCategory->name. ' ' .$systemType->name. ' ' . $systemCpu->name); ?>

    </title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="album py-5 bg-light">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center"><?php echo e($systemCpu->name); ?></h1>
                <p class="lead text-center"><?php echo e($systemCpu->description); ?></p>
                <p class="lead text-center text-danger">چه کانفیگی از سیستم مدنظر شماست؟</p>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- start breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item font-size-12"><a href="#" class="text-decoration-none text-dark">فروشگاه</a></li>
                        <li class="breadcrumb-item font-size-12"><a href="#" class="text-decoration-none text-dark">سیستم اسمبل هوشمند</a></li>
                        <li class="breadcrumb-item font-size-12"> دسته بندی سیستم ها</li>
                        <li class="breadcrumb-item font-size-12"><?php echo e($systemCategory->name); ?></li>
                        <li class="breadcrumb-item font-size-12"><?php echo e($systemType->name); ?></li>
                        <li class="breadcrumb-item font-size-12 active" aria-current="page"><?php echo e($systemCpu->name); ?></li>
                    </ol>
                </nav>
                <!-- end breadcrumb -->
            </div>
            <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 g-3">

                <?php $__currentLoopData = $systemConfigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $systemConfig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card shadow-sm">

                            <a href="<?php echo e(route('smart.assemble.build', ['systemCategory' => $systemCategory, 'systemType' => $systemType, 'systemCpu'=> $systemCpu, 'systemConfig'=> $systemConfig])); ?>">
                                <img src="<?php echo e(asset($systemConfig->image['indexArray']['medium'])); ?>"
                                     class="bd-placeholder-img card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($systemConfig->name); ?></h5>
                                <p class="card-text"><?php echo e($systemConfig->brief); ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    
                                    
                                    
                                    
                                    
                                    <label for="">شروع قیمت</label>
                                    <small class="text-muted"><?php echo e(priceFormat($systemConfig->start_price_from)); ?>

                                        <span> تومان</span></small>
                                </div>
                                <a type="button"
                                   href="<?php echo e(route('smart.assemble.build', ['systemCategory' => $systemCategory, 'systemType' => $systemType, 'systemCpu'=>$systemCpu, 'systemConfig'=> $systemConfig])); ?>"
                                   class="btn btn-outline-primary card-link mt-3 d-block">مشاهده جزيات</a>
                            </div>
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
                    <li class="breadcrumb-item font-size-12"><a href="#" class="text-decoration-none text-dark">فروشگاه</a></li>
                    <li class="breadcrumb-item font-size-12"><a href="#" class="text-decoration-none text-dark">سیستم اسمبل هوشمند</a></li>
                    <li class="breadcrumb-item font-size-12 active" aria-current="page">نمونه <?php echo e($systemCategory->name); ?>

                        -<?php echo e($systemType->name); ?>-<?php echo e($systemCpu->name); ?>

                        اسمبل شده
                    </li>
                </ol>
            </nav>
            <div class="card-group">
                <?php $__currentLoopData = $offeredSystems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offeredSystem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <img src="<?php echo e(asset($offeredSystem->image['indexArray']['medium'] )); ?>" class="card-img-top"
                             alt="...">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layouts.master-one-col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\mars-shop\resources\views/smart-assemble/config.blade.php ENDPATH**/ ?>