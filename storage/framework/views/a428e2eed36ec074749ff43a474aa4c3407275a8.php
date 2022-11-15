<div class="row">
    <div class="col-xl-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">آخرین مقالات</h4>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عکس مقالات</th>
                        <th>عنوان مقالات</th>
                        <th>وضعیت</th>
                        <th>نوع</th>
                        <th>زمان خوندن</th>
                        <th>امتیاز</th>
                        <th>دسته بندی</th>
                        <th>کاربر</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $dashboardRepo->getLatestPosts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo e($loop->iteration); ?></th>














                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/adminto/layouts/partials/latest-posts.blade.php ENDPATH**/ ?>