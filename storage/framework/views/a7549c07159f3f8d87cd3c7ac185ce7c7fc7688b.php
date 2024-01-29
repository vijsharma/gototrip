<div class="sidebar__item -no-border sidebar-widget">
    <form method="get" class="search" action="<?php echo e(url(app_get_locale(false,false,'/').config('news.news_route_prefix'))); ?>">
        <div class="sidebar-title fw-500"><h2 class="fw-500"><?php echo e(__('Search')); ?></h2></div>
        <div class="single-field relative d-flex items-center py-10">
            <input class="pl-50 border-light text-dark-1 h-50 rounded-8" type="text" name="s" value="<?php echo e(Request::query("s")); ?>" placeholder="<?php echo e(__("Search ...")); ?>">
            <button class="absolute d-flex items-center h-full" type="submit">
                <i class="icon-search text-20 px-15 text-dark-1"></i>
            </button>
        </div>
    </form>
</div>
<?php /**PATH /var/www/html/tripraja/themes/GoTrip/News/Views/frontend/layouts/sidebars/search_form.blade.php ENDPATH**/ ?>