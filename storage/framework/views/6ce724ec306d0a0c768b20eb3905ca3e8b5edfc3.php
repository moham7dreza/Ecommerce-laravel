<footer>
    <div class="footer-area pt-50 bg-white">
        <div class="container">
            <div class="row pb-30">
                <?php $__currentLoopData = $categories->chunk(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <ul class="float-right ml-30 font-medium">
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="cat-item cat-item-2"><a href="<?php echo e(route('digital-world.livewire.category.posts', $cat)); ?>"><?php echo e($cat->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- footer-bottom aera -->
    <div class="footer-bottom-area bg-white text-muted">
        <div class="container">
            <div class="footer-border pt-20 pb-20">
                <div class="row d-flex mb-15">
                    <div class="col-12">
                        <ul class="list-inline font-small">
                            <li class="list-inline-item"><a href="<?php echo e(route('digital-world.home')); ?>">صفحه اصلی</a></li>
                            <li class="list-inline-item"><a href="category.html">مقالات</a></li>
                            <li class="list-inline-item"><a href="category.html">نویسنده ها</a></li>
                            <li class="list-inline-item"><a href="category.html">درباره ما</a></li>
                            <li class="list-inline-item"><a href="category.html">تماس با ما</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-12">
                        <div class="footer-copy-right">
                            <p class="font-small text-muted">
                                طراحی و ساخته شده توسط
                                <a href="#" target="_blank">Techzilla</a>
                                |
                                © 1401
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<?php /**PATH C:\CODEX\techzilla\resources\views/livewire/digital-world/layouts/footer.blade.php ENDPATH**/ ?>