@if(Auth::check())
@php
$exp_new_orders = \DB::table('express_orders')->where('read_status','1')->get()->count();
$exp_new_orders_user_confirmed =
\DB::table('express_orders')->where('read_status','0')->where('status','Confirmed')->where('user_status','1')->whereNull('deleted_by')->get()->count();

$exp_new_user_order =
\DB::table('express_orders')->where('user_status','0')->where('status','Confirmed')->where('user_id',Auth::user()->id)->whereNull('deleted_by')->get()->count();
@endphp
@endif
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{url('home')}}"
            class="brand-logo">{{__('welcome.Amar Bazar')}}</a>
        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up right"><i
                class="material-icons">menu</i></a>
    </div>
</nav>

<ul id="slide-out" class="sidenav light-blue">
    @if(Auth::check())
    <li>
        <div class="user-view">
            <div class="background">
                <img src="{{asset('content')}}/img/cover.jpg">
            </div>
            <a href="#user"><img class="circle" src="{{asset('content')}}/img/profile.png"></a>
            <a href="#name"><span class="white-text name">{{Auth::user()->name}}</span></a>
            <a href="#email"><span class="white-text email">{{Auth::user()->email}}</span></a>
        </div>
    </li>
    <li><a class="white-text waves-effect" href="{{route('profiles.show',Auth::user()->id)}}"><i
                class="material-icons white-text">account_circle</i>{{__('nav.Profile')}}</a>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    @endif
    <!-- <li><a href="#!">Second Link</a></li> -->
    <li><a class="waves-effect white-text" href="{{route('sales.index')}}"><i
                class="material-icons white-text">add_box</i>{{__('nav.Sale')}}</a>
    </li>
    <li><a class="waves-effect white-text" href="{{url('orders')}}"><i
                class="material-icons white-text">add_box</i>{{__('nav.Orders')}}</a></li>
    <li>
        @if(Auth::check())
    <li><a class="waves-effect white-text" href="{{url('express-orders')}}"><i
                class="material-icons white-text">add_box</i>{{__('nav.Express Order')}}@if($exp_new_user_order>0)<span
                class="new badge">{{$exp_new_user_order}}</span>@endif</a></li>
    <li>
        @endif
        <div class="divider"></div>
    </li>
    <li id="butInstall" hidden><a class="waves-effect white-text"><i
                class="material-icons white-text">arrow_downward</i>{{__('nav.Install')}}</a></li>

    <li id="butRefresh"><a class="waves-effect white-text"><i
                class="material-icons white-text">refresh</i>{{__('nav.Refresh')}}</a>
    </li>
    @if(Auth::check())
    @can('user-list')

    <li id="butRefresh"><a href="{{ route('users.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">people</i>{{__('nav.Manage_user')}}</a>
    </li>
    <li id="butRefresh"><a href="{{ URL::to('all/orders/for/admin') }}" class="waves-effect white-text"><i
                class="material-icons white-text">apps</i>{{__('nav.Manage_order')}}</a>
    </li>

    <li id="butRefresh"><a href="{{url('admin/express-orders') }}" class="waves-effect white-text"><i
                class="material-icons white-text">apps</i>{{__('nav.Manage_Express_order')}}@if($exp_new_orders>0)<span
                class="new badge">{{$exp_new_orders}}</span>@endif </a>

        {{--User Confired Count
                    @if($exp_new_orders_user_confirmed>0)<span class="new badge" data-badge-caption="q">{{$exp_new_orders_user_confirmed}}</span>@endif
        --}}
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
    @endif
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
        @if(Auth::check())
        <a class="waves-effect white-text" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons white-text">keyboard_return</i>
            {{__('nav.logout')}}
        </a>


        @else

        <a class="waves-effect white-text" href="{{ route('login') }}">
            <i class="material-icons white-text">keyboard_tab</i>
            {{__('nav.login')}}
        </a>
        @endif
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
