@extends('layouts.mobile')

@section('content')
<section class="section-mobile">
    <div style="padding:2px 8px">
      <form class="mobile-search" method="GET" action="{{url('topics/livesearch')}}">
          @csrf
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
    @foreach($category as $cat)
        @php
          $icon=json_decode($cat->icon,true);
        @endphp
        <li class="pl-15 pr-10"> <a href="{{url('mobile/category/'.$id.'/'.$cat->slug)}}" class="text-uppercase" title=""><img src="{{ Voyager::image($icon[0]['download_link']) }}" class="mr-10"> {{$cat->name}} <i class="material-icons float-right">chevron_right</i></a></li>
      @endforeach
    </ul>
</section>

@endsection

@section('js')
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
				url: "{{url('topics/livesearch')}}",
				data: { query: query_value}, //this can be more complex if needed
				cache: false,
        dataType: "json",
				success: function(data){
					//at each request - every written letter is request, firstly we delete old results, and fetch new ones.
          $('#results').show();
          $('#results').empty();
          if(data.length===0){
            $('#results').append("<li> {{trans('web.not_found')}}</li>");
          }else{
            $.each(data, function(index, item) {
                $('#results').append("<li><a href='{{url('topics/detail')}}/"+ data[index].slug + "'><i class='material-icons'>description</i> " + data[index].title + "</a></li>");
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
@endsection
