<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{url('home')}}"
            class="brand-logo">{{__('welcome.Amar Bazar')}}</a>
        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up right"><i
                class="material-icons">menu</i></a>
    </div>
</nav>
<ul id="slide-out" class="sidenav light-blue">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="{{asset('content')}}/img/cover.jpg">
            </div>
            <a href="#user"><img class="circle" src="{{asset('content')}}/img/profile.png"></a>
            <a href="#name"><span class="white-text name">@if(Auth::check()){{Auth::user()->name}}@endif</span></a>
            <a href="#email"><span class="white-text email">@if(Auth::check()){{Auth::user()->email}}@endif</span></a>
        </div>
    </li>
    <li><a class="white-text waves-effect" href="@if(Auth::check()){{route('profiles.show',Auth::user()->id)}}@endif"><i
        class="material-icons white-text">account_circle</i>{{__('nav.Profile')}}</a>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <!-- <li><a href="#!">Second Link</a></li> -->
    <li><a class="waves-effect white-text" href="{{route('sales.index')}}"><i
                class="material-icons white-text">add_box</i>{{__('nav.Sale')}}</a>
    </li>
    <li><a class="waves-effect white-text" href="{{url('orders')}}"><i
                class="material-icons white-text">add_box</i>{{__('nav.Orders')}}</a></li>
    <li>
        <div class="divider"></div>
    </li>
    <li id="butInstall" hidden><a class="waves-effect white-text"><i
                class="material-icons white-text">arrow_downward</i>{{__('nav.Install')}}</a></li>

    <li id="butRefresh"><a class="waves-effect white-text"><i
                class="material-icons white-text">refresh</i>{{__('nav.Refresh')}}</a>
    </li>
    @can('user-list')

    <li id="butRefresh"><a href="{{ route('users.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">people</i>{{__('nav.Manage_user')}}</a>
    </li>
    <li id="butRefresh"><a href="{{ route('roles.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">device_hub</i>{{__('nav.Manage_role')}}</a>
    </li>
    <li id="butRefresh"><a href="{{ route('products.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">local_offer</i>{{__('nav.Manage_product')}}</a>
    </li>
    <li id="butRefresh"><a href="{{ route('catagories.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">palette</i>{{__('nav.catagory')}}</a>
    </li>
    <li id="butRefresh"><a href="{{ route('settings.create') }}" class="waves-effect white-text"><i
                class="material-icons white-text">build</i>{{__('setting.setting_create')}}</a>
    </li>
    <li id="butRefresh"><a href="{{ route('headers.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">format_align_justify</i>{{__('setting.header_create')}}</a>
    </li>
    <li id="butRefresh"><a href="{{ route('socials.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">device_hub</i>{{__('setting.social_create')}}</a>
    </li>
    <li id="butRefresh"><a href="{{ route('measurments.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">palette</i>{{__('nav.measurments')}}</a>
    </li>
    <li id="butRefresh"><a href="{{ route('coupons.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">local_offer</i>{{__('cart.coupons')}}</a>
    </li>
    @endcan
    <li>
        <div class="divider"></div>
    </li>


    @if(App::getLocale() == 'en-US')
    <li>
        <a class="waves-effect white-text" href="{{url('/locale/bn-BD')}}">
            <i class="material-icons white-text">airplanemode_active</i>
            বাংলা
        </a>
    </li>
    @else
    <li>
        <a class="waves-effect white-text" href="{{url('/locale/en-US')}}">
            <i class="material-icons white-text">airplanemode_active</i>
            English
        </a>
    </li>
    @endif
    <li>
        <a class="waves-effect white-text" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons white-text">keyboard_return</i>
            {{__('nav.logout')}}
        </a>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
