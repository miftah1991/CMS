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
        <form action="{{url('Add_User')}}"  method="post"  enctype="multipart/form-data">
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

                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">نوع کاربران انتخاب کنید</option>
                                @foreach($data as $rcd)
                                <option value="{{$rcd->id}}">{{$rcd->Role_Name}}</option>
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

                            <input type="text" name="name" id="name"   required  autocomplete="off" class="form-control "  >

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

                            <input type="text" name="email"  id="email" autocomplete="off"  class="form-control " >

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

                            <input type="text" id="password" name="password"   class="form-control "  >

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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">خبرتیا</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                این قرارداد ایک بار ثپت شد
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"  data-dismiss="modal">بسته</button>

            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>


<script>


</script>




    @endsection