<main class="position-relative">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.partials.vip-posts')->html();
} elseif ($_instance->childHasBeenRendered('l2870160817-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2870160817-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2870160817-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2870160817-0');
} else {
    $response = \Livewire\Livewire::mount('digital-world.partials.vip-posts');
    $html = $response->html();
    $_instance->logRenderedChild('l2870160817-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <div class="container">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.partials.top-banner')->html();
} elseif ($_instance->childHasBeenRendered('l2870160817-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l2870160817-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2870160817-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2870160817-1');
} else {
    $response = \Livewire\Livewire::mount('digital-world.partials.top-banner');
    $html = $response->html();
    $_instance->logRenderedChild('l2870160817-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <div class="row">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.partials.right-sidebar')->html();
} elseif ($_instance->childHasBeenRendered('l2870160817-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l2870160817-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2870160817-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2870160817-2');
} else {
    $response = \Livewire\Livewire::mount('digital-world.partials.right-sidebar');
    $html = $response->html();
    $_instance->logRenderedChild('l2870160817-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <div class="col-lg-10 col-md-9 order-1 order-md-2">
                <div class="row">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.partials.new-posts')->html();
} elseif ($_instance->childHasBeenRendered('l2870160817-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l2870160817-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2870160817-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2870160817-3');
} else {
    $response = \Livewire\Livewire::mount('digital-world.partials.new-posts');
    $html = $response->html();
    $_instance->logRenderedChild('l2870160817-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.partials.left-sidebar')->html();
} elseif ($_instance->childHasBeenRendered('l2870160817-4')) {
    $componentId = $_instance->getRenderedChildComponentId('l2870160817-4');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2870160817-4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2870160817-4');
} else {
    $response = \Livewire\Livewire::mount('digital-world.partials.left-sidebar');
    $html = $response->html();
    $_instance->logRenderedChild('l2870160817-4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php /**PATH C:\CODEX\techzilla\resources\views/livewire/digital-world/home.blade.php ENDPATH**/ ?>