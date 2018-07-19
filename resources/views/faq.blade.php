@extends('layouts.web')

@section('content')
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
                @foreach($category as $cat)
                  <div class="faqHeader">{{$cat->title}}</div>
                  @foreach($faqs as $faq)
                     @if($faq->category_id == $cat->id)
                     <div class="panel panel-default">
                         <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}">{{$faq->title}}</a>
                             </h4>
                         </div>
                         <div id="collapse{{$faq->id}}" class="panel-collapse collapse in">
                             <div class="panel-body">
                                 {{$faq->description}}
                             </div>
                         </div>
                     </div>
                    @endif
                  @endforeach
                @endforeach
              </div>
            </div>
          </div>
        <hr class="invis">
      </div>
    </div>
</section>

@endsection
