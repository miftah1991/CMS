@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">

    <div class="panel panel-danger ">


        <div class="panel-heading">
            <div class="panel-title text-center">ثپت تعدیلات قرارداد</div>

        </div>
        <form action="{{url('Add_Extend')}}"  method="post"  enctype="multipart/form-data">
            @csrf
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
                                <option value="{{$rcd->id}}">{{$rcd->Project_Name}} --{{$rcd->Pro_Code}}</option>
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

                            <input type="text" name="Pro_Code" id="Project_Code" readonly  required  autocomplete="off" class="form-control myfont "  >

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
                        <label>شرکت قرارداد کننده</label>
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
                        <label>درخواست نوع تعدیل </label>
                        <div class="input-group {{ $errors->has('Ext_Fid') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>
                            <input type="text" name="Ext_Fid" id="Ext_Fid" class="form-control">


                        </div>
                        <small class="text-danger">{{ $errors->first('Start_Date') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ اغاز بررسی تعدیل</label>
                        <div class="input-group {{ $errors->has('Start_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Start_Date" id="Start_Date" autocomplete="off" class="form-control myfont "  >

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

                            <input type="text" name="End_Date" id="End_Date" autocomplete="off" class="form-control myfont  "  >

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

                        </div>
                        <small class="text-danger">{{ $errors->first('Report_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>درخواست تعدیل</label>
                        <div class="input-group {{ $errors->has('Report_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Report_File" class="form-control " >

                        </div>
                        <small   class="text-danger">{{ $errors->first('Report_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>درخواست کننده</label>
                        <div class="input-group {{ $errors->has('Req_Fid') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <select name="Req_Fid" class="form-control" required>
                                <option value="">لطفا درخواست کننده انتخاب کنید</option>
                                <option value="1">شرکت قرادادکننده</option>
                                <option value="2">دافغانتسان برشنا شرکت</option>

                            </select>

                        </div>
                        <small   class="text-danger">{{ $errors->first('Req_Fid') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>وقت ایمل</label>
                        <div class="input-group  {{ $errors->has('time') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="time" name="time"  class="form-control "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('time') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>محل ارزیابی تعدیل</label>
                        <div class="input-group {{ $errors->has('place') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="text" name="place" class="form-control " >

                        </div>
                        <small   class="text-danger">{{ $errors->first('place') }}</small>
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


                            <textarea name="Remarks" class="form-control" rows="2"></textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="btn btn-warning btn-block" style="font-size: small;">لیست هیت</div>
            <div class="row">


                <div class="col-lg-12">


                    <table class="table table-bordered">
<thead>
<tr>

    <th class="text-center">
        <input type="text" name="IDCard" id="IDCard" class="form-control myfont" placeholder="کار هویت هیت داخل کو">
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

    <input type="submit" value=" ثپت کردن" id="btn_Save" class="btn btn-primary" onclick="check_form()">
    <span class="badge badge-danger" id="error"></span>


</div>
        </form>
    </div>

</div>

<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>


<script>

    $(document).ready(function () {

        $("#Pro_Fid").select2({

            allowClear: true
        });
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





        $("#Start_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });



        $("#End_Date").persianDatepicker({
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
                url:'GetEmpMember',
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

    function check_form() {
        var Start_Date_Contract = $('#Start_Date').val();
        var End_Date_Contract = $('#End_Date').val();


        if(Start_Date_Contract != "" && End_Date_Contract != ""){
            if(End_Date_Contract <= Start_Date_Contract){

                event.preventDefault();
                $('#error').show();
                $("#btn_Save").attr('disabled','true');
                $('#error').html(" تاریخ اغاز بررسی تعدیل  عقب تر از تاریخ ختم بررسی تعدیل است!");
            }
            else {
                $('#error').hide();
                $("#btn_Save").removeAttr('disabled');
            }


        }
    }
</script>




    @endsection
