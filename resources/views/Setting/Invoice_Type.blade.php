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
            <div class="panel-title text-center">تنظمات نوع انوایس</div>

        </div>
        <form action="{{url('Add_Invoice_Type')}}"  method="post"  enctype="multipart/form-data">
            @csrf
        <div class="panel-body">

            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>نوع انوایس کننده</label>
                        <div class="input-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="name" id="name"   required  autocomplete="off" class="form-control "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                </div>
            </div>

<div class="panel-footer">

    <input type="submit" value=" ثپت کردن" id="btnsave" class="btn btn-primary">


</div>
        </div>
        </form>
    </div>
        <div class="panel panel-primary ">


            <div class="panel-heading">
                <div class="panel-title text-center" >لیست انوایس</div>

            </div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-lg-12">

                            <table  class="table table-bordered">

                                <thead>

                                <tr class="text-center">
                                    <td>شماره</td>
                                    <td>اسم</td>
                                    <td>تنظمات</td>
                                </tr>
                                </thead>

<tbody>

@foreach($Invoice_Type as $key=>$rcd)


    <tr class="text-center">
        <td>{{++$key}}</td>
        <td>{{$rcd->name}}</td>
        <td>
            <a href="{{url('Edit_Invoice_Type')}}/{{$rcd->id}}"><span class="fa fa-pencil"></span></a>

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


</script>




    @endsection