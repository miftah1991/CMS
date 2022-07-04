@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">
    @if($msg=Session::get('msg'))
        <div class="alert alert-info   show" role="alert">
            {{$msg}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif
    <div class="panel panel-danger ">


        <div class="panel-heading">
            <div class="panel-title text-center">ثپت  کاربران</div>

        </div>
        <form action="{{url('Update_User')}}"  method="post"  enctype="multipart/form-data">
            @csrf
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>نوع کاربران</label>
                        <div class="input-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>
<input type="hidden" value="{{$data->id}}" name="id">
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">نوع کاربران انتخاب کنید</option>
                                @foreach($role as $rcd)
                                <option value="{{$rcd->id}}" @if($data->role_id==$rcd->id) selected="selected" @endif>{{$rcd->Role_Name}}</option>
                        @endforeach

                            </select>

                        </div>
                        <small class="text-danger">{{ $errors->first('Pro_Fid') }}</small>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>اسم کارمند</label>
                        <div class="input-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="name" id="name"  value="{{$data->name}}"  required  autocomplete="off" class="form-control "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ایمل</label>
                        <div class="input-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-open"></i>
                            </div>

                            <input type="text" name="email"  value="{{$data->email}}"  id="email" autocomplete="off"  required class="form-control " >

                        </div>
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>رمز</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" id="password" name="password"  required  class="form-control "  >

                        </div>

                    </div>
                </div>
            </div>

<div class="panel-footer">

    <input type="submit" value=" ثپت کردن" id="btnsave" class="btn btn-primary">


</div>
        </div>
        </form>
    </div>

</div>

<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>


<script>


</script>




    @endsection