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
            <div class="panel-title text-center">تغیر کزارش  و شرکت برنده</div>

        </div>
        <form action="{{url('Update_Award')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$data->id}}">
            @csrf
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>لست پروژه منظور شده</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Pro_Fid" id="Pro_Fid"  required class="form-control">
                                <option value="">لطفا پروژه انتخاب کنید</option>
                                @foreach($register_project as $rcd)

                                    <option value="{{$rcd->id}}" @if($rcd->id==$data->Pro_Fid) selected="selected" @endif>{{$rcd->Project_Name}}</option>
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

                            <input type="text" readonly name="Project_Code" value="{{$data->registerprocurement->Pro_Code}}"  id="Project_Code" class="form-control myfont "  >

                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ تخمینی اعطایی قرارداد</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Contract_Date" id="Contract_Date" value="{{$data->Contract_Date}}" autocomplete="off" class="form-control myfont "  >

                        </div>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ نامه قبولی افر</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Offer_Date" id="Offer_Date"  value="{{$data->Offer_Date}}" autocomplete="off" class="form-control myfont  "  >


                        </div>

                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>اطلاعیه قرارداد </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Contract_File" class="form-control " >
<input type="hidden" name="ContractFile" value="{{$data->Contract_File}}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>منظوری کمیسون تدارکات ملی </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Camison_File" class="form-control " >
                            <input type="hidden" name="CamisonFile" value="{{$data->Camison_File}}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>نامه قبولی افر</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Offer_File" class="form-control " >
                            <input type="hidden" name="OfferFile" value="{{$data->Offer_File}}">
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>واحد پولی</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>

                            <select name="rupee" class="form-control" required>
                                <option value="">واحد پولی انتخاب کنید</option>
                                <option value="af" @if($data->rupee=="af") selected="selected" @endif>افغانی</option>
                                <option value="da" @if($data->rupee=="da") selected="selected" @endif>دالر</option>
                            </select>

                        </div>

                    </div>
                </div>

            </div>
            <div class="row">




                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>ملاحظات </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-expand"></i>
                            </div>
                            <textarea name="remark" class="form-control" rows="4">{{$data->remark}}</textarea>


                        </div>

                    </div>
                </div>

            </div>

            <div class="btn btn-info btn-block" style="font-size: small;"></div>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>

                        <tr>
                            <th class="text-center">
                                نام شرکت
                            </th>
                            <th>
                                شماره جواز
                            </th>
                            <th>
                                نام نماینده
                            </th>
                            <th>
                                شماره تماس
                            </th>
                            <th>
                                ایمل ادرس
                            </th>
                            <th>

                            </th>
                        </tr>

                        </thead>

                        <tbody >
                        @foreach($offer_company_List as $rcd)
                            <Tr class="text-center myfont" id="del_{{$rcd->id}}">
                                <Td>{{$rcd->Name}}</Td>
                                <Td>{{$rcd->Jawaz}}</Td>
                                <Td>{{$rcd->MemberName}}</Td>
                                <Td>{{$rcd->Phone}}</Td>
                                <Td>{{$rcd->Email}}</Td>
                                <Td><a href="#"   class="btn btn-danger delete"    data-id="{{$rcd->id}}" required ><i   class="fa fa-remove "></i> </a></Td>
                            </Tr>
                        @endforeach

                        </tbody>




                    </table>
                </div>

            </div>

            <div class="btn  btn-warning text-center btn-block" >شرکت برنده</div>
            <div class="row">


                <div class="col-lg-12">


                    <table class="table table-bordered">
                        <thead>
                        <tr>


                            <th  colspan="4">
                                <input type="button" id="add" class="btn btn-primary" value="اضافه نمودن" >
                            </th>

                        </tr>

                        <tr>
                            <th class="text-center">
                                نام شرکت
                            </th>
                            <th>
                                شماره جواز
                            </th>
                            <th>
                                نام نماینده
                            </th>
                            <th>
                                شماره تماس
                            </th>
                            <th>
                                ایمل ادرس
                            </th>
                            <th>

                            </th>
                        </tr>

                        </thead>

                        <tbody id="CompanyList" >



                        </tbody >




                    </table>

                </div>
            </div>
        </div>
<div class="panel-footer">

    <input type="submit" value=" ثپت کردن" id="save" class="btn btn-primary">


</div>
        </form>
    </div>

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">خبرتیا</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                برای این پروژه ایک بار شرکتها افرکننده ثپت شده
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">بسته</button>

            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>

<script>

    $(".delete").on('click',function () {
        var id=$(this).data("id");


        $.ajax({

            url:'{{url('Delete_CompanyContact')}}',
            method:'get',
            data:{id:id},
            success:function (response) {
                console.log(response);
                if(response==true) {

                    $("#del_"+id).remove()



                }


            }

        })

    })



    $('#Export_End_Date').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });


    $('#Export_Strat_Date').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });

    $('#Offer_Date').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });
    $('#Aoun_Date').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });
    $('#Contract_Date').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });


    $('#Anouce_Contract_Date').persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });













    $(document).ready(function () {

        $('#Pro_Fid').on('change',function () {
            var val=$('#Pro_Fid').val();

            $.ajax({

                url:'{{url('Find_Code')}}',
                method:'get',
                data:{id:val},
                success:function (response) {


                    $('#Project_Code').val(response.Pro_Code);

                }

            })


            $.ajax({

                url:'{{url('Find_Project_at_Award')}}',
                method:'get',
                data:{id:val},
                success:function (response) {
                    console.log(response);
                    if(response.id>0)
                    {

                        $("#exampleModal").modal("show");
                        $('#save').attr("disabled", true);



                    }
                    else
                    {

                        $('#save').removeAttr("disabled");
                    }


                }

            })


        });
        var i=0;


        $('#add').click(function(){

      if(i==0)
      {
            var tr='<tr class="center myfont">'+
                '<td>'+
                '<input type="text" name ="rows['+i+'][Name]" id="Name" required  class="form-control txtnumber ">' +

                '</td>'+

                '<td>'+
                '<input type="text" name ="rows['+i+'][Jawaz]"  required class="form-control txtempname">'+
                '</td>'+

                '<td>'+
                '<input type="text" name ="rows['+i+'][MemberName]"  required id="Member" class="form-control txtjob">'+
                '</td>'+

                '<Td><input type="text" name="rows['+i+'][Phone]" required class="form-control"></Td>'+
                '<Td><input type="text" name="rows['+i+'][Email]" required class="form-control"></Td>'+

                '<td class="center" style="text-align: center">'+
                '<a href="#"  id="rm" class="btn btn-danger" onclick="show();"><i   class="fa fa-remove "></i> </a>'+
                '</td>'+
                '</tr>';
     i++;
            $('#CompanyList').append(tr);
      }
        });



    })
    function show()
    {


        $('#rm').parent().parent().remove();

    }

</script>




    @endsection
