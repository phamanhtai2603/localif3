@extends('page.main.layouts.masterpage')
@section('title')
    Tour
@endsection
@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600">
  <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
  <style>
    #slider {
  position: relative;
  overflow: hidden;
  margin: 20px auto 0 auto;
  border-radius: 4px;
  }

  #slider ul {
    position: relative;
    margin: 0;
    padding: 0;
    height: 200px;
    list-style: none;
  }

  #slider ul li {
    position: relative;
    display: block;
    float: left;
    margin: 0;
    padding: 0;
    width: 500px;
    height: 300px;
    background: #ccc;
    text-align: center;
    line-height: 300px;
  }

  a.control_prev, a.control_next {
    position: absolute;
    top: 40%;
    z-index: 999;
    display: block;
    padding: 4% 3%;
    width: auto;
    height: auto;
    background: #2a2a2a;
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    font-size: 18px;
    opacity: 0.8;
    cursor: pointer;
  }

  a.control_prev:hover, a.control_next:hover {
    opacity: 1;
    -webkit-transition: all 0.2s ease;
  }

  a.control_prev {
    border-radius: 0 2px 2px 0;
  }

  a.control_next {
    right: 0;
    border-radius: 2px 0 0 2px;
  }

  .slider_option {
    position: relative;
    margin: 10px auto;
    width: 160px;
    font-size: 18px;
  }

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
    .checked{
    color: orange;
    }
    .orange{
    color: 	#F06757
    }
  </style>
@endsection
@section('content')
{{-- Bìa cover --}}
@include('page.main.layouts.cover')
{{-- Hết bìa cover --}}
<div class="site-section bg-light">
    <div class="container">
       <form id="data_add" action="{{ route('tourmanage.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate=""> 
       @csrf
        <div class="row">
            <div class="col-md-7 mb-5">
                <h1 class=" font-weight-light orange" style="color: #F58543;">ADD NEW TOUR POST! </h1>
                <br>
                <div  class="p-5 bg-white">
                <p style="font-family: 'Times New Roman', Times, serif; font-size:25px">ABOUT MY SPECIAL TOUR</p>
                    <div>
                        <div class=""><textarea name="content" id="editor" rows="13" cols="9" placeholder="Tell about your tour, which make your tour special. You better write in the best look.. !" class="form-control" data-parsley-trigger="change" required=""></textarea></div>
                        @if($errors->has('content'))
                            <small class="text-danger w-100">
                                {{$errors->first('content')}}
                            </small>
                        @endif
                    </div>
                </div>
                <br>
                <div  class="p-5 bg-white">
                    <p style="font-family: 'Times New Roman', Times, serif; font-size:25px">PLAN</p>
                    <div>
                        <div class=""><textarea name="plan" id="editor" rows="13" cols="9" placeholder="How is the plan? Make a clear plan you want!" class="form-control" data-parsley-trigger="change" required=""></textarea></div>
                        @if($errors->has('plan'))
                            <small class="text-danger w-100">
                                {{$errors->first('plan')}}
                            </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-5">
            
            
            
            <div class="p-4 mb-3 bg-white">
                <div class="row form-group">
                <div class="row">
                    <div class="col-md-3" text-align="right"><h4>Select Images</h4></div>
                    <div class="col-md-6">
                        <input type="file" name="file[]" id="file" accept="image/*" multiple required />
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        0%
                    </div>
                </div>
                <br />
                <div id="success" class="row">

                </div>
                @if ($errors->has('image'))
                    <small class="form-control-feedback text text-danger">
                        {{ $errors->first('image') }}
                    </small>
                @endif
                </div>
                <input type="text" name="name" placeholder="Enter tour name" value="{{old('name')}}" class="form-control" data-parsley-trigger="change" required minlength="3" maxlength="55">
                <div style="text-align:center">
                <p style="font-size:20px"><b>Location: </b>
                    <select name="location_id" class="form-control" data-parsley-trigger="change" required >
                        @if (count($locations) > 0)
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name}}
                                    @if($location->status==1)
                                    <span class="text text-danger">{{ ' * This location is locked * '}}</span>
                                    @endif
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('location_id'))
                    <small class="form-control-feedback text text-danger">
                        {{ $errors->first('location_id') }}
                    </small>
                    @endif
                </p>
                <p style="font-size:20px"><b>PRICE(VND)/MAN/DAY: 
                        <input type="text" name="price" placeholder="ex: 1000000"
                        value="{{old('price')}}" class="form-control" data-parsley-trigger="change" required minlength="3">        
                </p>
                @if ($errors->has('price'))
                <small class="form-control-feedback text text-danger">
                    {{ $errors->first('price') }}
                </small>
                @endif
                </div>

                <div class=""><textarea name="description" id="" rows="9" cols="9" placeholder="Some description.." class="form-control" data-parsley-trigger="change" required="" maxlength="800"></textarea></div>
                @if($errors->has('description'))
                    <small class="text-danger w-100">
                        {{$errors->first('description')}}
                    </small>
                @endif
                <br>
                <button type="submit" class="btn btn-primary px-4 py-2 text-white">
                        <i class="fa fa-dot-circle-o"></i> Create!
                </button>
            </div>
            </div>
       </form>
      </div>
    </div>
</div>

@endsection

@section('script')
<script>
    jQuery(document).ready(function ($) {

    $('#checkbox').change(function(){
      setInterval(function () {
          moveRight();
      }, 3000);
    });

    var slideCount = $('#slider ul li').length;
    var slideWidth = $('#slider ul li').width();
    var slideHeight = $('#slider ul li').height();
    var sliderUlWidth = slideCount * slideWidth;

    $('#slider').css({ width: slideWidth, height: slideHeight });

    $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

      $('#slider ul li:last-child').prependTo('#slider ul');

      function moveLeft() {
          $('#slider ul').animate({
              left: + slideWidth
          }, 200, function () {
              $('#slider ul li:last-child').prependTo('#slider ul');
              $('#slider ul').css('left', '');
          });
      };

      function moveRight() {
          $('#slider ul').animate({
              left: - slideWidth
          }, 200, function () {
              $('#slider ul li:first-child').appendTo('#slider ul');
              $('#slider ul').css('left', '');
          });
      };

      $('a.control_prev').click(function () {
          moveLeft();
      });

      $('a.control_next').click(function () {
          moveRight();
      });

    });    

  </script>
  {{-- xem anh trc khi upload --}}
  <script src="admin_page_asset/js/validation/jquery.min.js"></script>
  <script src="admin_page_asset/js/ckeditor.js"></script>
  <script>
          ClassicEditor
          .create( document.querySelector( '#editor' ) )
          .catch( error => {
              console.error( error );
          } );
  </script>

  {{-- validation with parsley js --}}
  <script src="admin_page_asset/js/validation/parsley.min.js"></script>

  {{-- multi image --}}
  <script>
      $(document).ready(function(){
          $('form').ajaxForm({
              beforeSend:function(){
                  $('#success').empty();
                  $('.progress-bar').text('0%');
                  $('.progress-bar').css('width', '0%');
              },
              uploadProgress:function(event, position, total, percentComplete){
                  $('.progress-bar').text(percentComplete + '0%');
                  $('.progress-bar').css('width', percentComplete + '0%');
              },
              success:function(data)
              {
                  if(data.success)
                  {
                      $('#success').html('<div class="text-success text-center"><b>'+data.success+'</b></div><br /><br />');
                      $('#success').append(data.image);
                      $('.progress-bar').text('Uploaded');
                      $('.progress-bar').css('width', '100%');
                  }
              }
          });
      });
    </script>
@endsection