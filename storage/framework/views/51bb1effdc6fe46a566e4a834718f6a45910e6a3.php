<?php $__env->startSection('content'); ?>
<section class="section-mobile">
    <div style="padding:2px 8px">
      <form class="mobile-search" method="GET" action="<?php echo e(url('topics/livesearch')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group mt-5 mb-0">
              <div class="input-group">
                <i class="material-icons">search</i>
                <input class="form-control" name="q" type="text" placeholder="Search for information here" id="search" autocomplete="off">
              </div>
          </div>
          <ul id="results"></ul>
      </form>
    </div>
</section>

<section class="section-mobile-content">
    <ul class="mobile-help">
    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $icon=json_decode($cat->icon,true);
        ?>
        <li class="pl-15 pr-10"> <a href="<?php echo e(url('mobile/category/'.$id.'/'.$cat->slug)); ?>" class="text-uppercase" title=""><img src="<?php echo e(Voyager::image($icon[0]['download_link'])); ?>" class="mr-10"> <?php echo e($cat->name); ?> <i class="material-icons float-right">chevron_right</i></a></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">

// Search
$(document).ready(function() {
	// Icon Click Focus
	$('div.icon').click(function(){
		$('input#search').focus();
	});
	// Live Search
	// On Search Submit and Get Results
	function search() {
		var query_value = $('input#search').val();
 		$('b#search-string').text(query_value);
		if(query_value !== ''){
			$.ajax({
				type: "GET",
				url: "<?php echo e(url('topics/livesearch')); ?>",
				data: { query: query_value}, //this can be more complex if needed
				cache: false,
        dataType: "json",
				success: function(data){
					//at each request - every written letter is request, firstly we delete old results, and fetch new ones.
          $('#results').show();
          $('#results').empty();
          if(data.length===0){
            $('#results').append("<li> <?php echo e(trans('web.not_found')); ?></li>");
          }else{
            $.each(data, function(index, item) {
                $('#results').append("<li><a href='<?php echo e(url('topics/detail')); ?>/"+ data[index].slug + "'><i class='material-icons'>description</i> " + data[index].title + "</a></li>");
            });
          }

				}
			});
		}
    return false;
	}
	$("input#search").on("keyup", function(e) {
		// Set Timeout
		clearTimeout($.data(this, 'timer'));
		// Set Search String
		var search_string = $(this).val();
		// Do Search
		if (search_string == '') {
			$("ul#results").fadeOut();
			$('h4#results-text').fadeOut();
		}else{
			$("ul#results").fadeIn();
			$('h4#results-text').fadeIn();
			$(this).data('timer', setTimeout(search, 100));
		};
	});
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mobile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>