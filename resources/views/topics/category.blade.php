@extends('layouts.web')

@section('content')
<section class="section2">
  <div class="bg-overlay"></div>
    <div class="container">
        <div class="page-title text-center">
          <form class="site-search" method="GET" action="{{url('topics/livesearch')}}">
              @csrf
                 <div class="form-group">
                  <div class="input-group">
                      <i class="material-icons">search</i>
                      <input class="form-control" name="q" type="text" placeholder="Search for answers.."  id="search" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <ul id="results-detail"></ul>
                </div>
          </form>
        </div>
    </div>
</section>

  <section class="section lb">
      <div class="container">
          <div class="row justify-content-around">
              <div class="col-md-11">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-20">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{url('/topics')}}">Topics</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                    </ol>
                  </nav>
                  @foreach ($topics as $key => $value)
                  <div class="card mb-20">
                    <div class="topic-desc">
                        <h4> <a href="{{url($value->categorySlug.'/'.$value->slug)}}">{{$value->title}}</a></h4>
                        <div class="blog-meta clearfix">
                            <small>{{ $value->authorName }}</small>
                            <small>{{ date('F d, Y', strtotime($value->created_at)) }}</small>
                        </div>
                        <p>
                          {{ $value->excerpt }}
                        </p>
                        <div class="">
                          <a class="pull-right btn btn-md btn-transparent btn-default" href="{{url('topics/detail/'.$value->slug)}}">{{trans('web.read_more')}}</a>
                        </div>
                    </div>
                  </div>
                @endforeach
                <div class="row justify-content-around">
                  {{ $topics->links('vendor.pagination.bootstrap-4') }}
                </div>
              </div>
          </div>
      </div>
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
          $('#results-detail').show();
          $('#results-detail').empty();
          if(data.length===0){
            $('#results-detail').append("<li>{trans('web.not_found')}}</li>");
          }else{
            $.each(data, function(index, item) {
                $('#results-detail').append("<li><a href='{{url('topics/detail')}}/"+ data[index].slug + "'><i class='material-icons'>description</i> " + data[index].title + "</a></li>");
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
			$("ul#results-detail").fadeOut();
			$('h4#results-text').fadeOut();
		}else{
			$("ul#results-detail").fadeIn();
			$('h4#results-text').fadeIn();
			$(this).data('timer', setTimeout(search, 100));
		};
	});
});
</script>
@endsection
