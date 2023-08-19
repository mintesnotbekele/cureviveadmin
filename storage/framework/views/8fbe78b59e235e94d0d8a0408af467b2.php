<?php $__env->startComponent('forum.modal-form'); ?>
    <?php $__env->slot('key', 'delete-category'); ?>
    <?php $__env->slot('title', trans('forum::general.delete')); ?>
    <?php $__env->slot('route', Forum::route('category.delete', $category)); ?>
    <?php $__env->slot('method', 'DELETE'); ?>

    <?php echo e(trans('forum::general.generic_confirm'), false); ?>


    <?php if(! $category->isEmpty()): ?>
        <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" value="1" name="force" id="forceDelete">
            <label class="form-check-label" for="forceDelete">
                <?php echo e(trans('forum::categories.confirm_nonempty_delete'), false); ?>

            </label>
        </div>
    <?php endif; ?>

    <?php $__env->slot('actions'); ?>
        <button type="submit" class="btn btn-danger"><?php echo e(trans('forum::general.delete'), false); ?></button>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/category/modals/delete.blade.php ENDPATH**/ ?>