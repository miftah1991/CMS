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
            <div class="panel-title text-center">تغیر کردن شرکتهایی افر کننده</div>

        </div>

        <form action="{{url('Update_Offer_Company')}}" method="post">
            @csrf
            <input type="hidden"  name="id" value="{{$data->id}}">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">

                        <div class="form-group ">
                            <label>لست پروژه منظور شده</label>
                            <div class="input-group {{ $errors->has('Pro_Fid') ? 'has-error' : ''}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-product-hunt"></i>
                                </div>

                                <select name="Pro_Fid" id="Pro_Fid" required class="form-control">
                                    <option value="">پروژه را انتخاب کنید</option>
                                    @foreach($register_project as $rcd)
                                        <option value="{{$rcd->id}}" @if($rcd->id==$data->Pro_Fid)selected="selected" @endif>{{$rcd->Project_Name}}</option>
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
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Project_Code" value="{{ $data->registerprocuremnet->Pro_Code}}"   required id="Project_Code" readonly class="form-control myfont "  >
                            <input type="hidden" id="Ano_Fid" name="Ano_Fid" value="{{$data->Ano_Fid}}">

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ اعلان پروژه</label>
                        <div class="input-group {{ $errors->has('Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" id="Date" name="Date" value="{{$data->Offer_Date}}" required class="form-control myfont " >
                            <small class="text-danger">{{ $errors->first('Date') }}</small>
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
                                <i class="fa fa-file"></i>
                            </div>

                            <textarea name="remark" class="form-control" rows="3">
{{$data->remark}}
                            </textarea>

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
                                موقف نماینده
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
                            <Td>{{$rcd->position}}</Td>
                            <Td>{{$rcd->Phone}}</Td>
                            <Td>{{$rcd->Email}}</Td>
                            <Td><a href="#"   class="btn btn-danger delete"    data-id="{{$rcd->id}}" required ><i   class="fa fa-remove "></i> </a></Td>
                        </Tr>
@endforeach

                        </tbody>




                    </table>
                </div>

            </div>



            <div class="btn btn-warning btn-block" style="font-size: small;">لست شرکت افر کننده</div>
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
        موقف نماینده
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

    <input type="submit" value=" ثپت کردن" id="save" class="btn btn-primary">


</div>
        </form>
    </div>

</div>

<!----------------------Alert modela--------------------------->


<!-- Modal -->
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

    $(document).ready(function () {


        $('#Date').persianDatepicker({
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
        var val=$('#Pro_Fid').val();
       $.ajax({

           url:'{{url('Find_Code')}}',
           method:'get',
           data:{id:val},
           success:function (response) {
$('#Ano_Fid').val(response.id);

$('#Project_Code').val(response.Pro_Code);

           }

       })


            $.ajax({

                url:'{{url('Find_Project')}}',
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









        var i=1;
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
               ' <Td>'+
                '<select name="rows[0][position]" class="form-control" required>'+
            '<option value="">موقف انتخاب</option>'+
            '<option value="ریس">ریس</option>'+
                '<option value="معاون">معاون</option>'+
                '</select>'+

              '</Td>'+
                '<Td><input type="text" name="rows['+i+'][Phone]" required class="form-control"></Td>'+
                '<Td><input type="text" name="rows['+i+'][Email]" required class="form-control"></Td>'+

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


    ///////Delete Record from Offer Company List

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






</script>




    @endsection
