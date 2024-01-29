<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/location/css/location.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset(" libs ion_rangeslider css ion.rangeSlider.min.css")); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset(" libs fotorama fotorama.css")); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo_detail_location">
		<section class="layout-pb-md"> 
				<?php echo $__env->make('Location::frontend.layouts.details.location-banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
		</section>
		<section class="layout-pb-md">
			<div class="container">
				<?php echo $__env->make('Location::frontend.layouts.details.location-overview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				 </div>
		</section> 
		  <section class="layout-pb-md">
			<div class="container">
				<?php echo $__env->make('Location::frontend.layouts.details.location-map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				 </div>
		</section>  
		<?php echo $__env->make('Location::frontend.layouts.details.location-service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->make('Location::frontend.layouts.details.location-trip-idea', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
		<section class="layout-pb-md">
			<div class="container">
				<?php echo $__env->make('Location::frontend.layouts.details.location-general-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			    </div>
		</section>
		<div class="footernav">
            <ul class="d-flex text-15 items-center h_swap">
               <li> <a href=""><i class="icon-search"></i> Details</a> </li>
               <li> <a href=""><i class="icon-ticket"> </i> Tours </a> </li>
               <li> <a href=""><i class="icon-heart"></i> Events </a> </li>
               <li> <a href=""><i class="icon-menu-2"></i> Attractions </a> </li> 
               <li> <a href=""><i class="icon-location"></i> Menu </a> </li>
            </ul>
         </div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>
        jQuery(function ($) {
            <?php if($row->map_lat && $row->map_lng): ?>
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [<?php echo e($row->map_lat); ?>, <?php echo e($row->map_lng); ?>],
                zoom:<?php echo e($row->map_zoom ?? "8"); ?>,
                ready: function (engineMap) {
                    engineMap.addMarker([<?php echo e($row->map_lat); ?>, <?php echo e($row->map_lng); ?>], {
                        icon_options: {}
                    });
                }
            });
            <?php endif; ?>
        })
    </script>
	<script type="text/javascript" src="<?php echo e(asset(" libs ion_rangeslider js ion.rangeSlider.min.js")); ?>">< script>
	<script type="text/javascript" src="<?php echo e(asset(" libs fotorama fotorama.js")); ?>">< script>
	<script type="text/javascript" src="<?php echo e(asset(" libs sticky jquery.sticky.js")); ?>">< script> <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tripraja/themes/GoTrip/Location/Views/frontend/detail.blade.php ENDPATH**/ ?>