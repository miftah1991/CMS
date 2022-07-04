@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">

    <div class="panel panel-danger ">


        <div class="panel-heading">
            <div class="panel-title text-center">ثپت راپور تعدیلات</div>

        </div>
        <form action="{{url('Add_Extend_Report')}}"  method="post"  enctype="multipart/form-data">
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


                            <input type="text" name="Save_Date" id="Save_Date" autocomplete="off" required class="form-control">

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
                        <div class="input-group {{ $errors->has('Extand_Request') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>

                            <input type="text" name="Extand_Name" id="Extand_Name" value="{{$data->Ext_Fid}}" autocomplete="off" class="form-control">

                        </div>
                        <small   class="text-danger">{{ $errors->first('Extand_Request') }}</small>
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

                                    <option value="0">قبول تعدیلات</option>
                                <option value="1">رد تعدیلات</option>

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

                        </div>
                        <small class="text-danger">{{ $errors->first('Report_File') }}</small>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>فورم تعدیل</label>
                        <div class="input-group {{ $errors->has('Extand_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Extand_File" class="form-control " >

                        </div>
                        <small   class="text-danger">{{ $errors->first('Extand_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="form-group ">
                        <label>حکم تایید ګزارش</label>
                        <div class="input-group {{ $errors->has('Accept_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Accept_File" id="Accept_File" class="form-control " >

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


                            <textarea name="Remarks" class="form-control" rows="2"></textarea>
                        </div>

                    </div>
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

</script>




    @endsection
