<?php $__env->startSection('head-tag'); ?>
    <title>
        <?php echo e($systemCategory->name. ' ' .$systemType->name); ?>

    </title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="album py-5 bg-light">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center"><?php echo e($systemType->name); ?></h1>
                <p class="lead text-center"><?php echo e($systemType->description); ?></p>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php $__currentLoopData = $systemCpus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $systemCpu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="<?php echo e(route('smart.assemble.configs', ['systemCategory' => $systemCategory, 'systemType' => $systemType, 'systemCpu'=>$systemCpu])); ?>">
                                <img src="<?php echo e(asset($systemCpu->image['indexArray']['medium'])); ?>"
                                     class="bd-placeholder-img card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($systemCpu->name); ?></h5>
                                <p class="card-text"><?php echo e($systemCpu->brief); ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    
                                    
                                    
                                    
                                    
                                    <label for="">شروع قیمت</label>
                                    <small class="text-muted"><?php echo e(priceFormat($systemCpu->start_price_from)); ?><span> تومان</span></small>
                                </div>
                                <a type="button"
                                   href="<?php echo e(route('smart.assemble.configs', ['systemCategory' => $systemCategory, 'systemType' => $systemType, 'systemCpu'=>$systemCpu])); ?>"
                                   class="btn btn-outline-primary card-link mt-3 d-block">مشاهده سیستم ها</a>
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
                    <li class="breadcrumb-item font-size-12"><a href="#">فروشگاه</a></li>
                    <li class="breadcrumb-item font-size-12"><a href="#">سیستم اسمبل هوشمند</a></li>
                    <li class="breadcrumb-item font-size-12 active" aria-current="page">نمونه <?php echo e($systemCategory->name); ?>-<?php echo e($systemType->name); ?>

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

<?php echo $__env->make('customer.layouts.master-one-col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\1 - laravel-shop-project\resources\views/smart-assemble/cpu.blade.php ENDPATH**/ ?>