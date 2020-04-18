@extends('layouts.app')
@section('pagetitle','Cart-AmarBazar')

@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">আমার বাজার</h1>
        <div class="row center">
            <h5 class="header col s12 light">একসাথে সবকিছু</h5>
        </div>
    </div>
</div>


<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12">
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
            <div class="col s12">
                <button class="btn light-blue right waves-effect waves-light">কনফার্ম করুন</button>
            </div>
        </div>

    </div>
    <br><br>
</div>


@endsection
