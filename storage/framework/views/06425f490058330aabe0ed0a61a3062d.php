<div class="bg-white  <?php echo e($thread->pinned ? 'pinned' : '', false); ?> <?php echo e($thread->locked ? 'locked' : '', false); ?> <?php echo e($thread->trashed() ? 'deleted' : '', false); ?>" :class="{ 'border border-blue-500': selectedThreads.includes(<?php echo e($thread->id, false); ?>) }">
    <div class="flex flex-col md:items-start md:flex-row md:justify-between md:gap-4 p-4">
        <div class="md:w-3/6 text-center md:text-left">
            <span class="lead">
                <a href="<?php echo e(Forum::route('thread.show', $thread), false); ?>" <?php if(isset($category)): ?>style="color: <?php echo e($category->color, false); ?>;"<?php endif; ?> class="text-lg"><?php echo e($thread->title, false); ?></a>
            </span>
            <br>
            <?php echo e($thread->authorName, false); ?> <span class="text-gray-500"><?php echo $__env->make('forum.partials.timestamp', ['carbon' => $thread->created_at], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></span>

            <?php if(! isset($category)): ?>
                <br>
                <a href="<?php echo e(Forum::route('category.show', $thread->category), false); ?>" style="color: <?php echo e($thread->category->color, false); ?>;"><?php echo e($thread->category->title, false); ?></a>
            <?php endif; ?>
        </div>
        <div class="md:w-1/6 flex flex-wrap justify-center items-center md:justify-end gap-1">
            <?php if($thread->pinned): ?>
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.badge','data' => ['type' => 'info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info']); ?><?php echo e(trans('forum::threads.pinned'), false); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            <?php endif; ?>
            <?php if($thread->locked): ?>
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.badge','data' => ['type' => 'warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning']); ?><?php echo e(trans('forum::threads.locked'), false); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            <?php endif; ?>
            <?php if($thread->userReadStatus !== null && ! $thread->trashed()): ?>
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.badge','data' => ['type' => 'success']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'success']); ?><?php echo e(trans($thread->userReadStatus), false); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            <?php endif; ?>
            <?php if($thread->trashed()): ?>
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.badge','data' => ['type' => 'danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'danger']); ?><?php echo e(trans('forum::general.deleted'), false); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            <?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.badge','data' => ['style' => (isset($category) && $category->color) ? 'background: '.$category->color .';' : null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((isset($category) && $category->color) ? 'background: '.$category->color .';' : null)]); ?>
                <?php echo e(trans('forum::general.replies'), false); ?>:
                <?php echo e($thread->reply_count, false); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>

        <?php if($thread->lastPost): ?>
            <div class="md:w-2/6 text-gray-500 flex justify-center md:flex-col md:items-end">
                <a href="<?php echo e(Forum::route('thread.show', $thread->lastPost), false); ?>" class="text-blue-500"><?php echo e(trans('forum::posts.view'), false); ?> &raquo;</a>
                <div>
                    <span><?php echo e($thread->lastPost->authorName, false); ?></span>
                    <span class="text-gray-500"><?php echo $__env->make('forum.partials.timestamp', ['carbon' => $thread->lastPost->created_at], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></span>
                </div>
            </div>
        <?php endif; ?>

        <?php if(isset($category) && isset($selectableThreadIds) && in_array($thread->id, $selectableThreadIds)): ?>
            <div class="" style="flex: 0;">
                <input type="checkbox" name="threads[]" :value="<?php echo e($thread->id, false); ?>" v-model="selectedThreads">
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/thread/partials/list.blade.php ENDPATH**/ ?>