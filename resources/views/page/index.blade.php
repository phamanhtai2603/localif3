@extends('page.main.layouts.masterpage')
@section('title')
    Homepage
@endsection

@section('css')
  <style>
    .t-price{
      margin: 0px;
      position: relative;
      top: 16px;
    }
    .t-name{
      padding: 5px;
      margin: 0px;
      transition: none 0s ease 0s;
      cursor: move;
      position: relative;
      top: 17px;
    }
  </style>
@endsection

@section('content')
   

    {{-- Bìa cover --}}
    @include('page.main.layouts.cover')
    {{-- Hết bìa cover --}}

    {{-- Location --}}
    @include('page.main.layouts.location')
    {{-- Hết location --}}

    {{-- intro  --}}
    @include('page.main.layouts.intro')
    {{-- hết intro --}}
 
    {{-- mission --}}
     @include('page.main.layouts.mission')
    {{-- hết mission --}}


    <div class="site-section">
<div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center">
        <h2 class="font-weight-light text-black">Choose your favourite local</h2>
        <p class="color-black-opacity-5">View all</p>
      </div>
    </div>
    <div class="row">
      @foreach($tours as $tour)     
        <?php 
           $arr_image = explode ( ',' , $tour->image,-1);
        ?>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
          <a href="{{ route('get-page-tourdetail-view',['id'=>$tour->id]) }}" class="unit-1 text-center">
            <img src="images/{{ $arr_image[1] }}" style="width:350px;height:400px;" alt="Image" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading t-name" style="padding: 5px; margin:0px">{{ $tour->name }}</h3>
              <strong class="text-primary mb-2 d-block t-price" style="margin:0px">{{ $tour->price }} VND</strong>
              <p style="padding: 5px; font-size:15px ; margin:0px " class="color-white-opacity-5">{{ $tour->location->name }} </p>
              
            </div>
          </a>
        </div>
      @endforeach
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
        <a href="#" class="unit-1 text-center">
          <img src="page_asset/images/03-japan.jpg" alt="Image" class="img-fluid">
          <div class="unit-1-text">
            <strong class="text-primary mb-2 d-block">$390</strong>
            <h3 class="unit-1-heading">Mount Fuji, Japan</h3>
          </div>
        </a>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
        <a href="#" class="unit-1 text-center">
          <img src="page_asset/images/04-dubai.jpg" alt="Image" class="img-fluid">
          <div class="unit-1-text">
            <strong class="text-primary mb-2 d-block">$320</strong>
            <h3 class="unit-1-heading">Camels, Dubai</h3>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
        <a href="#" class="unit-1 text-center">
          <img src="page_asset/images/05-london.jpg" alt="Image" class="img-fluid">
          <div class="unit-1-text">
            <strong class="text-primary mb-2 d-block">$290</strong>
            <h3 class="unit-1-heading">Elizabeth Tower, London</h3>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
        <a href="#" class="unit-1 text-center">
          <img src="page_asset/images/06-australia.jpg" alt="Image" class="img-fluid">
          <div class="unit-1-text">
            <strong class="text-primary mb-2 d-block">$390</strong>
            <h3 class="unit-1-heading">Opera House, Australia</h3>
          </div>
        </a>
      </div>
      <div style="margin:auto; font-size: 30px; ">
        <a href="about.html">View all</a>
      </div>
    </div>
  </div>
  
  <br />
      {{-- intro team --}}
      @include('page.main.layouts.team_intro')
      {{-- hết intro team --}}
@endsection