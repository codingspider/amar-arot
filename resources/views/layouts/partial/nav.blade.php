<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{url('purchases')}}"
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
            <a href="#name"><span class="white-text name">John Doe</span></a>
            <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div>
    </li>
    <li><a class="white-text waves-effect" href="#!"><i
                class="material-icons white-text">account_circle</i>{{__('nav.Profile')}}</a>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <!-- <li><a href="#!">Second Link</a></li> -->
    <li><a class="waves-effect white-text" href="{{url('sales')}}"><i
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
    <li id="butRefresh"><a href="{{ route('users.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">people</i>{{__('nav.Manage_user')}}</a>
    </li>
    <li id="butRefresh"><a  href="{{ route('roles.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">device_hub</i>{{__('nav.Manage_role')}}</a>
    </li>
    <li id="butRefresh"><a  href="{{ route('products.index') }}" class="waves-effect white-text"><i
                class="material-icons white-text">local_offer</i>{{__('nav.Manage_product')}}</a>
    </li>


    <li>
        <div class="divider"></div>
    </li>
     

    @if(App::getLocale() == 'en')
    <li>
        <a class="waves-effect white-text" href="{{url('/locale/bn')}}">
            <i class="material-icons white-text">airplanemode_active</i>
            বাংলা
        </a>
    </li>
    @else
    <li>
        <a class="waves-effect white-text" href="{{url('/locale/en')}}">
            <i class="material-icons white-text">airplanemode_active</i>
            English
        </a>
    </li>
    @endif
    <li>
         <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>


    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </li>
</ul>

