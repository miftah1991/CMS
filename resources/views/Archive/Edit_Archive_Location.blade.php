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
            <div class="panel-title text-center">تنظمات خانه الماری</div>

        </div>
        <form action="{{url('Update_Archive_Location')}}"  method="post"  enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$data->id}}">
            @csrf
        <div class="panel-body">

            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>الماری</label>
                        <div class="input-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="name" id="name"  value="{{$data->name}}"  required  autocomplete="off" class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                </div>
            </div>

<div class="panel-footer">

    <input type="submit" value=" تغیر کردن" id="btnsave" class="btn btn-primary">


</div>
        </div>
        </form>
    </div>
        <div class="panel panel-primary ">


            <div class="panel-heading">
                <div class="panel-title text-center" >لست خانه الماری</div>

            </div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-lg-12">

                            <table  class="table table-bordered myfont" id="tblarchive">

                                <thead>

                                <tr class="text-center">
                                    <td>شماره</td>
                                    <td>اسم</td>
                                    <td>تنظمات</td>
                                </tr>
                                </thead>

<tbody>

@foreach($Location as $key=>$rcd)


    <tr class="text-center">
        <td>{{++$key}}</td>
        <td>{{$rcd->name}}</td>
        <td>
            <a href="{{url('Edit_Archive_Location')}}/{{$rcd->id}}"><span class="fa fa-pencil"></span></a>

        </td>
    </tr>

    @endforeach
</tbody>
                            </table>



                        </div>
                    </div>


                </div>
        </div>
</div>

<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>


<script>

    $(document).ready(function () {


        $("#tblarchive").dataTable();
    });
</script>




    @endsection