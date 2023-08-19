<div class="my-4">
    <div class="bg-white shadow rounded-md relative">
        <div class="flex flex-col md:items-start md:flex-row md:justify-between md:gap-4 p-4">
            <div class="md:w-3/6 text-center md:text-left">
                <h5 class="text-lg">
                    <a href="<?php echo e(Forum::route('category.show', $category), false); ?>" style="color: <?php echo e($category->color, false); ?>;"><?php echo e($category->title, false); ?></a>
                </h5>
                <p class="text-gray-500"><?php echo e($category->description, false); ?></p>
            </div>
            <div class="md:w-1/6 flex flex-col items-center md:items-end gap-1">
                <?php if($category->accepts_threads): ?>
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.badge','data' => ['style' => 'background: '.e($category->color, false).';']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'background: '.e($category->color, false).';']); ?>
                        <?php echo e(trans_choice('forum::threads.thread', 2), false); ?>: <?php echo e($category->thread_count, false); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.badge','data' => ['style' => 'background: '.e($category->color, false).';']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'background: '.e($category->color, false).';']); ?>
                        <?php echo e(trans_choice('forum::posts.post', 2), false); ?>: <?php echo e($category->post_count, false); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="md:w-2/6 text-gray-500 flex flex-col items-center md:items-end">
                <?php if($category->accepts_threads): ?>
                    <?php if($category->newestThread): ?>
                        <div>
                            <a href="<?php echo e(Forum::route('thread.show', $category->newestThread), false); ?>" class="text-blue-500"><?php echo e($category->newestThread->title, false); ?></a>
                            <?php echo $__env->make('forum.partials.timestamp', ['carbon' => $category->newestThread->created_at], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($category->latestActiveThread && $category->latestActiveThread->post_count > 1): ?>
                        <div>
                            <a href="<?php echo e(Forum::route('thread.show', $category->latestActiveThread->lastPost), false); ?>">Re: <?php echo e($category->latestActiveThread->title, false); ?></a>
                            <?php echo $__env->make('forum.partials.timestamp', ['carbon' => $category->latestActiveThread->lastPost->created_at], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if($category->children->count() > 0): ?>
        <div class="subcategories">
            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white -mt-1 shadow rounded-b-md">
                    <div class="flex flex-col md:items-start md:flex-row md:justify-between md:gap-4 p-4">
                        <div class="md:w-3/6 text-center md:text-left">
                            <a href="<?php echo e(Forum::route('category.show', $subcategory), false); ?>" style="color: <?php echo e($subcategory->color, false); ?>;"><?php echo e($subcategory->title, false); ?></a>
                            <div class="text-muted"><?php echo e($subcategory->description, false); ?></div>
                        </div>
                        <div class="md:w-1/6 flex flex-col items-center md:items-end gap-1">
                            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.badge','data' => ['style' => 'background: '.e($subcategory->color, false).';']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'background: '.e($subcategory->color, false).';']); ?>
                                <?php echo e(trans_choice('forum::threads.thread', 2), false); ?>: <?php echo e($subcategory->thread_count, false); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.badge','data' => ['style' => 'background: '.e($subcategory->color, false).';']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'background: '.e($subcategory->color, false).';']); ?>
                                <?php echo e(trans_choice('forum::posts.post', 2), false); ?>: <?php echo e($subcategory->post_count, false); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                        </div>
                        <div class="md:w-2/6 text-gray-500 flex justify-center md:flex-col md:items-end">
                            <?php if($subcategory->newestThread): ?>
                                <div>
                                    <a href="<?php echo e(Forum::route('thread.show', $subcategory->newestThread), false); ?>"><?php echo e($subcategory->newestThread->title, false); ?></a>
                                    <?php echo $__env->make('forum.partials.timestamp', ['carbon' => $subcategory->newestThread->created_at], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($subcategory->latestActiveThread && $subcategory->latestActiveThread->post_count > 1): ?>
                                <div>
                                    <a href="<?php echo e(Forum::route('thread.show', $subcategory->latestActiveThread->lastPost), false); ?>">Re: <?php echo e($subcategory->latestActiveThread->title, false); ?></a>
                                    <?php echo $__env->make('forum.partials.timestamp', ['carbon' => $subcategory->latestActiveThread->lastPost->created_at], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/category/partials/list.blade.php ENDPATH**/ ?>