@extends('layouts.app')
@section('pagetitle','Order-AmarBazar')

@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center light-blue-text">আমার বাজার</h1>
      <div class="row center">
        <h5 class="header col s12 light">আপনার অর্ডার বিস্তারিত</h5>

      </div>
    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row z-depth-1">
        <div class="col s12 m4">
          <p>
            ক্রেতার নামঃ করিম উদ্দিন <br>
            ফোনঃ ০১৭২২২২২২২২২২২ <br>
            ঠিকানাঃ ঢাকা।
          </p>
          </td>
        </div>
        <div class="col s12 m4">
          <p>
            বিক্রেতার নামঃ রহিম উদ্দিন <br>
            ফোনঃ ০১৭৩৩৩৩৩৩৩৩৩৩ <br>
            ঠিকানাঃ ঠাকুর গাঁও
          </p>
          </td>
        </div>
        <div class="col s12 m4">
          <p>
            অবস্থাঃ কুরিয়ারে আছে <br>
            অর্ডার নংঃ BUY001001 <br>
            নোটঃ বুকিং মেমো নংঃ ১২৪৮
          </p>
          </td>
        </div>
      </div>

      <div class="row">
        <div class="col s12 z-depth-1">
          <table class="responsive-table">
            <thead>
              <tr>
                <th>পন্যের নাম</th>
                <th>পরিমাণ</th>
                <th>দর</th>
                <th>দাম</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>আম</td>
                <td>২০কেজি</td>
                <td>১৫০টাকা</td>
                <td>৩০০০টাকা</td>
              </tr>
              <tr>
                <td>আম</td>
                <td>২০কেজি</td>
                <td>১৫০টাকা</td>
                <td>৩০০০টাকা</td>
              </tr>
              <tr>
                <td>আম</td>
                <td>২০কেজি</td>
                <td>১৫০টাকা</td>
                <td>৩০০০টাকা</td>
              </tr>
            </tbody>
          </table>
          <p class="center">মোটঃ ৯০০০টাকা</p>
        </div>
      </div>
    </div>
    <br><br>
  </div>

  @endsection
