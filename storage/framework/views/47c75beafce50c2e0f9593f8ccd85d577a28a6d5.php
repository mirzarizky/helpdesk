<table class="table le-striped ticketit-table"  width="100%">
    <thead>
        <tr>
            <td><?php echo e(trans('ticketit::lang.table-id')); ?></td>
            <td><?php echo e(trans('ticketit::lang.table-subject')); ?></td>
            <td><?php echo e(trans('ticketit::lang.table-status')); ?></td>
            <td><?php echo e(trans('ticketit::lang.table-last-updated')); ?></td>
            <td><?php echo e(trans('ticketit::lang.table-agent')); ?></td>
          <?php if( $u->isAgent() || $u->isAdmin() ): ?>
            <td><?php echo e(trans('ticketit::lang.table-priority')); ?></td>
            <td><?php echo e(trans('ticketit::lang.table-owner')); ?></td>
            <td><?php echo e(trans('ticketit::lang.table-category')); ?></td>
          <?php endif; ?>
        </tr>
    </thead>
</table>
