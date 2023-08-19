<div class="mb-3">
    <label for="color"><?php echo e(trans('forum::general.color'), false); ?></label>
    <div class="pickr"></div>
    <input type="hidden" value="<?php echo e(isset($category->color) ? $category->color : (old('color') ?? config('forum.web.default_category_color')), false); ?>" name="color">
</div>
<?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/category/partials/inputs/color.blade.php ENDPATH**/ ?>