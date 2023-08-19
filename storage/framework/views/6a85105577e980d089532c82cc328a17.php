<div tabindex="-1" role="dialog" data-modal="<?php echo e($key, false); ?>" class="fixed top-0 left-0 w-full h-full hidden z-10 items-center justify-center">
    <div class="fixed top-0 left-0 w-full h-full bg-black/25" data-close-modal></div>
    <div class="relative bg-white rounded-md max-w-screen-sm w-full m-2" role="document">
        <div class="">
            <div class="border-b px-4 py-3 flex justify-between">
                <h5 class="text-xl font-medium flex items-center gap-1"><?php echo $title; ?></h5>
                <button type="button" aria-label="Close" data-close-modal>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="<?php echo e($route, false); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php if(isset($method)): ?>
                    <?php echo method_field($method); ?>
                <?php endif; ?>

                <div class="p-4">
                    <?php echo e($slot, false); ?>

                </div>
                <div class="border-t py-3 px-4 flex justify-end gap-4">
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.button-secondary','data' => ['type' => 'button','class' => 'btn btn-secondary','dataCloseModal' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','class' => 'btn btn-secondary','data-close-modal' => true]); ?><?php echo e(trans('forum::general.cancel'), false); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                    <?php echo e($actions, false); ?>

                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/modal-form.blade.php ENDPATH**/ ?>