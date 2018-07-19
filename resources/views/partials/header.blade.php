<div id="wrapper">
    <header class="header">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-md navbar-light">
              <div class="container">
                  <a class="navbar-brand  logo" href="{{ url('/') }}"> </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                      <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link text-uppercase"  href="{{url('/')}}">{{trans('web.home')}}</a></li>
                        <li><a class="nav-link text-uppercase"  href="{{url('/faq')}}">FAQ</a></li>
                        <li><a class="nav-link text-uppercase"  href="{{url('/forums')}}">{{trans('web.discussions')}}</a></li>
                        <li><a class="nav-link text-uppercase"  href="http://klola.id/blog" target="_blank">Blog</a></li>
                        <li><a class="nav-link text-uppercase"  href="{{url('/tickets/create')}}">{{trans('web.create-ticket')}}</a></li>
                      </ul>

                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto">
                          <!-- Authentication Links -->
                          @guest
                              <li><a class="nav-btn text-uppercase" href="{{ route('login') }}">{{ trans('web.login') }}</a></li>
                          @else
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      Hi, {{ Auth::user()->name }} <span class="caret"></span>
                                  </a>

                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('member') }}">
                                          <i class="material-icons">perm_identity</i>  {{ trans('web.manage-profile') }}
                                      </a>
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          <i class="material-icons">power_settings_new</i>  {{ trans('web.logout') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          @endguest
                          <li class="nav-item dropdown ml-10">
                            <a href="#" class="dropdown-toggle nav-link " data-toggle="dropdown">
                                <span class="flag {{strtolower(App::getLocale())}}"></span> {{ Config::get('languages')[App::getLocale()] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width:90px">
                              @foreach (Config::get('languages') as $lang => $language)
                                  @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag {{strtolower($lang)}}"></span> {{$language}}</a>
                                  @endif
                              @endforeach
                            </div>
                        </li>
                      </ul>
                  </div>
              </div>
            </nav>
        </div><!-- end container -->
    </header><!-- end header -->
