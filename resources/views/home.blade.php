@extends('layouts.web')

@section('content')
<section class="section welcome bg1">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="content col-md-9">
                <div class="welcome-text text-center">
                    <h1>{!!trans('web.home_title')!!}</h1>
                    <p>{{trans('web.home_desc')}}</p>
                </div>
                <div class="widget clearfix">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <form class="site-search" method="GET" action="{{url('topics/livesearch')}}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                      <i class="material-icons">search</i>
                                      <input class="form-control" name="q" type="text" placeholder="{{trans('web.home_search')}}" id="search" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <ul id="results"></ul>
                                </div>
                            </form><!-- end well -->
                        </div>
                    </div>
                </div><!-- end widget -->
            </div><!-- end col -->
        </div><!-- end container -->
    </div><!-- end container -->
</section><!-- end section -->

<section class="section lb">
    <div class="container">
        <div class="row justify-content-arround">

          @foreach($category as $cat)

            <div class="col-md-4 mb-30">
                <div class="widget">
                    <div class="custom-module">
                        <h4 class="module-title"><i class="material-icons">web</i> {{$cat->name}}</h4>
                        <div class="list-group">
                            @foreach($post as $p)
                             @if($p->category_id == $cat->id)
                              <div class="list-group-item">
                                 <p class="list-group-item-heading"><a href="{{url('topics/detail/'.$p->slug)}}"><i class="material-icons">description</i>{{$p->title}}</a></p>
                              </div>
                            @endif
                            @endforeach
                        </div>
                        <a href="{{url('topics/category/'.$cat->slug)}}" class="readmore" title="">{{trans('web.view_all')}} →</a>
                    </div><!-- end custom-module -->
                </div><!-- end widget -->
            </div><!-- end col -->

            @endforeach
        <hr class="invis">
    </div><!-- end container -->
</section><!-- end section -->

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
