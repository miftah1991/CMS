@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">

    <div class="panel panel-danger ">


        <div class="panel-heading">
            <div class="panel-title text-center">تغیر تعدیلات قرارداد</div>

        </div>
        <form action="{{url('Update_Extend')}}"  method="post"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>لیست پروژه قرارداد شده</label>
                        <div class="input-group {{ $errors->has('Pro_Fid') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Pro_Fid" id="Pro_Fid" class="form-control">
                                <option value="">پروژه را انتخاب کنید</option>
                                @foreach($register_project as $rcd)
                                <option value="{{$rcd->id}}" @if($data->Pro_Fid==$rcd->id) selected="selected" @endif>{{$rcd->Project_Name}}</option>
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
                        <label>کود پروژه</label>
                        <div class="input-group {{ $errors->has('Project_Code') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Pro_Code" id="Project_Code" value="{{$data->registerprocurement->Pro_Code}}"  readonly  required  autocomplete="off" class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Project_Code') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ ختم قرارداد</label>
                        <div class="input-group {{ $errors->has('Exp_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Exp_Date"  id="Exp_Date" autocomplete="off" readonly class="form-control myfont " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Exp_Date') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>شرکت برنده</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" id="Company_Name" name="Company_Name"  readonly class="form-control "  >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>نوع تعدیل</label>
                        <div class="input-group {{ $errors->has('Ext_Fid') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Ext_Fid" id="Ext_Fid" class="form-control">
                                <option value="">نوع تعدیل انتخاب کنید</option>
                                @foreach($extendtype as $rcd)
                                    <option value="{{$rcd->id}}" @if($data->Ext_Fid==$rcd->id) selected="selected" @endif>{{$rcd->Type_Name}}</option>
                                @endforeach

                            </select>

                        </div>
                        <small class="text-danger">{{ $errors->first('Ext_Fid') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ اغاز بررسی تعدیل</label>
                        <div class="input-group {{ $errors->has('Start_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Start_Date" id="Extand_Date" value="{{$data->Start_Date}}" autocomplete="off" class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Start_Date') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ ختم بررسی تعدیل</label>
                        <div class="input-group {{ $errors->has('End_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="End_Date" id="Save_Date" value="{{$data->End_Date}}" autocomplete="off" class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('End_Date') }}</small>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>پشنهاد</label>
                        <div class="input-group  {{ $errors->has('Request_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="file" name="Request_File"  class="form-control "  >
                            <input type="hidden" name="RequestFile"  value="{{$data->Request_File}}" class="form-control "  >
                        </div>
                        <small class="text-danger">{{ $errors->first('Report_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ګزارش </label>
                        <div class="input-group {{ $errors->has('Report_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Report_File" class="form-control " >
                            <input type="hidden" name="ReportFile"  value="{{$data->Report_File}}" class="form-control "  >

                        </div>
                        <small   class="text-danger">{{ $errors->first('Report_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تعدیل</label>
                        <div class="input-group {{ $errors->has('Extend_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file"  name="Extend_File" class="form-control " >
                            <input type="hidden" name="ExtendFile"  value="{{$data->Extend_File}}" class="form-control "  >
                        </div>
                        <small   class="text-danger">{{ $errors->first('Extend_File') }}</small>
                    </div>
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


                            <textarea name="Remarks" class="form-control" rows="4">{{$data->Name}}</textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="btn btn-info btn-block" style="font-size: small;">تغیر هیت</div>

            <div class="row">
                <div class="col-lg-12">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>
                                اسم هیت
                            </td>
                            <td>
                                شماره تماس
                            </td>
                            <td>
                                ایمل ادرس
                            </td>
                            <td>
                                تنظمیات
                            </td>
                        </tr>

                        </thead>


                        <tbody>
                        @foreach($Team_Contact_List as $rcd)
                            <tr id="del_{{$rcd->id}}" class="text-center myfont">

                                <td>{{$rcd->Emp_Name}}</td>
                                <td>{{$rcd->Phone}}</td>
                                <td>{{$rcd->Email}}</td>
                                <td><i class="btn btn-danger fa fa-remove" data-id="{{$rcd->id}}"></i></td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>



                </div>

            </div>
            <div class="btn btn-warning btn-block" style="font-size: small;">لیست هیت</div>
            <div class="row">


                <div class="col-lg-12">


                    <table class="table table-bordered">
<thead>
<tr>

    <th class="text-center">
        <input type="text" name="IDCard" id="IDCard" class="form-control" placeholder="کار هویت هیت داخل کو">
    </th>
    <th>
          <input type="button" id="add" class="btn btn-primary" value="اضافه نمودن" >
    </th>
    <th>

    </th>
    <th class="text-center">


    </th>
</tr>

<tr>
<th class="text-center">
   اسم هیت
</th>
<th>
شماره تماس
</th>
<th>
ادرس ایمل
</th>
    <th>

    </th>

</tr>

</thead>

                        <tbody id="productlist">



                        </tbody>




                    </table>

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

    $(document).ready(function () {


        $('#Pro_Fid').on('change',function () {
            var val = $('#Pro_Fid').val();

            $.ajax({

                url: '{{url('Find_Code')}}',
                method: 'get',
                data: {id: val},
                success: function (response) {
                    $('#Ano_Fid').val(response.id);

                    $('#Project_Code').val(response.Pro_Code);

                }

            })


            $.ajax({

                url: '{{url('Find_Complain_Company')}}',
                method: 'get',
                data: {id: val},
                success: function (response) {
                    console.log(response);
                    $('#Company_Name').val(response.Name);



                }


            });



        });





        $("#Save_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });



        $("#Exp_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });
        $("#Extand_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });
        var i=0;
        $('#add').click(function(){

            var IDCard=$('#IDCard').val();
            if(IDCard.length!=null)
            {
            $.ajax({
                url:'{{url('GetEmpMember')}}',
                method:"get",
                data:{data:IDCard},
                success:function (data) {
                if(data.length<1)
                {
                   alert('این کارت هویت غلط است');

                }
                else
                {
                    console.log(data);
                    var tr='<tr class="center myfont">'+
                        '<td>'+
                        '<input type="text" name ="rows['+i+'][Name]"  value="'+data[0].Name+'" class="form-control txtnumber "><input type="hidden" value="'+data[0].USERID+'" name="rows['+i+'][EmpCode]" ' +


                        '</td>'+

                        '<td>'+
                        '<input type="text"  value="'+data[0].Mobile+'"  name ="rows['+i+'][Mobile]"  class="form-control ">'+
                        '</td>'+

                        '<td>'+
                        '<input type="text"   value="'+data[0].Email+'" id="txtjob" name ="rows['+i+'][Email]" class="form-control ">'+
                        '</td>'+



                        '<td class="center" style="text-align: center">'+
                        '<a href="#"  id="rm" class="btn btn-danger" onclick="show();"><i   class="fa fa-remove "></i> </a>'+
                        '</td>'+
                        '</tr>';

                    $('#productlist').append(tr);
                    ++i;
                }


                }

            })

            }

        });

    })
    function show()
    {


        $('#rm').parent().parent().remove();

    }
    $(".btn-danger").on('click',function () {

        var id=$(this).data("id")


        $.ajax({
            url:'{{url('Delete_Member_Contact')}}',
            method:'get',
            data:{data:id},
            success:function (data) {
                console.log(data);
                if(data==true)
                {

                    $("#del_"+id).remove();
                }

            }

        })


    })

</script>




    @endsection