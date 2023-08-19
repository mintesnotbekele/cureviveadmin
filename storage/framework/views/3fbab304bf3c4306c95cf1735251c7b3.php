<nav aria-label="breadcrumb">
    <ol class="flex [&_li]:after:content-['/'] [&_li]:after:px-2 [&_li]:after:text-gray-500 [&_li:last-child]:after:content-['']">
        <li class=""><a href="<?php echo e(url(config('forum.web.router.prefix')), false); ?>" class="text-blue-500"><?php echo e(trans('forum::general.index'), false); ?></a></li>
        <?php if(isset($category) && $category): ?>
            <?php echo $__env->make('forum.partials.breadcrumb-categories', ['category' => $category], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(isset($thread) && $thread): ?>
            <li class=""><a href="<?php echo e(Forum::route('thread.show', $thread), false); ?>" class="text-blue-500"><?php echo e($thread->title, false); ?></a></li>
        <?php endif; ?>
        <?php if(isset($breadcrumbs_append) && count($breadcrumbs_append) > 0): ?>
            <?php $__currentLoopData = $breadcrumbs_append; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class=""><?php echo e($breadcrumb, false); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ol>
</nav>
<?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/partials/breadcrumbs.blade.php ENDPATH**/ ?>