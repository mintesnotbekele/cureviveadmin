<?php $__env->startSection('content'); ?>
    <div class="flex flex-row justify-between mb-2">
        <h2 class="text-3xl" style="color: <?php echo e($category->color, false); ?>;">
            <?php echo e($category->title, false); ?> &nbsp;
            <?php if($category->description): ?>
                <small><?php echo e($category->description, false); ?></small>
            <?php endif; ?>
        </h2>
    </div>

    <div class="v-category-show">
        <div class="flex justify-between flex-row-reverse">
            <?php if($category->accepts_threads): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('createThreads', $category)): ?>
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.button-link','data' => ['href' => ''.e(Forum::route('thread.create', $category), false).'','class' => 'btn btn-primary float-end']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(Forum::route('thread.create', $category), false).'','class' => 'btn btn-primary float-end']); ?><?php echo e(trans('forum::threads.new_thread'), false); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.button-group','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.button-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageCategories')): ?>
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.button-secondary','data' => ['type' => 'button','dataOpenModal' => 'edit-category']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','data-open-modal' => 'edit-category']); ?>
                        <?php echo e(trans('forum::general.edit'), false); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                <?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>

        <?php if(! $category->children->isEmpty()): ?>
            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('forum.category.partials.list', ['category' => $subcategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <?php if($category->accepts_threads): ?>
            <?php if(! $threads->isEmpty()): ?>
                <div class="mt-4">
                    <?php echo e($threads->links('forum.pagination'), false); ?>

                </div>

                <?php if(count($selectableThreadIds) > 0): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageThreads', $category)): ?>
                        <form :action="actions[selectedAction]" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" :value="actionMethods[selectedAction]" />

                            <div class="text-end mt-2">
                                <div class="form-check">
                                    <label for="selectAllThreads">
                                        <?php echo e(trans('forum::threads.select_all'), false); ?>

                                    </label>
                                    <input type="checkbox" value="" id="selectAllThreads" class="align-middle" @click="toggleAll" :checked="selectedThreads.length == selectableThreadIds.length">
                                </div>
                            </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="threads list-group my-3 shadow-sm">
                    <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('forum.thread.partials.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php if(count($selectableThreadIds) > 0): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageThreads', $category)): ?>
                            <div class="fixed bottom-0 right-0 m-2" style="z-index: 1000;">
                                <transition name="fade">
                                    <div class="bg-white shadow-sm rounded-md" v-if="selectedThreads.length">
                                        <div class="border-b text-center py-2 px-4">
                                            <?php echo e(trans('forum::general.with_selection'), false); ?>

                                        </div>
                                        <div class="p-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.label','data' => ['for' => 'bulk-actions']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'bulk-actions']); ?><?php echo e(trans_choice('forum::general.actions', 1), false); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                                </div>
                                                <select class="form-select" id="bulk-actions" v-model="selectedAction">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deleteThreads', $category)): ?>
                                                        <option value="delete"><?php echo e(trans('forum::general.delete'), false); ?></option>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restoreThreads', $category)): ?>
                                                        <option value="restore"><?php echo e(trans('forum::general.restore'), false); ?></option>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('moveThreadsFrom', $category)): ?>
                                                        <option value="move"><?php echo e(trans('forum::general.move'), false); ?></option>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lockThreads', $category)): ?>
                                                        <option value="lock"><?php echo e(trans('forum::threads.lock'), false); ?></option>
                                                        <option value="unlock"><?php echo e(trans('forum::threads.unlock'), false); ?></option>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pinThreads', $category)): ?>
                                                        <option value="pin"><?php echo e(trans('forum::threads.pin'), false); ?></option>
                                                        <option value="unpin"><?php echo e(trans('forum::threads.unpin'), false); ?></option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>

                                            <div class="mb-3" v-if="selectedAction == 'move'">
                                                <label for="category-id"><?php echo e(trans_choice('forum::categories.category', 1), false); ?></label>
                                                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.select','data' => ['name' => 'category_id','id' => 'category-id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'category_id','id' => 'category-id']); ?>
                                                    <?php echo $__env->make('forum.category.partials.options', ['hide' => $category], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                            </div>

                                            <?php if(config('forum.general.soft_deletes')): ?>
                                                <div class="form-check mb-3" v-if="selectedAction == 'delete'">
                                                    <input class="form-check-input" type="checkbox" name="permadelete" value="1" id="permadelete">
                                                    <label class="form-check-label" for="permadelete">
                                                        <?php echo e(trans('forum::general.perma_delete'), false); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>

                                            <div class="text-end">
                                                <button type="submit" class="bg-blue-500 text-white rounded-md px-3 py-1" @click="submit" :disabled="selectedAction == null"><?php echo e(trans('forum::general.proceed'), false); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </transition>
                            </div>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <div class="card my-3">
                    <div class="card-body">
                        <?php echo e(trans('forum::threads.none_found'), false); ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('createThreads', $category)): ?>
                            <br>
                            <a href="<?php echo e(Forum::route('thread.create', $category), false); ?>"><?php echo e(trans('forum::threads.post_the_first'), false); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col col-xs-8">
                    <?php echo e($threads->links('forum.pagination'), false); ?>

                </div>
                <div class="col col-xs-4 text-end">
                    <?php if($category->accepts_threads): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('createThreads', $category)): ?>
                            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.button-link','data' => ['href' => ''.e(Forum::route('thread.create', $category), false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(Forum::route('thread.create', $category), false).'']); ?><?php echo e(trans('forum::threads.new_thread'), false); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if(! $threads->isEmpty()): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('markThreadsAsRead')): ?>
            <div class="text-center mt-3">
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forum.button','data' => ['class' => 'inline-flex px-6 items-center gap-2','dataOpenModal' => 'mark-threads-as-read']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forum.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-flex px-6 items-center gap-2','data-open-modal' => 'mark-threads-as-read']); ?>
                    <i data-feather="book"></i> <?php echo e(trans('forum::general.mark_read'), false); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            </div>

            <?php echo $__env->make('forum.category.modals.mark-threads-as-read', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageCategories')): ?>
        <?php echo $__env->make('forum.category.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('forum.category.modals.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <style>
    .list-group.threads .list-group-item
    {
        border-left-width: 2px;
    }

    .list-group.threads .list-group-item.locked
    {
        border-left-color: var(--bs-yellow);
    }

    .list-group.threads .list-group-item.pinned
    {
        border-left-color: var(--bs-cyan);
    }

    .list-group.threads .list-group-item.deleted
    {
        border-left-color: var(--bs-red);
        opacity: 0.5;
    }
    </style>

    <script>
    new Vue({
        el: '.v-category-show',
        name: 'CategoryShow',
        data: {
            selectableThreadIds: <?php echo json_encode($selectableThreadIds, 15, 512) ?>,
            actions: {
                'delete': "<?php echo e(Forum::route('bulk.thread.delete'), false); ?>",
                'restore': "<?php echo e(Forum::route('bulk.thread.restore'), false); ?>",
                'lock': "<?php echo e(Forum::route('bulk.thread.lock'), false); ?>",
                'unlock': "<?php echo e(Forum::route('bulk.thread.unlock'), false); ?>",
                'pin': "<?php echo e(Forum::route('bulk.thread.pin'), false); ?>",
                'unpin': "<?php echo e(Forum::route('bulk.thread.unpin'), false); ?>",
                'move': "<?php echo e(Forum::route('bulk.thread.move'), false); ?>"
            },
            actionMethods: {
                'delete': 'DELETE',
                'restore': 'POST',
                'lock': 'POST',
                'unlock': 'POST',
                'pin': 'POST',
                'unpin': 'POST',
                'move': 'POST'
            },
            selectedAction: null,
            selectedThreads: [],
            isEditModalOpen: false,
            isDeleteModalOpen: false
        },
        methods: {
            toggleAll ()
            {
                this.selectedThreads = (this.selectedThreads.length < this.selectableThreadIds.length) ? this.selectableThreadIds : [];
            },
            submit (event)
            {
                if (this.actionMethods[this.selectedAction] === 'DELETE' && ! confirm("<?php echo e(trans('forum::general.generic_confirm'), false); ?>"))
                {
                    event.preventDefault();
                }
            },
            onClickModal (event)
            {
                if (event.target.classList.contains('modal'))
                {
                    this.isEditModalOpen = false;
                    this.isDeleteModalOpen = false;
                }
            }
        }
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forum.master', ['thread' => null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/category/show.blade.php ENDPATH**/ ?>