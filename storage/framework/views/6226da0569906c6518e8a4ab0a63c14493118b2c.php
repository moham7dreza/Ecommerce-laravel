<div class="card mb-3" style="max-width: 650px;">
    <div class="row g-0">
        <div class="col-md-4">
            <a href="<?php echo e(route('digital-world.technology.post.detail', $post)); ?>">
                <img src="<?php echo e(asset($post->image['indexArray']['medium'])); ?>" class="img-fluid rounded-start" alt="<?php echo e(asset($post->image['indexArray']['medium'])); ?>">
            </a>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($post->title); ?></h5>
                <p class="card-text"><?php echo e(Str::limit($post->summary, 60)); ?></p>
                <p class="card-text"><small class="text-muted">آخرین آپدیت : <?php echo e(jalaliDate($post->created_at)); ?></small></p>
                <p class="card-text"><small class="text-muted">زمان مطالعه : <?php echo e($post->time_to_read); ?></small></p>
                <p class="card-text"><small class="text-muted">نویسنده : <?php echo e($post->author->fullName); ?></small></p>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/livewire/digital-world/technology/post-card.blade.php ENDPATH**/ ?>