<div class="card">
  <div class="card-header">
    <span class="card-title mr- float-left"><h4>#<?php echo e($ticket->id); ?> </h4></span>
    <span class="ml-auto float-right">
        <?php if(! $ticket->completed_at && $close_perm == 'yes'): ?>
                <?php echo link_to_route($setting->grab('main_route').'.complete', trans('ticketit::lang.btn-mark-complete'), $ticket->id,
                                    ['class' => 'btn btn-success']); ?>

        <?php elseif($ticket->completed_at && $reopen_perm == 'yes'): ?>
                <?php echo link_to_route($setting->grab('main_route').'.reopen', trans('ticketit::lang.reopen-ticket'), $ticket->id,
                                    ['class' => 'btn btn-success']); ?>

        <?php endif; ?>
        <?php if($u->isAgent() || $u->isAdmin()): ?>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ticket-edit-modal">
                <?php echo e(trans('ticketit::lang.btn-edit')); ?>

            </button>
        <?php endif; ?>
        <?php if($u->isAdmin()): ?>
            <?php if($setting->grab('delete_modal_type') == 'builtin'): ?>
                <?php echo link_to_route(
                                $setting->grab('main_route').'.destroy', trans('ticketit::lang.btn-delete'), $ticket->id,
                                [
                                'class' => 'btn btn-danger deleteit',
                                'form' => "delete-ticket-$ticket->id",
                                "node" => $ticket->subject
                                ]); ?>

            <?php elseif($setting->grab('delete_modal_type') == 'modal'): ?>
  
                <?php echo CollectiveForm::open(array(
                        'route' => array($setting->grab('main_route').'.destroy', $ticket->id),
                        'method' => 'delete',
                        'style' => 'display:inline'
                   )); ?>

                <button type="button"
                        class="btn btn-danger"
                        data-toggle="modal"
                        data-target="#confirmDelete"
                        data-title="<?php echo trans('ticketit::lang.show-ticket-modal-delete-title', ['id' => $ticket->id]); ?>"
                        data-message="<?php echo trans('ticketit::lang.show-ticket-modal-delete-message', ['subject' => $ticket->subject]); ?>"
                 >
                  <?php echo e(trans('ticketit::lang.btn-delete')); ?>

                </button>
            <?php endif; ?>
                <?php echo CollectiveForm::close(); ?>

  
        <?php endif; ?>
    </span>
  </div>


    <div class="card-body">
        <div class="row">
          <div class="col-2 text-center publisher-wrap">
              <img src="<?php echo e(asset('storage/'.$ticket->user->avatar)); ?>" alt="" width="80px;" class="rounded-circle ">
              <p class="mt-5"><?php echo e($ticket->user_id == $u->id ? $u->name : $ticket->user->name); ?></p>
              <span class="badge" style="padding: 3px 10px;color: #fff;background-color: <?php echo e($ticket->priority->color); ?>">
                  <?php echo e($ticket->priority->name); ?>

              </span>
              <?php if( $ticket->isComplete() && ! $setting->grab('default_close_status_id') ): ?>
                  <span class="badge badge-primary">Complete</span>
              <?php else: ?>
                  <span class="badge" style="padding: 3px 10px;color:#fff;background-color: <?php echo e($ticket->status->color); ?>"><?php echo e($ticket->status->name); ?></span>
              <?php endif; ?>
          </div>
          <div class="col-10">
            <div class="clearfix">
              <div class="row">
                <div class="col-md-6">
                    <p> <strong><?php echo e(trans('ticketit::lang.created')); ?></strong><?php echo e(trans('ticketit::lang.colon')); ?><?php echo e($ticket->created_at->diffForHumans()); ?>  |  <strong><?php echo e(trans('ticketit::lang.last-update')); ?></strong><?php echo e(trans('ticketit::lang.colon')); ?><?php echo e($ticket->updated_at->diffForHumans()); ?> </p>
                </div>
                <div class="col-md-6">
                  <p class="text-right">
                    <strong><?php echo e(trans('ticketit::lang.responsible')); ?></strong><?php echo e(trans('ticketit::lang.colon')); ?><?php echo e($ticket->agent_id == $u->id ? $u->name : $ticket->agent->name); ?>  |  <strong><?php echo e(trans('ticketit::lang.category')); ?></strong><?php echo e(trans('ticketit::lang.colon')); ?>

                    <span style="color: <?php echo e($ticket->category->color); ?>">
                        <?php echo e($ticket->category->name); ?>

                    </span>
                  </p>
                </div>
              </div>
            </div>
            <div class="mt-10 ticket-detail">
              <div class="panel">
                <h5><?php echo e($ticket->subject); ?></h5>
                <?php echo $ticket->html; ?>

              </div>
            </div>
          </div>
        </div>

          <?php echo CollectiveForm::open([
                        'method' => 'DELETE',
                        'route' => [
                                    $setting->grab('main_route').'.destroy',
                                    $ticket->id
                                    ],
                        'id' => "delete-ticket-$ticket->id"
                        ]); ?>

        <?php echo CollectiveForm::close(); ?>

    </div>
</div>

    <?php if($u->isAgent() || $u->isAdmin()): ?>
        <?php echo $__env->make('ticketit::tickets.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>


    <?php if($u->isAdmin()): ?>
        <?php echo $__env->make('ticketit::tickets.partials.modal-delete-confirm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

