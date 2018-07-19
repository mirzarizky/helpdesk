@extends('layouts.web')

@section('content')
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5acdaf244e20f296"></script>
  <section class="section2">
    <div class="bg-overlay"></div>
      <div class="container">
          <div class="page-title text-center">
            <form class="site-search" method="GET" action="{{url('topics/livesearch')}}">
                @csrf
                   <div class="form-group">
                    <div class="input-group">
                        <i class="material-icons">search</i>
                        <input class="form-control" name="q" type="text" placeholder="{{trans('web.topic_search')}} .."  id="search" autocomplete="off">
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
                      <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('web.home')}} </a></li>
                      <li class="breadcrumb-item"><a href="{{url('topics/category/'.$topic->categorySlug)}}">{{ $topic->categoryName }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{$topic->title}}</li>
                    </ol>
                  </nav>
                  <aside class="topic-page topic-list blog-list forum-list single-forum">
                      <article class="well btn-group-sm clearfix">
                          <div class="topic-meta clearfix">
                              <div class="float-right">
                                <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>

                              </div>
                              <!-- end right -->
                          </div>
                          <!-- end topic-meta -->
                          <div class="topic-desc">
                              <h4> {{$topic->title}}</h4>
                              <div class="blog-meta clearfix">
                                  <!-- <img src="{{ Voyager::image( $topic->authorAvatar ) }}" class="avatar img-circle img-responsive"> -->
                                  <small>{{ $topic->authorName }}</small>
                                  <small>{{ date('F d, Y', strtotime($topic->created_at)) }}</small>
                                  <small>in: <a href="{{url('topics/category/'.$topic->categorySlug)}}"> {{ $topic->categoryName }}</a></small>
                              </div>

                              <p>
                                {!! $topic->body !!}
                              </p>

                              <hr class="invis1">

                          </div><!-- end tpic-desc -->
                          <div class="topic-meta clearfix text-center pb-30">
                                  <p>{{trans('web.post_react_title')}} ?</p>
                                  <div class="">
                                    <a class="btn-fab btn-fab-mini mr-15" href="{{url('topics/reaction/1/'.Hashids::encode($topic->id))}}" data-toggle="tooltip" data-placement="bottom" title="Disappointed">
                                        <i class="em em-disappointed"></i>
                                    </a>
                                    <a class="btn-fab btn-fab-mini mr-15" href="{{url('topics/reaction/2/'.Hashids::encode($topic->id))}}" data-toggle="tooltip" data-placement="bottom" title="Natural">
                                      <i class="em em-slightly_smiling_face"></i>
                                    </a>
                                    <a class="btn-fab btn-fab-mini mr-15" href="{{url('topics/reaction/3/'.Hashids::encode($topic->id))}}" data-toggle="tooltip" data-placement="bottom" title="Smiley">
                                      <i class="em em-smiley"></i>
                                    </a>
                                  </div>
                                  @if(Session::has('message'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                  @endif
                          </div>
                          <!-- end topic-meta -->
                      </article>
                  </aside>
              </div><!-- end col -->
          </div><!-- end row -->
      </div><!-- end container -->
  </section><!-- end section -->
@endsection

@section('js')
<script type="text/javascript">

// Search
$(document).ready(function() {
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
