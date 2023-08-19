<?php $__env->startComponent('forum.modal-form'); ?>
    <?php $__env->slot('key', 'mark-threads-as-read'); ?>
    <?php $__env->slot('title', trans('forum::categories.mark_read')); ?>
    <?php $__env->slot('route', Forum::route('unread.mark-as-read')); ?>
    <?php $__env->slot('method', 'PATCH'); ?>

    <input type="hidden" name="category_id" value="<?php echo e($category->id, false); ?>" />

    <p><?php echo e(trans('forum::general.generic_confirm'), false); ?></p>

    <?php $__env->slot('actions'); ?>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.button','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>
            <?php echo e(trans('forum::general.mark_read'), false); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/category/modals/mark-threads-as-read.blade.php ENDPATH**/ ?>