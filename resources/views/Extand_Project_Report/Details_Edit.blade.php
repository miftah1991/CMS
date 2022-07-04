@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">

    <div class="panel panel-danger ">


        <div class="panel-heading">
            <div class="panel-title text-center">تغیر راپور مشخصات تعدیلات</div>

        </div>
        <form action="{{url('Update_Extend_Report')}}"  method="post"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="Pro_Fid" id="Pro_Fid" value="{{$data->Pro_Fid}}">
            <input type="hidden" name="id" id="id" value="{{$data->id}}">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>لیست پروژه قرارداد شده</label>
                        <div class="input-group {{ $errors->has('Project_Name') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                       <input type="text" name="Project_Name"  value="{{$register_proejct->Project_Name}}" class="col-lg-12">

                        </div>
                        <small class="text-danger">{{ $errors->first('Project_Name') }}</small>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>کود پروژه</label>
                        <div class="input-group {{ $errors->has('Project_Code') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Pro_Code" id="Project_Code"  value="{{$register_proejct->Pro_Code}}" readonly  required  autocomplete="off" class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Project_Code') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ثپت تاریخ تعدیلات</label>
                        <div class="input-group {{ $errors->has('Save_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="text" name="Save_Date" id="Save_Date" value="{{$data->Save_Date}}" autocomplete="off" class="form-control">

                        </div>
                        <small   class="text-danger">{{ $errors->first('Save_Date') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label> تعدیل درخواست کننده</label>
                        <div class="input-group {{ $errors->has('Req_Fid') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <select name="Req_Fid" class="form-control" required >
                                <option value="">لطفا درخواست کننده انتخاب کنید</option>
                                <option value="1" @if($data->Req_Fid==1) selected="selected" @endif>شرکت قرادادکننده</option>
                                <option value="2" @if($data->Req_Fid==2) selected="selected" @endif>دافغانتسان برشنا شرکت</option>

                            </select>

                        </div>
                        <small   class="text-danger">{{ $errors->first('Req_Fid') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>درخواست  تعدیلات</label>
                        <div class="input-group {{ $errors->has('Extand_Name') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>

                            <input type="text" name="Extand_Name" id="Extand_Name" value="{{$data->Extand_Name}}" autocomplete="off" class="form-control">

                        </div>
                        <small   class="text-danger">{{ $errors->first('Extand_Name') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>نوع تعدیل</label>
                        <div class="input-group {{ $errors->has('Accept_Reject') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Accept_Reject" id="Accept_Reject" class="form-control">
                                <option value="">نوع تعدیل انتخاب کنید</option>

                                    <option value="0" @if($data->Accept_Reject==0) selected="selected" @endif >قبول تعدیلات</option>
                                <option value="1" @if($data->Accept_Reject==1) selected="selected" @endif >رد تعدیلات</option>

                            </select>

                        </div>
                        <small class="text-danger">{{ $errors->first('Accept_Reject') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>راپور تعدیل</label>
                        <div class="input-group  {{ $errors->has('Report_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="file" name="Report_File"  class="form-control "  >
                            <input type="hidden" name="ReportFile" value="{{$data->Report_File}}"  class="form-control "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Report_File') }}</small>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ورقه تعدیل</label>
                        <div class="input-group {{ $errors->has('Extand_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Extand_File" class="form-control " >
                            <input type="hidden" name="ExtandFile" value="{{$data->Extand_File}}"  class="form-control "  >

                        </div>
                        <small   class="text-danger">{{ $errors->first('Extand_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="form-group ">
                        <label>حکم قبول تعدیل</label>
                        <div class="input-group {{ $errors->has('Accept_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Accept_File" id="Accept_File" class="form-control " >
                            <input type="hidden" name="AcceptFile" value="{{$data->Accept_File}}"  class="form-control "  >
                        </div>
                        <small   class="text-danger">{{ $errors->first('Accept_File') }}</small>
                    </div>


                </div>
                <div class="col-lg-4">

                    <div class="form-group ">
                        <label>حکم رد تعدیل</label>
                        <div class="input-group {{ $errors->has('Reject_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Reject_File" id="Reject_File" class="form-control " >
                            <input type="hidden" name="RejectFile" value="{{$data->Reject_File}}"  class="form-control "  >

                        </div>
                        <small   class="text-danger">{{ $errors->first('Reject_File') }}</small>
                    </div>


                </div>
            </div>


            <div class="row">

                <div class="col-lg-12" id="group_Button">
                    <button type="button" class="btn btn-warning" id="bnttime">زمان</button>
                    <button type="button" class="btn btn-primary" id="btnmonay">حجم</button>
                    <button type="button" class="btn btn-success" id="btnitem">مشخصات</button>
                    <button type="button" class="btn btn-info" id="btnextra">نوع دیګر</button>
                </div>

            </div>


            <div class="row">

                <div class="col-lg-12">

                    <div class="form-group ">
                        <label>ملاحضات</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>


                            <textarea name="Remarks"  class="form-control" rows="2">{{$data->Details}}</textarea>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">




                    @if(count($datatime))
                        <div class="box box-info" id="list_time">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title">تعدیلات دربخش تاریخ</h3>
                                <!-- tools box -->
                                <div class="pull-left box-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <div class="box-body">
                                <table class="table table-responsive ">

                                    <tr>
                                        <td>روز تعدیل</td>
                                        <td>تاریخ ختم در قرارداد</td>
                                        <td>تاریخ تعدیل قرارداد</td>
                                        <td>نوع تعدیل</td>
                                        <td><span class="fa fa-remove"></span></td>
                                    </tr>
                                    @foreach($datatime as $key=>$rcd)
                                        <tr class="myfont">

                                            <td>{{$rcd->Day}}</td>
                                            <td>{{$rcd->Cont_End_Date}}</td>
                                            <td>{{$rcd->Extand_Date}}</td>
                                            <td>@if($rcd->Req_Fid==2)    حذف کردن @else اضافه کردن @endif</td>
                                            <td><span  id="Delete_Time" class="fa fa-remove " style="color: red;"  data-id="{{$rcd->id}}"></span> </td>
                                        </tr>

                                    @endforeach

                                </table>
                            </div>
                        </div>

                    @endif
                    @if(count($datamonay))
                        <div class="box box-info" id="listMonay">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title">تعدیلات دربخش پولی قرارداد</h3>
                                <!-- tools box -->
                                <div class="pull-left box-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <div class="box-body">
                                <table class="table table-responsive ">

                                    <tr>
                                        <td>مقدار پول تعدیل</td>
                                        <td>مقدار قرارداد</td>
                                        <td>مقدار اخری تعدیلات</td>
                                        <td>نوع تعدیل</td>
                                        <td><span class="fa fa-remove"></span></td>
                                    </tr>
                                    @foreach($datamonay as $key=>$rcd)
                                        <tr class="myfont">

                                            <td>{{$rcd->Amount}}</td>
                                            <td>{{$rcd->Cont_Amount}}</td>
                                            <td>{{$rcd->Net_Amount}}</td>
                                            <td>@if($rcd->Req_Fid==2)    حذف کردن @else اضافه کردن @endif</td>
                                            <td><span  id="Delete_Moany" class="fa fa-remove " style="color: red;"  data-id="{{$rcd->id}}"></span> </td>
                                        </tr>

                                    @endforeach

                                </table>
                            </div>
                        </div>

                    @endif
                    @if(count($dataitem))
                        <div class="box box-info">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title">تعدیلات دربخش جنس</h3>
                                <!-- tools box -->
                                <div class="pull-left box-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <div class="box-body">
                                <table class="table table-responsive ">

                                    <tr>
                                        <td>جنس</td>
                                        <td>تفصیل جنس</td>

                                        <td>نوع تعدیل</td>
                                        <td><span class="fa fa-remove"></span></td>
                                    </tr>
                                    @foreach($dataitem as $key=>$rcd)
                                        <tr class="myfont" id="rowitem_{{$rcd->id}}">

                                            <td>{{$rcd->item}}</td>
                                            <td>{{$rcd->quntity}}</td>
                                            <td>@if($rcd->Req_Fid==2)    حذف کردن @else اضافه کردن @endif</td>
                                            <td><span  id="Delete_item" class="fa fa-remove " style="color: red;"  data-id="{{$rcd->id}}"></span> </td>
                                        </tr>

                                    @endforeach

                                </table>
                            </div>
                        </div>

                    @endif
                    @if(count($dataextra))
                        <div class="box box-info" id="ListExtra">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title">تعدیلات دربخش نوع دیګر</h3>
                                <!-- tools box -->
                                <div class="pull-left box-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <div class="box-body">
                                <table class="table table-responsive ">

                                    <tr>
                                        <td>موضوع نوع دیګر تعدیلات</td>
                                        <td>تفصیل نوع دیګر تعدیلات</td>


                                        <td>نوع تعدیل</td>
                                        <td><span class="fa fa-remove"></span></td>
                                    </tr>
                                    @foreach($dataextra as $key=>$rcd)
                                        <tr class="myfont">

                                            <td>{{$rcd->item_extra}}</td>
                                            <td>{{$rcd->details_extra}}</td>
                                            <td>@if($rcd->Req_Fid==2)    حذف کردن @else اضافه کردن @endif</td>
                                            <td><span  id="Delete_extra" class="fa fa-remove " style="color: red;"  data-id="{{$rcd->id}}"></span> </td>
                                        </tr>

                                    @endforeach

                                </table>
                            </div>
                        </div>

                    @endif

                </div>

            </div>


<div class="row">
    <div class="col-lg-12" id="divtime">



    </div>

</div>
            <div class="row">
                <div class="col-lg-12" id="divmonay">



                </div>

            </div>
            <div class="row" >
                <div class="col-lg-12" id="divitem" >



                </div>

            </div>
            <div class="row">
                <div class="col-lg-12" id="divmoany">



                </div>

            </div>
            <div class="row">
                <div class="col-lg-12" id="divextra">



                </div>

            </div>


            <div class="row">
                <div class="col-lg-12" id="coltime" style="display: none;">

                </div>


            </div>
            <div class="row">
                <div class="col-lg-12" id="coltime" style="display: none;">
                    @include('Extand_Project_Report.table.tbltime')
                    @include('Extand_Project_Report.table.tblmonay')
                    @include('Extand_Project_Report.table.tblitem')
                    @include('Extand_Project_Report.table.tblextra')
                </div>


            </div>
        </div>

<div class="panel-footer">

    <input type="submit" value=" ثپت کردن" id="Btn_Genral" class="btn btn-primary">


</div>
        </form>
    </div>

</div>





<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>


<script>

    $(document).ready(function () {


var id=$("#id").val();


        $.ajax({

            url:'{{url('Find_Duplicate_Extand_Details')}}',
            method:'get',
            data:{id:id},
            success:function (res) {
console.log()
                if(res.length>0)
                {
                    $("#btnmonay").attr('disabled','true');
                    $("#btnitem").attr('disabled','true');
                    $("#btnextra").attr('disabled','true');
                    $("#bnttime").attr('disabled','true');
                    $("#btnsave").attr('disabled','true');
                    $("#Btn_Genral").attr('disabled','true');



                }


            }




        })












        $("#Accept_Reject").on('change',function () {

  var id=$("#Accept_Reject").val();

    if(id==0)
    {
        $("#Reject_File").attr('disabled','true');
        $("#Accept_File").removeAttr('disabled');
        $("#group_Button").show();
    }
    else
    {
        $("#Accept_File").attr('disabled','true');
        $("#Reject_File").removeAttr('disabled');
        $("#group_Button").hide();


    }

})










        $("#Save_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });



        $("#End_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });
        $("#Extand_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });
        var i=0;


    })
    function show()
    {


        $('#rm').parent().parent().remove();

    }

    $("#Delete_Moany").on('click',function () {

        var id=  $(this).data("id");
        $.ajax({
            url:'{{url('Delete_Moany')}}',
            method: 'get',
            data:{id:id},
            success:function (res) {
                if(res)
                {
                  $("#listMonay").remove();

                }

            },




        })


    })



    $("#Delete_Time").on('click',function () {

        var id=  $(this).data("id");
        $.ajax({
            url:'{{url('Delete_Time')}}',
            method: 'get',
            data:{id:id},
            success:function (res) {
                if(res)
                {
                    $("#list_time").remove();

                }

            },




        })


    })

    $("#Delete_item").on('click',function () {

        var id=  $(this).data("id");
        $.ajax({
            url:'{{url('Delete_Time')}}',
            method: 'get',
            data:{id:id},
            success:function (res) {
                if(res)
                {
                    $("#rowitem_"+id).remove();

                }

            },




        })


    })

    $("#Delete_extra").on('click',function () {

        var id=  $(this).data("id");
        $.ajax({
            url:'{{url('Delete_Time')}}',
            method: 'get',
            data:{id:id},
            success:function (res) {
                if(res)
                {
                    $("#ListExtra").remove();

                }

            },




        })


    })




</script>




    @endsection
