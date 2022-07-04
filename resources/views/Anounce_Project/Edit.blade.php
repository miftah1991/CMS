@extends('layouts.master')


@section('content')
    @if($msg=Session::get('msg'))
        <div class="alert alert-info  col-lg-12  show" role="alert">
            {{$msg}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif
<div class="col-lg-12 ">

    <div class="panel panel-danger ">


        <div class="panel-heading">
            <div class="panel-title text-center">تغیر مشخصات قرارداد و اعلان</div>

        </div>
        <form action="{{url('update_Aounce_Project')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$edata->id}}">
            @csrf
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>لست پروژه منظور شده</label>
                        <div class="input-group {{ $errors->has('Pro_Fid') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Pro_Fid" class="form-control">
                                <option value="">پروژه انتخاب کو</option>
                                @foreach($register_project as $rcd)
                                <option value="{{$rcd->id}} " @if($edata->Pro_Fid==$rcd->id) selected="selected" @endif >{{$rcd->Project_Name}}</option>
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
                        <div class="input-group {{ $errors->has('Pro_Code') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Pro_Code" id="Project_Code" readonly  required  autocomplete="off" class="form-control "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Pro_Code') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ اعلان پروژه</label>
                        <div class="input-group {{ $errors->has('Aoun_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Aoun_Date" id="Aoun_Date" value="{{$edata->Aoun_Date}}" autocomplete="off" class="form-control myfont " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Aoun_Date') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ جلسه قبل از داوطلبی</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" id="Met_Date" name="Met_Date" value="{{$edata->Met_Date}}"  autocomplete="off" class="form-control myfont "  >

                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>محل افرکشایی</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-hospital-o"></i>
                            </div>

                            <input type="text" id="Offer_Place" name="Offer_Place" value="{{$edata->Offer_Place}}"  autocomplete="off" class="form-control "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>وقت افرکشایی</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-hospital-o"></i>
                            </div>

                            <input type="time" id="Offer_Time" name="Offer_Time" value="{{$edata->Offer_Time}}"  autocomplete="off" class="form-control "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ افرکشایی</label>
                        <div class="input-group {{ $errors->has('Offer_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" id="Offer_Date" name="Offer_Date" value="{{old('Offer_Date',$edata->Offer_Date)}}" class="form-control myfont  "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Offer_Date') }}</small>
                    </div>
                </div>

            </div>
            <div class="row">


                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ منظوری شرطنامه</label>
                        <div class="input-group {{ $errors->has('Accept_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Accept_Date" id="Accept_Date"  value="{{old('Accept_Date',$edata->Accept_Date)}}" class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Accept_Date') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>جدول توضیع شرطنامه </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="List_File" class="form-control " >
                            <input type="hidden" name="ListFile"  value="{{$edata->List_File}}"   >
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>شرطنامه تایید شده</label>
                        <div class="input-group  {{ $errors->has('Accept_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="file" name="Accept_File"  class="form-control "  >
                            <input type="hidden" name="AcceptFile"  value="{{$edata->Accept_File}}"   >
                        </div>
                        <small class="text-danger">{{ $errors->first('Accept_File') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>اخبار اعلان پروژه </label>
                        <div class="input-group {{ $errors->has('Anouce_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Anouce_File" class="form-control " >
                            <input type="hidden" name="AnouceFile"  value="{{$edata->Anouce_File}}"   >
                        </div>
                        <small   class="text-danger">{{ $errors->first('Anouce_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>مینوت جلسه قبل از داوطلبی</label>
                        <div class="input-group {{ $errors->has('Menot_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file"  name="Menot_File" class="form-control " >
                            <input type="hidden" name="MenotFile"  value="{{$edata->Menot_File}}"   >
                        </div>
                        <small   class="text-danger">{{ $errors->first('Menot_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>پشنهاد و توظیف هیت افرکشایی</label>
                        <div class="input-group {{ $errors->has('Request_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="file" name="Request_File" class="form-control "  >
                            <input type="hidden" name="RequestFile"  value="{{$edata->Request_File}}"   >

                        </div>
                        <small   class="text-danger">{{ $errors->first('Request_File') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>جلسه افر کشایی فورمه های</label>
                        <div class="input-group {{ $errors->has('Met_offer_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Met_offer_File"  class="form-control " >
                            <input type="hidden" name="MetofferFile"  value="{{$edata->Met_offer_File}}"   >
                        </div>
                        <small   class="text-danger">{{ $errors->first('Met_offer_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تعدیل شرطنامه</label>
                        <div class="input-group {{ $errors->has('Extend_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="file" name="Extend_File" class="form-control "  >
                            <input type="hidden" name="ExtendFile"  value="{{$edata->Extend_File}}"   >

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


                            <textarea name="remarks" class="form-control" rows="3">
{{$edata->remarks}}
                            </textarea>
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


                        <tbody >
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


            <div class="row">


                <div class="col-lg-12">


                    <table class="table table-bordered">
<thead>
<tr>

    <th class="text-center">
        <input type="text" name="IDCard" id="IDCard" class="form-control myfont" placeholder="کار هویت هیت داخل کنید">
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








            $("#Aoun_Date").persianDatepicker({
                formatDate: "YYYY-0M-0D"
            });
        $("#Offer_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });

        $("#Met_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });


        $("#Accept_Date").persianDatepicker({
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
                    var tr='<tr class="center">'+
                        '<td>'+
                        '<input type="text" name ="rows['+i+'][Name]"  value="'+data[0].Name+'" class="form-control txtnumber "><input type="hidden" value="'+data[0].USERID+'" name="rows['+i+'][EmpCode]" ' +


                        '</td>'+

                        '<td>'+
                        '<input type="text"  value="'+data[0].Mobile+'"  name ="rows['+i+'][Mobile]"  class="form-control myfont ">'+
                        '</td>'+

                        '<td>'+
                        '<input type="text"   value="'+data[0].Email+'" id="txtjob" name ="rows['+i+'][Email]" class="form-control myfont ">'+
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

        alert(id);
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

            },
            error:function (data) {
                console.log(data);

            }

        })


    })




</script>




    @endsection
