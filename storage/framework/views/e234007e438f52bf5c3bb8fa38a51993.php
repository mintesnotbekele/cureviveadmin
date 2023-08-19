<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(!isset($hide) || (isset($hide) && $cat->id != $hide->id)): ?>
        <option value="<?php echo e($cat->id, false); ?>" <?php echo e((isset($category) && $cat->id == $category->id) ? 'selected' : '', false); ?>>
            <?php for($i = 0; $i < $cat->depth; $i++): ?>- <?php endfor; ?>
            <?php echo e($cat->title, false); ?>

        </option>
    <?php endif; ?>

    <?php if($cat->children): ?>
        <?php echo $__env->make('forum.category.partials.options', ['categories' => $cat->children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/category/partials/options.blade.php ENDPATH**/ ?>