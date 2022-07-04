@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">

    <div class="panel panel-danger ">
        <div class="panel-heading">
            <div class="panel-title text-center">ثپت سیستم ارشیف</div>

        </div>
        <form  action="{{url('Add_Archive')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="panel-body">

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>اسم پروژه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-university"></i>
                            </div>

                            <input type="text" name="Project_Name" id="Project_Name"  autocomplete="off" class="form-control myfont" >

                        </div>

                    </div>

                </div>




            </div>
            <div class="row">


                <div class="col-lg-4">
                    <div class="form-group">
                        <label>کود پروژه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Project_Code"  id="Project_Code" autocomplete="off" required class="form-control myfont "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>خانه الماری</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Arc_Fid" id="Arc_Fid"  required class="form-control">
                                <option value="">لطفا خانه انتخاب کنید</option>
                                @foreach($Location as $rcd)

                                    <option value="{{$rcd->id}}">{{$rcd->name}}</option>
                                @endforeach

                            </select>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>اغاز سال</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="number" name="Year" required autocomplete="off" class="form-control myfont " >

                        </div>

                    </div>
                </div>

            </div>

<div class="row">
    <div class="col-lg-4">
        <div class="form-group ">
            <label>ختم سال</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-file-text-o"></i>
                </div>

                <input type="number" name="End_year" required autocomplete="off" class="form-control myfont " >

            </div>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group ">
            <label>شرکت قراداد کننده</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-file-text-o"></i>
                </div>

            <select class="form-control" required name="Com_Fid">
                <option value="">لطفا شرکت انتخاب کنید</option>
@foreach($company as $rcd)
                    <option value="{{$rcd->id}}">{{$rcd->Name}}</option>
    @endforeach
            </select>

            </div>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group ">
            <label>پروژه</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-file-text-o"></i>
                </div>

                <input type="file" name="Project_File"  autocomplete="off" class="form-control myfont " >

            </div>

        </div>
    </div>
</div>









            </div>





<div class="panel-footer">

    <input type="submit" value=" ثپت کردن" class="btn btn-primary">


</div>
        </form>
    </div>

</div>
<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>

<script>




</script>




    @endsection