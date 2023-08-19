<?php $__env->startSection('content'); ?>
    <div id="new-posts">
        <h2 class="text-3xl text-medium my-4"><?php echo e(trans('forum::threads.unread_updated'), false); ?></h2>

        <?php if(! $threads->isEmpty()): ?>
            <div class="">
                <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('forum.thread.partials.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="bg-white shadow rounded text-gray-500 text-center py-4">
                <?php echo e(trans('forum::threads.none_found'), false); ?>

            </div>
        <?php endif; ?>
    </div>

    <?php if(! $threads->isEmpty()): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('markThreadsAsRead')): ?>
            <div class="flex justify-center mt-4">
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.button','data' => ['class' => 'px-5 flex items-center gap-2','dataOpenModal' => 'mark-as-read']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-5 flex items-center gap-2','data-open-modal' => 'mark-as-read']); ?>
                    <i data-feather="book"></i> <?php echo e(trans('forum::general.mark_read'), false); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            </div>

            <?php echo $__env->make('forum.thread.modals.mark-as-read', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forum.master', ['thread' => null, 'breadcrumbs_append' => [trans('forum::threads.unread_updated')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/thread/unread.blade.php ENDPATH**/ ?>