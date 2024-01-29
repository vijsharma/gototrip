<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/news/css/news.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist/frontend/css/app.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/daterange/daterangepicker.css")); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/fotorama/fotorama.css")); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo-news">
        <?php echo $__env->make('News::frontend.layouts.details.news-breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php
            $title_page = setting_item_with_lang("news_page_list_title");
            if(!empty($custom_title_page)){
                $title_page = $custom_title_page;
            }
        ?>
		<?php if(!empty($title_page)): ?>
            <div class="bravo_banner" <?php if($bg = setting_item("news_page_list_banner")): ?> style="background-image: url(<?php echo e(get_file_url($bg,'full')); ?>)" <?php endif; ?> >
                <div class="container">
                    <h1>
                        <?php echo e($title_page); ?>

                    </h1>
                </div>
            </div>
        <?php endif; ?> 
        <section class="layout-pt-md">
            <div class="container">
                <div class="row y-gap-30 justify-between">
                    <div class="col-xl-8">
                        <?php if($rows->count() > 0): ?>
                            <div class="list-news y-gap-30">
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('News::frontend.layouts.details.news-loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="bravo-pagination">
                                    <?php echo e($rows->appends(request()->query())->links()); ?>

                                    <span class="count-string"><?php echo e(__("Showing :from - :to of :total posts",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger">
                                <?php echo e(__("Sorry, but nothing matched your search terms. Please try again with some different keywords.")); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-3">
                        <div data="slide-up delay-3" class="sidebar -blog">
                            <?php echo $__env->make('News::frontend.layouts.details.news-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tripraja/themes/GoTrip/News/Views/frontend/index.blade.php ENDPATH**/ ?>