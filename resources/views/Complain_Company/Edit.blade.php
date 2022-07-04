@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">

    <div class="panel panel-danger ">
        <div class="panel-heading">
            <div class="panel-title text-center">تغیر کردن اعتراض داوطلبان</div>

        </div>
        <form  action="{{url('Update_Complain')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
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

                            <input type="text" name="Project_Code"  value="{{$data->registerprocurement->Pro_Code}}" readonly id="Project_Code" class="form-control myfont "  >

                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>اسم شرکت برند</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-university"></i>
                            </div>

                            <input type="text" name="name" id="Name"  value=" @isset($data->companycontact->Name){{$data->companycontact->Name}} @endisset" readonly class="form-control myfont "  >

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

                            <input type="text" name="Phone" readonly id="Phone"  value="@isset($data->registerprocurement->award->Bank) {{$data->registerprocurement->award->Bank}} @endisset" class="form-control myfont "  >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ادرس ایمل</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-open"></i>
                            </div>


                            <input type="text"  name="Email" readonly id="Email"  value="    @isset($data->companycontact->Email) {{$data->companycontact->Email}} @endisset"  class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>جواز شرکت</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-open"></i>
                            </div>


                            <input type="text" name="Jawaz" readonly id="Jawaz" value="  @isset($data->companycontact->Jawaz) {{$data->companycontact->Jawaz}} @endisset" class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ ثبت اعتراض</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Save_Date" id="Save_Date" value="{{$data->Save_Date}}"  class="form-control myfont " >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>اعتراض داوطلبان </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Complain_File" class="form-control " >
                            <input type="hidden" value="{{$data->Complain_File}}" id="ComplainFile">

                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>ملاحظات</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
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
                        @foreach($companycontract as $rcd)
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

            <div class="btn  btn-warning text-center btn-block" >شرکت اعتراض کننده</div>
            <div class="row">


                <div class="col-lg-12">


                    <table class="table table-bordered">
                        <thead>
                        <tr>


                            <th  colspan="4">
                                <input type="button" id="add" class="btn btn-primary" value="اضافه نمودن شرکت" >
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

                        <tbody id="CompanyList">



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



        $('#Save_Date').persianDatepicker({
            formatDate: "YYYY-0M-0D"
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





        });

        $('#Pro_Fid').on('change',function () {
            var val = $('#Pro_Fid').val();
            $.ajax({

                url: '{{url('Find_Complain_Company')}}',
                method: 'get',
                data: {id: val},
                success: function (response) {
                    $('#Name').val(response.Name);
                    $('#Phone').val(response.Phone);
                    $('#Email').val(response.Email);
                    $('#Jawaz').val(response.Jawaz);


                }

            });

        });



        var i=0;
        $('#add').click(function(){


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
                '<Td><input type="Email" name="rows['+i+'][Email]" required class="form-control"></Td>'+

                '<td class="center" style="text-align: center">'+
                '<a href="#"  id="rm" class="btn btn-danger" onclick="show();"><i   class="fa fa-remove "></i> </a>'+
                '</td>'+
                '</tr>';

            $('#CompanyList').append(tr);
            ++i;
        });


    })
    function show()
    {


        $('#rm').parent().parent().remove();

    }

    $(".delete").on('click',function () {
        var id=$(this).data("id");


        $.ajax({

            url:'{{url('Delete_Complain_Company')}}',
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
</script>




    @endsection