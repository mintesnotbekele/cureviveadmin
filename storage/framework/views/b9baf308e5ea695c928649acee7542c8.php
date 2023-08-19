<?php $__env->startSection('content'); ?>
    <div id="new-posts">
        <h2 class="text-3xl font-medium my-3"><?php echo e(trans('forum::threads.recent'), false); ?></h2>

        <?php if(! $threads->isEmpty()): ?>
            <div class="my-3">
                <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('forum.thread.partials.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="bg-white my-3">
                <div class="card-body text-center text-muted">
                    <?php echo e(trans('forum::threads.none_found'), false); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forum.master', ['thread' => null, 'breadcrumbs_append' => [trans('forum::threads.recent')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/thread/recent.blade.php ENDPATH**/ ?>