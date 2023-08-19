<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?php if(isset($thread_title)): ?>
            <?php echo e($thread_title, false); ?> —
        <?php endif; ?>
        <?php if(isset($category)): ?>
            <?php echo e($category->title, false); ?> —
        <?php endif; ?>
        <?php echo e(trans('forum::general.home_title'), false); ?>

    </title>

    <!-- Tailwind CSS (https://tailwindcss.com/docs/installation/play-cdn) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Feather icons (https://github.com/feathericons/feather) -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- Vue (https://github.com/vuejs/vue) -->
    <?php if(config('app.debug')): ?>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <?php else: ?>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <?php endif; ?>

    <!-- Axios (https://github.com/axios/axios) -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Pickr (https://github.com/Simonwep/pickr) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>

    <!-- Sortable (https://github.com/SortableJS/Sortable) -->
    <script src="//cdn.jsdelivr.net/npm/sortablejs@1.10.1/Sortable.min.js"></script>
    <!-- Vue.Draggable (https://github.com/SortableJS/Vue.Draggable) -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.23.2/vuedraggable.umd.min.js"></script>
</head>
<body class="bg-gray-100">
    <nav class="v-navbar bg-white shadow py-4">
        <div class="container mx-auto px-4 md:flex md:items-center md:gap-4">
            <div class="flex justify-between items-center">
                <a class="text-lg" href="<?php echo e(url(config('forum.web.router.prefix')), false); ?>">Laravel Forum</a>
                <button class="navbar-toggler block md:hidden border rounded-md px-2 py-1" type="button" :class="{ collapsed: isCollapsed }" @click="isCollapsed = ! isCollapsed">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="navbar-toggler-icon w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="grow justify-between navbar-collapse" :class="{ 'flex flex-col': !isCollapsed, 'hidden md:flex': isCollapsed }">
                <ul class="flex flex-col md:flex-row gap-3 mb-4 md:mb-0">
                    <li>
                        <a class="text-gray-500" href="<?php echo e(url(config('forum.web.router.prefix')), false); ?>"><?php echo e(trans('forum::general.index'), false); ?></a>
                    </li>
                    <li>
                        <a class="text-gray-500" href="<?php echo e(route('forum.recent'), false); ?>"><?php echo e(trans('forum::threads.recent'), false); ?></a>
                    </li>
                    <?php if(auth()->guard()->check()): ?>
                        <li>
                            <a class="text-gray-500" href="<?php echo e(route('forum.unread'), false); ?>"><?php echo e(trans('forum::threads.unread_updated'), false); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('moveCategories')): ?>
                        <li>
                            <a class="text-gray-500" href="<?php echo e(route('forum.category.manage'), false); ?>"><?php echo e(trans('forum::general.manage'), false); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav flex gap-4 flex-col md:flex-row">
                    <?php if(Auth::check()): ?>
                        <li class="nav-item dropdown relative">
                            <a class="dropdown-toggle text-gray-500 flex items-center gap-1" href="#" id="navbarDropdownMenuLink" @click="isUserDropdownCollapsed = ! isUserDropdownCollapsed">
                                <?php echo e($username, false); ?>


                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </a>
                            <div class="border absolute left-0 bg-white rounded-md w-44 divide-y" :class="{ hidden: isUserDropdownCollapsed }" aria-labelledby="navbarDropdownMenuLink">
                                <a class="block px-4 py-2" href="<?php echo e(url('/logout'), false); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Log out
                                </a>
                                <form id="logout-form" action="<?php echo e(url('/logout'), false); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/login'), false); ?>">Log in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/register'), false); ?>">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div id="main" class="container mx-auto p-4">
        <?php echo $__env->make('forum.partials.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('forum.partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script>
    new Vue({
        el: '.v-navbar',
        name: 'Navbar',
        data: {
            isCollapsed: true,
            isUserDropdownCollapsed: true
        },
        methods: {
            onWindowClick (event) {
                const ignore = ['navbar-toggler', 'navbar-toggler-icon', 'dropdown-toggle'];
                if (ignore.some(className => event.target.classList.contains(className))) return;
                if (! this.isCollapsed) this.isCollapsed = true;
                if (! this.isUserDropdownCollapsed) this.isUserDropdownCollapsed = true;
            }
        },
        created: function () {
            window.addEventListener('click', this.onWindowClick);
        }
    });

    // const mask = document.querySelector('.mask');

    function findModal (key)
    {
        const modal = document.querySelector(`[data-modal=${key}]`);

        if (! modal) throw `Attempted to open modal '${key}' but no such modal found.`;

        return modal;
    }

    function openModal (modal)
    {
        setTimeout(function()
        {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }, 200);
    }

    document.querySelectorAll('[data-open-modal]').forEach(item =>
    {
        item.addEventListener('click', event =>
        {
            event.preventDefault();

            openModal(findModal(event.currentTarget.dataset.openModal));
        });
    });

    document.querySelectorAll('[data-close-modal]').forEach(modalClose =>
    {
        modalClose.addEventListener('click', event =>
        {
            event.preventDefault

            setTimeout(function()
            {
                modalClose.closest('[data-modal]').classList.remove('flex');
                modalClose.closest('[data-modal]').classList.add('hidden');
            }, 200);
        });
    });

    document.querySelectorAll('[data-dismiss]').forEach(item =>
    {
        item.addEventListener('click', event => event.currentTarget.parentElement.style.display = 'none');
    });

    document.addEventListener('DOMContentLoaded', event =>
    {
        const hash = window.location.hash.substr(1);
        if (hash.startsWith('modal='))
        {
            openModal(findModal(hash.replace('modal=','')));
        }

        feather.replace();

        const input = document.querySelector('input[name=color]');

        if (! input) return;

        const pickr = Pickr.create({
            el: '.pickr',
            theme: 'classic',
            default: input.value || null,

            swatches: [
                '<?php echo e(config('forum.web.default_category_color'), false); ?>',
                '#f44336',
                '#e91e63',
                '#9c27b0',
                '#673ab7',
                '#3f51b5',
                '#2196f3',
                '#03a9f4',
                '#00bcd4',
                '#009688',
                '#4caf50',
                '#8bc34a',
                '#cddc39',
                '#ffeb3b',
                '#ffc107'
            ],

            components: {
                preview: true,
                hue: true,
                interaction: {
                    input: true,
                    save: true
                }
            },

            strings: {
                save: 'Apply'
            }
        });

        pickr
            .on('save', instance => pickr.hide())
            .on('clear', instance =>
            {
                input.value = '';
                input.dispatchEvent(new Event('change'));
            })
            .on('cancel', instance =>
            {
                const selectedColor = instance
                    .getSelectedColor()
                    .toHEXA()
                    .toString();

                input.value = selectedColor;
                input.dispatchEvent(new Event('change'));
            })
            .on('change', (color, instance) =>
            {
                const selectedColor = color
                    .toHEXA()
                    .toString();

                input.value = selectedColor;
                input.dispatchEvent(new Event('change'));
            });
    });
    </script>
    <?php echo $__env->yieldContent('footer'); ?>
</body>
</html>
<?php /**PATH /media/mente/F4A81F8DA81F4D8C/projects/prophecius/curevive-admin-panel/resources/views/forum/master.blade.php ENDPATH**/ ?>