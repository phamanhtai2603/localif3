@extends('page.main.layouts.masterpage')
@section('title')
    Tour Manage
@endsection
@section('css')
<link rel="stylesheet" href="page_asset/css/style.css">

@endsection
@section('content')
{{-- Bìa cover --}}
@include('page.main.layouts.cover')
{{-- Hết bìa cover --}}

<div class="site-section bg-light">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mr-2">Your TOURS</strong>
                    <a class="btn btn-primary" href="{{ route('tourmanage.create') }}"><i class="fa fa-plus"></i>ADD MORE </a>
                    @if(session('success'))
                    <small id="success" class="alert alert-success p-2">
                        {{session('success')}}
                    </small>
                    @endif
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Location </th>
                                <th>Price</th>
                                <th>Status</th>
                                <th class="mw-241"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if (!empty($tour) ) --}}
                            @foreach ($tours as $tour)
                            <tr>
                                
                                <td class="text-center">{{$stt++}}</td>
                                <td>{{ $tour->name }}</td>
                                <td>{{$tour->created_at}}</td>
                                <td>{{$tour->location->name}}</td>
                                <td>{{$tour->price}}</td>
                                <td>
                                    @if($tour->status == 0)
                                        <span class="text-success">{{'Hoạt động'}}</span>
                                    @else
                                        <span class="text-danger">{{'Vô Hiệu Hóa'}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm btn-op" href="" data-toggle="modal" data-target="#myModal{{$tour->id}}" data-backdrop="true"><span><i class="fa fa-eye"></i></span> Xem</a>
                                    <a class="btn btn-warning btn-sm btn-op" href=""><span><i class="fa fa-edit"></i></span> Sửa</a>
                                    <a class="btn btn-danger btn-sm btn-op" href="" data-toggle="modal" data-target="#myModalDel{{$tour->id}}" data-backdrop="true"><span><i class="fa fa-trash"></i></span> Xoá</a>
                                </td>
                                {{-- modal --}}
                                <!-- The Modal -->
                                <div class="modal fade" id="myModal{{$tour->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Thông tin tour</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="my-center my-center-95">
                                                    <div class="row">
                                                        <div class="col-4"></div>
                                                        <div class="col-4">
                                                        <a class="btn btn-success btn-sm btn-op" href="" data-toggle="modal" data-target="#myModal2{{$tour->id}}" data-backdrop="true"><span><i class="fa fa-eye"></i></span> Xem ảnh</a> 
                                                        </div>
                                                        <div class="col-4"></div>
                                                    </div>
                                                    <h4 class="text-center mt-2">{{$tour->name}}</h4>
                                                        @if ($tour->status == 0)
                                                            <p  class="text-center p-5px"><small class="text-success">{{'Hoạt động'}}</small></p>
                                                        @else
                                                            <p class="text-center p-5px"><small class="text-danger">{{'Vô hiệu hóa'}}</small></p>
                                                        @endif
                                                    <hr class="my-1">
                                                </div>
                                                <div class="my-center my-center-85">
                                                    <div class="row">
                                                    <p class="col-4 p-5px">Tên HDV :</p><p class="col-8 p-5px text-body">{{ $tour->user->first_name.' '.$tour->user->last_name}}</p>
                                                    </div>
                                                    <div class="row">
                                                    <p class="col-4 p-5px">Email :</p><p class="col-8 p-5px text-body ">{{$tour->user->email}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-4 p-5px ">Địa điểm:</p><p class="col-8 p-5px text-body">{{$tour->location->name}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-4 p-5px">Mô tả</p><p class="col-8 p-5px text-body ">{{$tour->description }}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-4 p-5px">Giá cả</p><p class="col-8 p-5px text-body">{{$tour->price}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-4 p-5px">Đánh giá</p>
                                                        @if($tour->avgrate=='')
                                                        <p class="col-4 p-5px text-body">Chưa có đánh giá nào</p>
                                                        @else
                                                        <p class="col-4 p-5px text-body">{{ $tour->avgrate }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-1">
                                        </div>
                                        <div class="modal-footer">
                                                <a class="btn btn-primary" href=""><i class="fa fa-edit"></i> Xem bình luận</a>
                                                <a class="btn btn-primary" href=""><i class="fa fa-edit"></i> Chỉnh sửa</a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="myModal2{{$tour->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                    
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hình ảnh tour</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                    
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="row">
                                                            <?php $arr_img = explode ( ',' , $tour->image,-1) ?>
                                                            @foreach($arr_img as $img)
                                                                <div class="col-6">
                                                                    <img width="220" height="200" src="images/{{ $img }}" >
                                                                </div>
                                                            @endforeach
                                                            
                                                    </div>
                                                    <hr class="my-1">
                                                </div>
                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                
                                <div class="modal fade" id="myModalDel{{$tour->id}}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Xác nhận xóa tour!</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <p>Bạn đồng ý xóa tour <strong>{{ $tour->name }}</strong> này không ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-primary" href="">Đồng ý</a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                {{-- <form action="{{  route('user.destroy',['id'=>$user->id]) }}" method="post">
                                                    <input class="btn btn-default" type="submit" value="Xóa" />
                                                    @method('post')
                                                    @csrf
                                                </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                            
                            {{-- @endif --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
  </div>
      
    

@endsection