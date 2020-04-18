@extends('layouts.app')
@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center light-blue-text">আমার বাজার</h1>
      <div class="row center">
        <h5 class="header col s12 light">আপনার পন্য সমূহ</h5>
        <a data-target="add_product" class="waves-effect waves-light btn right light-blue sidenav-trigger"><i class="material-icons left">add_box</i>নতুন পণ্য যোগ করুন</a>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m3">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="{{asset('content')}}/img/product/anar.jpg">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">আনার<i class="material-icons right">more_vert</i></span>
              <p><a href="edit.html" class="btn light-blue">পরিবর্তন করুন</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">আনার<i class="material-icons right">close</i></span>
              <ul>
                <li>দামঃ ২৫০টাকা কেজি</li>
                <li>মিনিমাম ৫কেজি কিনতে হবে</li>
                <li>স্থানঃ ঢাকা</li>
                <li>বিক্রেতাঃ কামাল মিয়া</li>
                <li>ফোনঃ ০১৭০০০০০০০০</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="{{asset('content')}}/img/product/mango.jpg">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">আম<i class="material-icons right">more_vert</i></span>
              <p><a href="edit.html" class="btn light-blue">পরিবর্তন করুন</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">আম<i class="material-icons right">close</i></span>
              <ul>
                <li>দামঃ ২৫০টাকা কেজি</li>
                <li>মিনিমাম ৫কেজি কিনতে হবে</li>
                <li>স্থানঃ ঢাকা</li>
                <li>বিক্রেতাঃ কামাল মিয়া</li>
                <li>ফোনঃ ০১৭০০০০০০০০</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="{{asset('content')}}/img/product/mango2.jpg">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">ফজলি আম<i class="material-icons right">more_vert</i></span>
              <p><a href="edit.html" class="btn light-blue">পরিবর্তন করুন</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">ফজলি আম<i class="material-icons right">close</i></span>
              <ul>
                <li>দামঃ ২৫০টাকা কেজি</li>
                <li>মিনিমাম ৫কেজি কিনতে হবে</li>
                <li>স্থানঃ ঢাকা</li>
                <li>বিক্রেতাঃ কামাল মিয়া</li>
                <li>ফোনঃ ০১৭০০০০০০০০</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="{{asset('content')}}/img/product/orange.jpg">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">কমলা<i class="material-icons right">more_vert</i></span>
              <p><a href="edit.html" class="btn light-blue">পরিবর্তন করুন</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">কমলা<i class="material-icons right">close</i></span>
              <ul>
                <li>দামঃ ২৫০টাকা কেজি</li>
                <li>মিনিমাম ৫কেজি কিনতে হবে</li>
                <li>স্থানঃ ঢাকা</li>
                <li>বিক্রেতাঃ কামাল মিয়া</li>
                <li>ফোনঃ ০১৭০০০০০০০০</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>

  <div id="add_product" class="side_add_product sidenav">
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <input id="first_name" type="text" class="validate">
            <label for="first_name">পণ্যের নাম</label>
          </div>
          <div class="input-field col s12">
            <input id="last_name" type="text" class="validate">
            <label for="last_name">বিক্রয় মুল্য</label>
          </div>
          <div class="input-field col s12">
            <input id="last_nam" type="text" class="validate">
            <label for="last_nam">স্টক পরিমাণ</label>
          </div>
          <div class="input-field col s12">
            <input id="last_na" type="text" class="validate">
            <label for="last_na">পরিবহণ খরচ</label>
          </div>
          <div class="input-field col s12">
            <input id="last_n" type="text" class="validate">
            <label for="last_n">সর্বনিম্ন বিক্রয় পরিমাণ</label>
          </div>
          <div class="file-field col s12 input-field">
            <div class="btn light-blue">
              <span>ছবি</span>
              <input type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
          <div class="col s12 center">
            <button class="btn light-blue" type="submit">সংরক্ষণ করুন</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- <footer class="page-footer light-blue">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer> -->
@endsection

