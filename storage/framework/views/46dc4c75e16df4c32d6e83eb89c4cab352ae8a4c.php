<section class="bravo-faq-lists layout-pt-lg layout-pb-lg">
    <div class="container">
        <div class="row justify-center text-center">
            <div class="col-auto">
                <div class="sectionTitle -md pb-30">
                    <h2 class="sectionTitle__title"><?php echo e($title ?? ''); ?></h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0"><?php echo e($desc ?? ''); ?></p>
                </div>
            </div>
        </div>
        <?php if(!empty($list_item)): ?>
            <div class="accordion -simple tr-style y-gap-20 js-accordion">
                        <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <div class="accordion__item">
                                    <div class="pl-15 accordion__button justify-between d-flex items-center">
                                     <div class="button text-dark-1"><?php echo e($item['title']); ?></div>
									 <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                           <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-chevron-up"></i>
                                        </div>
                                        
                                    </div>
                                    <div class="accordion__content">
                                         <div class="pt-10 pl-15">
                                            <p class="text-15"> <?php echo clean($item['sub_title'],'html5-definitions'); ?></p>
                                        </div>
                                    </div>
                                </div> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> 
        <?php endif; ?>
    </div>
</section>
<?php /**PATH /var/www/html/tripraja/themes/GoTrip/Template/Views/frontend/blocks/faq-list.blade.php ENDPATH**/ ?>