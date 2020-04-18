@extends('layouts.app')
@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center light-blue-text">আমার বাজার</h1>
      <div class="row center">
        <h5 class="header col s12 light">আপনার অর্ডার সমূহ</h5>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 z-depth-1">
          <h5>বিক্রয় অর্ডার সমূহ</h5>
          <table class="responsive-table">
            <thead>
              <tr>
                <th>অর্ডার নং</th>
                <th>তারিখ</th>
                <th>মুল্য</th>
                <th>অবস্থা</th>
                <th class="center">বিস্তারিত</th>
                <th class="center">ব্যবস্থা</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>BUY001001</td>
                <td>12-12-2020</td>
                <td>১৫০টাকা</td>
                <td>কনফার্ম হয়েছে</td>
                <td class="center"><a href="{{url('details')}}" class="btn btn-sm light-blue">বিস্তারিত</a></td>
                <td class="center"><button class="btn btn-sm green">চালান দিন</button></td>
              </tr>
              <tr>
                <td>BUY001002</td>
                <td>12-12-2020</td>
                <td>১৫০টাকা</td>
                <td>এখনো কনফার্ম হয়নি</td>
                <td class="center"><a href="{{url('details')}}" class="btn btn-sm light-blue">বিস্তারিত</a></td>
                <td class="center"><button class="btn btn-sm green">কনফার্ম করুন</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col s12 z-depth-1">
          <h5>ক্রয় অর্ডার সমূহ</h5>
          <table class="responsive-table">
            <thead>
              <tr>
                <th>অর্ডার নং</th>
                <th>তারিখ</th>
                <th>মুল্য</th>
                <th>অবস্থা</th>
                <th>বিস্তারিত</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>BUY001001</td>
                <td>12-12-2020</td>
                <td>১৫০টাকা</td>
                <td>কুরিয়ারে আছে</td>
                <td><a href="{{url('details')}}" class="btn btn-sm light-blue">বিস্তারিত</a></td>
              </tr>
              <tr>
                <td>BUY001002</td>
                <td>12-12-2020</td>
                <td>১৫০টাকা</td>
                <td>এখনো কনফার্ম হয়নি</td>
                <td><a href="{{url('details')}}" class="btn btn-sm light-blue">বিস্তারিত</a></td>
              </tr>
            </tbody>
          </table>
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

@endsection
