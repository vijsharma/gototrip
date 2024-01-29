<?php
$popup = \Modules\Popup\Models\Popup::getActive(request());
if(!$popup) return;
$translation = $popup->translate(request('lang',app()->getLocale()));
?>
<div class="modal fade bc_popup gotrip-login-modal" id="login" tabindex="-1"  aria-modal="true" role="dialog" id="bc_popup_<?php echo e($popup->id); ?>" data-days="<?php echo e($popup->expired_days); ?>">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content relative">
            <div class="modal-header border-dashed">
                <h4 class="modal-title">
                    <?php echo e($translation->title); ?>

                </h4>
                <span class="c-pointer" data-bs-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa">
                         <img src="<?php echo e(url('images/ico_close.svg')); ?>" alt="close">
                    </i>
                </span>
            </div>
            <div class="modal-body relative">
                <?php echo clean($translation->content); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\Projects\tripraja\themes/GoTrip/Popup/Views/frontend/popup.blade.php ENDPATH**/ ?>