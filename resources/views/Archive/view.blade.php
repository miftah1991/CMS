@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">
    @if($msg=Session::get('msg'))
        <div class="alert alert-success   show" role="alert">
            {{$msg}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif
    <div class="panel panel-danger ">
        <div class="panel-heading">
            <div class="panel-title text-center"> سیستم ارشیف</div>

        </div>
        <form  action="{{url('Update_Archive')}}" method="post" enctype="multipart/form-data">
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

                            <input type="text" name="Project_Name" id="Project_Name" value="{{$data->Project_Name}}"  required autocomplete="off" class="form-control myfont" >

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

                            <input type="text" name="Project_Code"  value="{{$data->Project_Code}}" id="Project_Code" autocomplete="off" class="form-control myfont "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>خانه الماری</label>
                        <div class="input-group" style="border:none;">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Arc_Fid" id="Arc_Fid"  required class="form-control myfont" >
                                <option value="">لطفا خانه انتخاب کنید</option>
                                @foreach($Location as $rcd)

                                    <option value="{{$rcd->id}}" @if($data->Arc_Fid==$rcd->id) selected="selected" @endif>{{$rcd->name}}</option>
                                @endforeach

                            </select>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>سال</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="number" name="Year" value="{{$data->Year}}" required autocomplete="off" class="form-control myfont " >

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

                            <input type="number" name="End_year" value="{{$data->End_year}}" required autocomplete="off" class="form-control myfont " >

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
                                    <option value="{{$rcd->id}}" @if($rcd->id==$data->Com_Fid) selected="selected" @endif>{{$rcd->Name}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="form-group ">
                        <label>پروژه</label>

<br>

                            <a href="{{asset('storage/app/public/Archive')}}/{{$data->Project_File}}" ><span class="fa fa-download"></span></a>


                </div>
            </div>











            </div>





<div class="panel-footer">




</div>
        </div>
        </form>
    </div>

</div>





    @endsection