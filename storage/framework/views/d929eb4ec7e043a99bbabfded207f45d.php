<?php if($category->parent !== null): ?>
    <?php echo $__env->make('forum.partials.breadcrumb-categories', ['category' => $category->parent], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<li class=""><a href="<?php echo e(Forum::route('category.show', $category), false); ?>" class="text-blue-500"><?php echo e($category->title, false); ?></a></li>
<?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/partials/breadcrumb-categories.blade.php ENDPATH**/ ?>