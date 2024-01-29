<?php
    $translation = $row->translate();
    $layout_style = $layout_style ?? '';
?>
<div class="tourCard -type-1 rounded-4 ">
    <div class="tourCard__image">
        <div class="cardImage ratio ratio-4:3">
            <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl()); ?>">
                <div class="cardImage__content">
                    <?php if($row->image_url): ?>
                        <?php if(!empty($disable_lazyload)): ?>
                            <img  src="<?php echo e($row->image_url); ?>" class="img-responsive rounded-4 col-12 js-lazy" alt="">
                        <?php else: ?>
                            <?php echo get_image_tag($row->image_id,'medium',['class'=>'img-responsive rounded-4 col-12 js-lazy','alt'=>$translation->title]); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </a>
            <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
                <div class="cardImage__wishlist">
                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                        <i class="icon-heart text-12"></i>
                    </button>
                </div>
            </div>
            <div class="cardImage__leftBadge">
                <?php if($row->is_featured == "1"): ?>
                    <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-yellow-1 text-dark-1">
                        <?php echo e(__("Featured")); ?>

                    </div>
                <?php endif; ?>
                <?php if($row->discount_percent): ?>
                    <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-blue-1 text-white mt-5">
                        <?php echo e(__("Sale off :number",['number'=>$row->discount_percent])); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="tourCard__content mt-10">
        <div class="d-flex x-gap-10 items-center lh-14 mb-5">
            <div class="text-14 d-flex md:text-13 items-center text-light-1"><i class="icon-clock text-blue-1 mr-5"></i> <?php echo e(duration_format($row->duration,true)); ?></div> 
			<?php if(!empty($row->location->name)): ?>
            <?php $location = $row->location->translate() ?>
            <div class="text-14 d-flex md:text-13 items-center text-light-1"> <i class="icon-location-2 text-blue-1 mr-5"></i> <?php echo e($location->name); ?></div>
			<?php endif; ?>
        </div>
        <h4 class="tourCard__title text-dark-1 text-18 sm:text-15 fw-500">
            <a class="text-dark-1-i" <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl()); ?>"> <span><?php echo e($translation->title); ?></span></a>
        </h4> 
        <div class="row justify-between items-center">
            <div class="col-auto">
                <?php if(setting_item('tour_enable_review')): ?>
                        <?php $reviewData = $row->getScoreReview(); $score_total = $reviewData['score_total'];?>
                    <div class="d-flex items-center">
                        <?php echo $__env->make('Layout::common.rating',['score_total'=>$score_total], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="text-14 sm:text-12 text-light-1 ml-10">
                            <?php if($reviewData['total_review'] > 1): ?>
                                <?php echo e(__(":number Reviews",["number"=>$reviewData['total_review'] ])); ?>

                            <?php else: ?>
                                <?php echo e(__(":number Review",["number"=>$reviewData['total_review'] ])); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-auto">
                <div class="text-14 text-light-1">
                    <?php echo e(__('from')); ?>

                    <span class="text-14 text-red-1 line-through d-inline-flex"><?php echo e($row->display_sale_price); ?></span>
                    <span class="fw-500 text-dark-1 d-inline-flex"><?php echo e($row->display_price); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/tripraja/themes/GoTrip/Tour/Views/frontend/layouts/search/loop-grid.blade.php ENDPATH**/ ?>