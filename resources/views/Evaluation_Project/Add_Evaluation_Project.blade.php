@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12">
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
            <div class="panel-title text-center">ثپت توظیف هییت ارزیابی</div>

        </div>
        <form action="{{url('Add_Evaluation')}}" method="post" enctype="multipart/form-data">
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

                                    <option value="{{$rcd->id}}">{{$rcd->Project_Name}}-{{$rcd->Pro_Code}}</option>
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

                            <input type="text" name="Project_Code"  readonly  autocomplete="off" required id="Project_Code" class="form-control myfont "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ اغاز ارزیابی</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Start_Date" autocomplete="off" required id="Start_Date" class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ ختم ارزیابی</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="End_Date"  autocomplete="off" required id="End_Date" class="form-control myfont "  >

                        </div>

                    </div>

                </div>




            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>محل ارزیابی افرا‌ء</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Eval_Place"  autocomplete="off" required id="Eval_Place" class="form-control myfont "  >

                        </div>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>پشنهاد توظیف هیت</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="file" name="Request_File" required class="form-control  "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>استعلام ها واسناد حمایوی </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Estilam_File" required class="form-control " >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">



                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>پشنهاد تمدید ارزیابی</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Extend_File" required class="form-control " >

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
                                <i class="fa fa-file"></i>
                            </div>


<textarea name="remark" class="form-control" rows="4"></textarea>
                        </div>

                    </div>
                </div>
            </div>

            <div class="btn  btn-warning text-center btn-block" >لیست هیت</div>
            <div class="row">


                <div class="col-lg-12">


                    <table class="table table-bordered">
                        <thead>
                        <tr>

                            <th class="text-center">
                                <input type="text" name="IDCard" id="IDCard" class="form-control" placeholder="لطفا کارت هیت داخل کنید">
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
                این پروژه قبلا ثپت است
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

        $("#Pro_Fid").select2({

            allowClear: true
        });




        $('#Start_Date').persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });


        $('#End_Date').persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });




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

                url:'{{url('Find_Project_at_Evaluation')}}',
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
                                '<input type="text" name ="rows['+i+'][Name]"   value="'+data[0].Name+'" class="form-control txtnumber "><input type="hidden" value="'+data[0].USERID+'" name="rows['+i+'][EmpCode]" ' +


                                '</td>'+

                                '<td>'+
                                '<input type="text"  value="'+data[0].Mobile+'"   name ="rows['+i+'][Mobile]"  class="form-control ">'+
                                '</td>'+

                                '<td>'+
                                '<input type="text"   value="'+data[0].Email+'"  id="txtjob" name ="rows['+i+'][Email]" class="form-control ">'+
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

</script>




    @endsection
