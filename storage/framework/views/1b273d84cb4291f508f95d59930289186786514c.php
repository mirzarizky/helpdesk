<div class="card">
    <div class="card-header">
        <h4><?php echo e(trans('ticketit::lang.index-my-tickets')); ?>

            <?php echo link_to_route($setting->grab('main_route').'.create', trans('ticketit::lang.btn-create-new-ticket'), null, ['class' => 'btn btn-primary pull-right']); ?>

        </h4>
    </div>

    <div class="card-body">
        <div id="message"></div>
        <?php echo $__env->make('ticketit::tickets.partials.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
