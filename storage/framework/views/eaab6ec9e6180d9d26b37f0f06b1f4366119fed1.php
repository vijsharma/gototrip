<?php $translation = $row->translate();?>
<div class="row y-gap-30 gx-sm-0 gx-xl-4"> 
        <div class="row y-gap-15 gx-sm-0 gx-xl-4 items-center md:justify-center">
            <div class="col-xl-4 col-md-4 px-0">
                <div class="blogCard__image rounded-4">
                    <div class="ratio ratio-1:1">
					<a href="<?php echo e($row->getDetailUrl()); ?>" class="blogCard -type-1 col-12">
                        <?php echo get_image_tag($row->image_id,'medium',['class'=>'img-ratio rounded-4','alt'=>$translation->title,'lazy'=>false]); ?>

						</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-8 y-gap-5"> 
                <h3 class="text-22 text-dark-1">
                    <?php echo clean($translation->title); ?>

                </h3>
				<ul class="d-flex x-gap-10">
                        <li> <?php $category = $row->category; ?>
                        <?php if(!empty($category)): ?>
                            <?php $t = $category->translate(); ?>
                            <?php echo e($t->name ?? ''); ?>

                        <?php endif; ?> </li> 
                        <li><i class="fa fa-clock-o"></i> <?php echo e($row->created_at->diffForhumans()); ?></li>
                    </ul>  
                <div class="text-light-1">
                    <?php echo get_exceprt($translation->content); ?>  
                </div>
				<a href="<?php echo e($row->getDetailUrl()); ?>" class="text-16 d-block read_link"><?php echo e(__('Read More')); ?></a>
            </div>
        </div> 
</div>
<?php /**PATH /var/www/html/tripraja/themes/GoTrip/News/Views/frontend/layouts/details/news-loop.blade.php ENDPATH**/ ?>