<?php $__env->startSection('content'); ?>
<section class="section2">
    <div class="bg-overlay"></div>
    <div class="container">
      <div class="row justify-content-center">
          <div class="content col-md-9">
            <div class="page-title text-center">
              <h3 class="text-white pt-20 pb-20">FAQ</h3>
            </div>
          </div>
        </div>
    </div>
</section>

<section class="section lb">
    <div class="container">
        <div class="row justify-content-arround">
          <div class="col-lg-11">
            <div class="faq_wrapper">
              <div class="panel-group" id="accordion">
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="faqHeader"><?php echo e($cat->title); ?></div>
                  <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($faq->category_id == $cat->id): ?>
                     <div class="panel panel-default">
                         <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($faq->id); ?>"><?php echo e($faq->title); ?></a>
                             </h4>
                         </div>
                         <div id="collapse<?php echo e($faq->id); ?>" class="panel-collapse collapse in">
                             <div class="panel-body">
                                 <?php echo e($faq->description); ?>

                             </div>
                         </div>
                     </div>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        <hr class="invis">
      </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>