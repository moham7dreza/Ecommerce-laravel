<?php if($paginator->hasPages()): ?>
    <div class="container-fluid pagination-div">
        <ul class="p-3 flex row justify-content-between">
            <?php if($paginator->onFirstPage()): ?>
                <li class="d-inline-block rounded px-2 py-1 disable_li">قبلی</li>
            <?php else: ?>
                <li class="pointer d-inline-block rounded shadow-sm bg-white border px-2 py-1"
                    wire:click="previousPage">قبلی
                </li>
            <?php endif; ?>


            <div class="row justify-content-md-center">
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(is_array($element)): ?>
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page =>$url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page ==$paginator->currentPage()): ?>
                                <li class="d-inline-block mx-2 w-10 px-2 py-1 text-center rounded border shadow-sm alert-success"><?php echo e($page); ?></li>
                            <?php else: ?>
                                <li class="d-inline-block mx-2 w-10 px-2 py-1 text-center rounded border shadow-sm pointer"
                                    wire:click="gotoPage(<?php echo e($page); ?>)"><?php echo e($page); ?></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>


            <?php if($paginator->hasMorePages()): ?>
                <li class="pointer d-inline-block rounded shadow-sm bg-white border px-2 py-1" wire:click="nextPage">
                    بعدی
                </li>
            <?php else: ?>
                <li class="d-inline-block rounded disable_li px-2 py-1">بعدی</li>
            <?php endif; ?>
        </ul>
    </div>

<?php endif; ?>
<?php /**PATH C:\CODEX\techzilla\resources\views/livewire/digital-world/utils/pagination-links.blade.php ENDPATH**/ ?>