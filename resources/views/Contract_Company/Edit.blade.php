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
            <div class="panel-title text-center">تغیر کردن مشخصات قرارداد کننده</div>

        </div>

        <form action="{{url('Update_Contract')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>لیست پروژه منظور شده</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Pro_Fid" id="Pro_Fid"  required class="form-control">
                                <option value="">لطفا پروژه انتخاب کنید</option>
                                @foreach($register_project as $rcd)

                                    <option value="{{$rcd->id}}" @if($data->Pro_Fid==$rcd->id) selected="selected" @endif>{{$rcd->Project_Name}}</option>
                                @endforeach

                            </select>

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>کود پروژه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Project_Code" value="{{$data->registerprocurement->Pro_Code}}"  id="Project_Code" required class="form-control myfont "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>نوع پروژه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text"  name="Pro_Type" id="Pro_Type" value="{{$data->registerprocurement->procurementtype->ProName}}" required class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ اغاز قرارداد</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Start_Date_Contract"  value="{{$data->Start_Date_Contract}}" id="Start_Date_Contract" required  class="form-control myfont "  >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ ختم قرارداد</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="End_Date_Contract" value="{{$data->End_Date_Contract}}" id="End_Date_Contract"   class="form-control  myfont"  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>محل تسلیمی دهی اجناس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </div>

                            <input type="text"  name="Place_Item" id="Place_Item" value="{{$data->Place_Item}}"  class="form-control myfont "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>مقدار تامینات</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-sort-numeric-asc"></i>
                            </div>

                            <input type="text" name="Amount" id="Amount" value="{{$data->Amount}}"  class="form-control myfont "  >

                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>مقدار قرارداد</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>

                            <input type="number" name="Contract_Rupee" id="Contract_Rupee"  value="{{$data->Contract_Rupee}}"  autocomplete="off" required class="form-control myfont "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تخفیف</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>

                            <input type="number" name="Discount" id="Discount" value="{{$data->Discount}}"  autocomplete="off" required class="form-control myfont "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>مبلغ قرارداد</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>

                            <input type="text" name="Net_Amount" id="Net_Amount"  value="{{$data->Net_Amount}}" autocomplete="off" required class="form-control myfont "  >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>میعاد ورنتی </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-barcode"></i>
                            </div>


                            <input type="text" name="Warrenty" id="Warrenty" value="{{$data->Warrenty}}"  class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>از تاریخ تسلیمی اجناس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Date_From_Item" id="Date_From_Item" value="{{$data->Date_From_Item}}"  class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>الی تاریخ تسلیمی اجناس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Date_To_Item" value="{{$data->Date_To_Item}}" id="Date_To_Item"  class="form-control myfont "  >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>مشخصات قرارداد</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Contract_Information_File"    class="form-control myfont " >
                            <input type="hidden"  name="ContractInformationFile"  value="{{$data->Contract_Information_File}}">

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>بل احجام</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="file" name="Bill_File" class="form-control "   >
                            <input type="hidden" name="BillFile" value="{{$data->Bill_File}}" class="form-control "  required >
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>شرایط پرداخت </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Term_Cond_File" class="form-control "  >
                            <input type="hidden" name="TermCondFile" value="{{$data->Term_Cond_File}}" class="form-control "  required >
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">




                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تضمین حسن اجرا کار </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file"  name="Warrenty_File" class="form-control " >
                            <input type="hidden"  name="WarrentyFile" value="{{$data->Warrenty_File}}" class="form-control " >
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاییدی از صحت و سقم</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Helth_File" class="form-control " >
                            <input type="hidden" name="HelthFile" value="{{$data->Helth_File}}" class="form-control " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>بانک مربوطه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-bank"></i>
                            </div>

                            <input type="text" name="Bank"  value="{{$data->Bank}}" autocomplete="off" class="form-control myfont " >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">




                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>فایل تضمین </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="file" name="Tazmin_File"  class="form-control " >
                            <input type="hidden" name="TazminFile"  value="{{$data->Tazmin_File}}" class="form-control " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>محل قرارداد</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Contract_Place" value="{{$data->Contract_Place}}" autocomplete="off" id="Contract_Place" class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>واحد پولی</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>

                            <select name="rupee" class="form-control" required>
                                <option value="">واحد پولی انتخاب کنید</option>
                                <option value="af"  @if($data->rupee=="af") selected="selected" @endif>افغانی</option>
                                <option value="da" @if($data->rupee=="da") selected="selected" @endif>دالر</option>
                            </select>

                        </div>

                    </div>
                </div>

            </div>
            <div class="row">




                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>مبلع تضمین اجرا کار </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>

                            <input type="text" name="Warrent_Rupee" value="{{$data->Warrent_Rupee}}"  class="form-control myfont " >


                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ صدرو تضمین کار</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Export_Strat_Date" value="{{$data->Export_Strat_Date}}" autocomplete="off" id="Export_Strat_Date" class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ ختم صدور تضمین</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Export_End_Date" value="{{$data->Export_End_Date}}" autocomplete="off" id="Export_End_Date" class="form-control " >

                        </div>

                    </div>
                </div>

            </div>
            <div class="row">




                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>شماره ګارنتی </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>

                            <input type="text" name="Warrenty_Number" value="{{$data->Warrenty_Number}}"  class="form-control myfont " >


                        </div>

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

                            <textarea name="remark" class="form-control" rows="4">{{$data->remark}}</textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="btn btn-info btn-block" style="font-size: small;">مشخصات شرکت قرارداد کننده</div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>اسم شرکت</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </div>

                            <input type="text" name="Name" value="{{$data->contractcompany->Name}}" id="Name" readonly class="form-control "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>شماره تماس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>

                            <input type="text" name="Phone" value="{{$data->contractcompany->Phone}}" id="Phone" readonly class="form-control "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ادرس ایمل</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-open"></i>
                            </div>

                            <input type="text" name="Email" value="{{$data->contractcompany->Email}}" id="Email" required readonly class="form-control myfont "  >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ اغاز جواز</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Date_From_Jawaz"  value="{{$data->contractcompany->Date_From_Jawaz}}"  id="Date_From_Jawaz" required class="form-control  myfont"  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ ختم جواز</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Date_To_Jawaz" id="Date_To_Jawaz" value="{{$data->contractcompany->Date_To_Jawaz}}"   required class="form-control "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تین این نمبر</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-sticky-note"></i>
                            </div>

                            <input type="text" name="Tin" value="{{$data->contractcompany->Tin}}" class="form-control myfont" required >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ثپت جواز نمبر</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-coffee"></i>
                            </div>

                            <input type="text" name="Jawaz"  value="{{$data->contractcompany->Jawaz}}" id="Jawaz" class="form-control myfont"  required >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>جواز شرکت ×</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>

                            <input type="file" name="Jawaz_File" class="form-control "   >
                            <input type="hidden" name="JawazFile" value="{{$data->contractcompany->JawazFile}}" class="form-control " required  >
                        </div>

                    </div>
                </div>

            </div>
            <div class="btn  btn-warning text-center btn-block" >لیست تغیر هیت</div>
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


            <div class="btn btn-warning btn-block" style="font-size: small;">هیت معاینه و تشریح</div>
            <div class="row">


                <div class="col-lg-12">


                    <table class="table table-bordered">
                        <thead>
                        <tr>

                            <th class="text-center">
                                <input type="text" name="IDCard" id="IDCard" class="form-control" placeholder="کار هویت هیت داخل کنید">
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

    <input type="submit" value=" ثپت کردن" id="btn_save" class="btn btn-primary" onclick="check_form()">
    <span class="badge badge-danger" id="error"></span>
</div>
        </form>

</div>

    </div>


<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>


<script>


    $("#Discount").on('keyup',function () {
        var Discount=$("#Discount").val();
        var Contract_Rupee=$("#Contract_Rupee").val();
        var Net_Discount=parseFloat(Contract_Rupee)/100*parseFloat(Discount);
        $("#Net_Amount").val(Contract_Rupee-Net_Discount);
    });

    $('#Export_End_Date').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });


    $('#Export_Strat_Date').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });


    $(".btn-danger").on('click',function () {

        var id=$(this).data("id")

        alert(id);
        $.ajax({
            url:'{{url('Delete_Member_Contract')}}',
            method:'get',
            data:{data:id},
            success:function (data) {

                if(data==true)
                {

                    $("#del_"+id).remove();
                }

            }

        })


    })


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





    });




    $('#Pro_Fid').on('change',function () {
        var val = $('#Pro_Fid').val();
        $.ajax({

            url: '{{url('Find_Project_Type')}}',
            method: 'get',
            data: {id: val},
            success: function (response) {


                $('#Pro_Type').val(response);

            }

        });


        $.ajax({

            url: '{{url('Find_Award_Company')}}',
            method: 'get',
            data: {id: val},
            success: function (response) {
                console.log(response);
                $('#Name').val(response.Name);
                $('#Phone').val(response.Phone);
                $('#Email').val(response.Email);
                $('#Jawaz').val(response.Jawaz);


            }

        });


    });








    $('#End_Date_Contract').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });

    $('#Start_Date_Contract').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });
    $('#Date_To_Item').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });

    $('#Date_From_Item').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });
    $('#Date_To_Jawaz').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });
    $('#Date_From_Jawaz').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });


    $(document).ready(function () {


        $('#add').click(function(){
var i=0;
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
                                '<input type="text" name ="rows['+i+'][Name]"  required value="'+data[0].Name+'" class="form-control txtnumber "><input type="hidden" value="'+data[0].USERID+'" name="rows['+i+'][EmpCode]" ' +


                                '</td>'+

                                '<td>'+
                                '<input type="text"  value="'+data[0].Mobile+'" required  name ="rows['+i+'][Mobile]"  class="form-control ">'+
                                '</td>'+

                                '<td>'+
                                '<input type="text"   value="'+data[0].Email+'" required id="txtjob" name ="rows['+i+'][Email]" class="form-control ">'+
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
        var Start_Date_Contract = $('#Start_Date_Contract').val();
        var End_Date_Contract = $('#End_Date_Contract').val();


        if(Start_Date_Contract != "" && End_Date_Contract != ""){
            if(End_Date_Contract <= Start_Date_Contract){

                event.preventDefault();
                $('#error').show();
                $("#btn_save").attr('disabled',true);
                $('#error').html(" تاریخ اغاز قرارداد  عقب تر از تاریخ ختم قرارداد است!");
            }
            else {
                $('#error').hide();
                $("#btn_save").removeAttr('disabled');
            }


        }
    }
</script>



    @endsection
