<?php if($translation->trip_ideas): ?>
    <section class="layout-pb-md">
        <div class="container">
		<div class="row">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title"><?php echo e(__("Top sights in  :text",['text'=>$translation->name])); ?></h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0"><?php echo e(__('These popular destinations have a lot to offer')); ?></p>
                </div>
            </div>
        </div>
        <div class="row y-gap-30 pt-40">
            <?php if(!empty($translation->trip_ideas)): ?>
                <?php if(!is_array($translation->trip_ideas)) $translation->trip_ideas = json_decode($translation->trip_ideas); ?>
                <?php $__currentLoopData = $translation->trip_ideas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$trip_idea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="col-md-6 col-lg-6 col-sm-6">
            <div class="rounded-4 border-light">
               <div class="d-flex sm:fd-col flex-wrap">
                <div class="col-sm-12 col-md-4 col-lg-5">
                  <div class="col-auto">
                    <div class="ratio ratio-1:1">
					<?php if($trip_idea['image_id']): ?>
                         <?php echo get_image_tag($trip_idea['image_id'],'full',['class'=>'img-ratio','lazy'=>false]); ?>

                     <?php endif; ?>
					 </div>
                  </div>
                </div>

                <div class="col">
                  <div class="dflx flex-column h-full sm:py-10 sm:px-10 px-20 py-20">
                    <h3 class="text-18 fw-500"> <?php echo e(get_exceprt($trip_idea['title'],45,'...')); ?> </h3>
                                        <p class="text-15 mt-5"><?php echo e(get_exceprt($trip_idea['content'],55,'...')); ?></p>
                    <a href="<?php echo e($trip_idea['link']); ?>" class="d-block text-14 text-blue-1 fw-500 underline mt-5"><?php echo e(__("See More")); ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
		 </div>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/html/tripraja/themes/GoTrip/Location/Views/frontend/layouts/details/location-trip-idea.blade.php ENDPATH**/ ?>