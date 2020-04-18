<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{url('purchases')}}" class="brand-logo">আমার বাজার</a>
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
    <li><a class="white-text waves-effect" href="#!"><i class="material-icons white-text">account_circle</i>প্রোফাইল</a>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <!-- <li><a href="#!">Second Link</a></li> -->
    <li><a class="waves-effect white-text" href="{{url('sales')}}"><i class="material-icons white-text">add_box</i>বিক্রয়</a>
    </li>
    <li><a class="waves-effect white-text" href="{{url('orders')}}"><i class="material-icons white-text">add_box</i>অর্ডার
            সমূহ</a></li>
    <li>
        <div class="divider"></div>
    </li>
    <li id="butInstall" hidden><a class="waves-effect white-text"><i
                class="material-icons white-text">arrow_downward</i>ইন্সটল</a></li>
    <li id="butRefresh"><a class="waves-effect white-text"><i class="material-icons white-text">refresh</i>রিফ্রেশ</a>
    </li>
</ul>
