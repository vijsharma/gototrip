<?php switch($style_list):
    case ('carousel_v2'): ?>
    <?php case ('carousel'): ?> <?php echo $__env->make('Hotel::frontend.blocks.list-hotel.carousel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php break; ?>
    <?php case ('normal2'): ?> <?php echo $__env->make('Hotel::frontend.blocks.list-hotel.normal2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php break; ?>
    <?php default: ?> <?php echo $__env->make('Hotel::frontend.blocks.list-hotel.normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endswitch; ?>

<?php /**PATH /Applications/MAMP/htdocs/gototrip/themes/GoTrip/Hotel/Views/frontend/blocks/list-hotel/index.blade.php ENDPATH**/ ?>