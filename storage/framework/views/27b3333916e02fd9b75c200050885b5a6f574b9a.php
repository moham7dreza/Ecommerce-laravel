<div class="col-lg-8 col-md-12">
    <div class="latest-post mb-50">
        <div class="widget-header position-relative mb-30">
            <div class="row">
                <div class="col-7">
                    <h4 class="widget-title mb-0">جدیدترین <span>پست ها</span></h4>
                </div>
                <div class="col-5 text-left">
                    <h6 class="font-medium pl-15">
                        <a class="text-muted font-small" href="#">مشاهده همه</a>
                    </h6>
                </div>
            </div>
        </div>
        <div class="loop-list-style-1">
            <?php $__currentLoopData = $newPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.post.card', ['post' => $post])->html();
} elseif ($_instance->childHasBeenRendered('l3840956841-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3840956841-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3840956841-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3840956841-0');
} else {
    $response = \Livewire\Livewire::mount('digital-world.post.card', ['post' => $post]);
    $html = $response->html();
    $_instance->logRenderedChild('l3840956841-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="pagination-area mb-30">
        
    </div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.partials.bottom-banner')->html();
} elseif ($_instance->childHasBeenRendered('l3840956841-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3840956841-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3840956841-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3840956841-1');
} else {
    $response = \Livewire\Livewire::mount('digital-world.partials.bottom-banner');
    $html = $response->html();
    $_instance->logRenderedChild('l3840956841-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/livewire/digital-world/partials/new-posts.blade.php ENDPATH**/ ?>