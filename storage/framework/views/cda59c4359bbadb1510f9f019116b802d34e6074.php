<?php
$menus = [
    'admin' => [
        'url' => route('admin.index'),
        'title' => __('Dashboard'),
        'icon' => 'icon ion-ios-desktop',
        'position' => 0,
    ],
    'menu' => [
        'position' => 60,
        'url' => route('core.admin.menu.index'),
        'title' => __('Menu'),
        'icon' => 'icon ion-ios-apps',
        'permission' => 'menu_view',
    ],
    'general' => [
        'position' => 80,
        'url' => route('core.admin.settings.index', ['group' => 'general']),
        'title' => __('Setting'),
        'icon' => 'icon ion-ios-cog',
        'permission' => 'setting_update',
        'children' => \Modules\Core\Models\Settings::getSettingPages(true),
    ],
    'tools' => [
        'position' => 90,
        'url' => route('core.admin.tool.index'),
        'title' => __('Tools'),
        'icon' => 'icon ion-ios-hammer',
        'children' => [
            'language' => [
                'url' => route('language.admin.index'),
                'title' => __('Languages'),
                'icon' => 'icon ion-ios-globe',
                'permission' => 'language_manage',
            ],
            'translation' => [
                'url' => route('language.admin.translations.index'),
                'title' => __('Translation Manager'),
                'icon' => 'icon ion-ios-globe',
                'permission' => 'language_translation',
            ],
            'logs' => [
                'url' => route('admin.logs'),
                'title' => __('System Logs'),
                'icon' => 'icon ion-ios-nuclear',
                'permission' => 'system_log_view',
            ],
        ],
    ],
];

// Modules
$custom_modules = \Modules\ServiceProvider::getActivatedModules();
if (!empty($custom_modules)) {
    $custom_modules[] = [
        'id' => 'theme',
        'class' => \Modules\Theme\ModuleProvider::class,
    ];
    foreach ($custom_modules as $moduleData) {
        $module = $moduleData['id'];
        $moduleClass = $moduleData['class'];
        if (class_exists($moduleClass)) {
            $menuConfig = call_user_func([$moduleClass, 'getAdminMenu']);

            if (!empty($menuConfig)) {
                $menus = array_merge($menus, $menuConfig);
            }

            $menuSubMenu = call_user_func([$moduleClass, 'getAdminSubMenu']);

            if (!empty($menuSubMenu)) {
                foreach ($menuSubMenu as $k => $submenu) {
                    $submenu['id'] = $submenu['id'] ?? '_' . $k;

                    if (!empty($submenu['parent']) and isset($menus[$submenu['parent']])) {
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(
                            \Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                                return $value['position'] ?? 100;
                            }),
                        );
                    }
                }
            }
        }
    }
}

// Plugins Menu
$plugins_modules = \Plugins\ServiceProvider::getModules();
if (!empty($plugins_modules)) {
    foreach ($plugins_modules as $module) {
        $moduleClass = '\\Plugins\\' . ucfirst($module) . '\\ModuleProvider';
        if (class_exists($moduleClass)) {
            $menuConfig = call_user_func([$moduleClass, 'getAdminMenu']);
            if (!empty($menuConfig)) {
                $menus = array_merge($menus, $menuConfig);
            }
            $menuSubMenu = call_user_func([$moduleClass, 'getAdminSubMenu']);
            if (!empty($menuSubMenu)) {
                foreach ($menuSubMenu as $k => $submenu) {
                    $submenu['id'] = $submenu['id'] ?? '_' . $k;
                    if (!empty($submenu['parent']) and isset($menus[$submenu['parent']])) {
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(
                            \Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                                return $value['position'] ?? 100;
                            }),
                        );
                    }
                }
            }
        }
    }
}

// Custom Menu
$custom_modules = \Custom\ServiceProvider::getModules();
if (!empty($custom_modules)) {
    foreach ($custom_modules as $module) {
        $moduleClass = '\\Custom\\' . ucfirst($module) . '\\ModuleProvider';
        if (class_exists($moduleClass)) {
            $menuConfig = call_user_func([$moduleClass, 'getAdminMenu']);

            if (!empty($menuConfig)) {
                $menus = array_merge($menus, $menuConfig);
            }

            $menuSubMenu = call_user_func([$moduleClass, 'getAdminSubMenu']);

            if (!empty($menuSubMenu)) {
                foreach ($menuSubMenu as $k => $submenu) {
                    $submenu['id'] = $submenu['id'] ?? '_' . $k;
                    if (!empty($submenu['parent']) and isset($menus[$submenu['parent']])) {
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(
                            \Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                                return $value['position'] ?? 100;
                            }),
                        );
                    }
                }
            }
        }
    }
}
$typeManager = app()->make(\Modules\Type\TypeManager::class);
$menuConfig = $typeManager->adminMenus();

$menus = array_merge($menus, $menuConfig);

$currentUrl = url(\Modules\Core\Walkers\MenuWalker::getActiveMenu());
$user = \Illuminate\Support\Facades\Auth::user();
if (!empty($menus)) {
    foreach ($menus as $k => $menuItem) {
        if (!empty($menuItem['permission']) and !$user->hasPermission($menuItem['permission'])) {
            unset($menus[$k]);
            continue;
        }
        $menus[$k]['class'] = $currentUrl == url($menuItem['url']) ? 'active' : '';
        if (!empty($menuItem['children'])) {
            $menus[$k]['class'] .= ' has-children';
            foreach ($menuItem['children'] as $k2 => $menuItem2) {
                if (!empty($menuItem2['permission']) and !$user->hasPermission($menuItem2['permission'])) {
                    unset($menus[$k]['children'][$k2]);
                    continue;
                }
                $menus[$k]['children'][$k2]['class'] = $currentUrl == url($menuItem2['url']) ? 'active' : '';
            }
        }
    }

    //@todo Sort Menu by Position
    $menus = array_values(
        \Illuminate\Support\Arr::sort($menus, function ($value) {
            return $value['position'] ?? 100;
        }),
    );
}

// $flightDisableSetting = DB::table('core_settings')->whereIn('name', ['flight_disable', 'car_disable', 'space_disable', 'boat_disable'])->where('val', 1)->get();
$flightDisableSetting = DB::table('core_settings')
    ->where('name', ['flight_disable'])
    ->where('val', 1)
    ->first();
$carDisableSetting = DB::table('core_settings')
    ->where('name', ['car_disable'])
    ->where('val', 1)
    ->first();
$spaceDisableSetting = DB::table('core_settings')
    ->where('name', ['space_disable'])
    ->where('val', 1)
    ->first();
$boatDisableSetting = DB::table('core_settings')
    ->where('name', ['boat_disable'])
    ->where('val', 1)
    ->first();

?>

<ul class="main-menu pb-5">
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php
    $menuItem['class'] .= " ".str_ireplace("/","_",$menuItem['url']) ?>
    <li class="<?php echo e($menuItem['class']); ?>"><a href="<?php echo e(url($menuItem['url'])); ?>">
            <?php if(!empty($menuItem['icon'])): ?>
            <span class="icon text-center"><i class="<?php echo e($menuItem['icon']); ?>"></i></span>
            <?php endif; ?>
            <?php echo clean($menuItem['title'], [
            'Attr.AllowedClasses' => null,
            ]); ?>

        </a>
        <?php if(!empty($menuItem['children'])): ?>
        <span class="btn-toggle"><i class="fa fa-angle-left pull-right"></i></span>
            <ul class="children">
                <?php $__currentLoopData = $menuItem['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php switch($menuItem2['title']):
                case ('Flight Settings'): ?>
                <?php if(!$flightDisableSetting): ?>
                <li class="<?php echo e($menuItem['class']); ?>">
                    <a href="<?php echo e(url($menuItem2['url'])); ?>">
                        <?php if(!empty($menuItem2['icon'])): ?>
                        <i class="<?php echo e($menuItem2['icon']); ?>"></i>
                        <?php endif; ?>
                        <?php echo clean($menuItem2['title'], ['Attr.AllowedClasses' => null]); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php break; ?>

                <?php case ('Car Settings'): ?>
                <?php if(!$carDisableSetting): ?>
                <li class="<?php echo e($menuItem['class']); ?>">
                    <a href="<?php echo e(url($menuItem2['url'])); ?>">
                        <?php if(!empty($menuItem2['icon'])): ?>
                        <i class="<?php echo e($menuItem2['icon']); ?>"></i>
                        <?php endif; ?>
                        <?php echo clean($menuItem2['title'], ['Attr.AllowedClasses' => null]); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php break; ?>

                <?php case ('Space Settings'): ?>
                <?php if(!$spaceDisableSetting): ?>
                <li class="<?php echo e($menuItem['class']); ?>">
                    <a href="<?php echo e(url($menuItem2['url'])); ?>">
                        <?php if(!empty($menuItem2['icon'])): ?>
                        <i class="<?php echo e($menuItem2['icon']); ?>"></i>
                        <?php endif; ?>
                        <?php echo clean($menuItem2['title'], ['Attr.AllowedClasses' => null]); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php break; ?>

                <?php case ('Boat Settings'): ?>
                <?php if(!$boatDisableSetting): ?>
                <li class="<?php echo e($menuItem['class']); ?>">
                    <a href="<?php echo e(url($menuItem2['url'])); ?>">
                        <?php if(!empty($menuItem2['icon'])): ?>
                        <i class="<?php echo e($menuItem2['icon']); ?>"></i>
                        <?php endif; ?>
                        <?php echo clean($menuItem2['title'], ['Attr.AllowedClasses' => null]); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php break; ?>

                <?php default: ?>
                <li class="<?php echo e($menuItem['class']); ?>">
                    <a href="<?php echo e(url($menuItem2['url'])); ?>">
                        <?php if(!empty($menuItem2['icon'])): ?>
                        <i class="<?php echo e($menuItem2['icon']); ?>"></i>
                        <?php endif; ?>
                        <?php echo clean($menuItem2['title'], ['Attr.AllowedClasses' => null]); ?>

                    </a>
                </li>
                <?php endswitch; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH /Applications/MAMP/htdocs/gototrip/modules/Layout/admin/parts/sidebar.blade.php ENDPATH**/ ?>