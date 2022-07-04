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
            <div class="panel-title text-center">تغیر ګزارش هیت معاینه/مدیر پروژه</div>

        </div>
        <form  action="{{url('Update_Contract_Report')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id"  value="{{$data->id}}">
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

                                    <option value="{{$rcd->id}}" @if($rcd->id==$data->Pro_Fid) selected="selected" @endif >{{$rcd->Project_Name}}</option>
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
                        <label>اسم شرکت قرارداد کننده</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-university"></i>
                            </div>

                            <input type="text" name="name" id="Name" readonly class="form-control "  >

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

                            <input type="text" name="Phone" readonly id="Phone" class="form-control myfont "  >

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


                            <input type="text"  name="Email" readonly id="Email" class="form-control myfont " >

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


                            <input type="text" name="Jawaz" readonly id="Jawaz" class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ثپت تاریخ ګزارش</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Save_Date" id="Save_Date" value="{{$data->Save_Date}}" required autocomplete="off" class="form-control myfont " >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">




                <div class="col-lg-8">
                    <div class="form-group ">
                        <label>موضوع هیات معاینه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <input type="text" name="Subject"  value="{{$data->Subject}}" required class="form-control " >

                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label> ګزارش</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Report_File"  class="form-control " >
                            <input type="hidden" name="ReportFile" value="{{$data->Report_File}}"  class="form-control " >
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">



<div class="col-lg-12">

    <textarea class="form-control" name="Remarks">
{{$data->Remarks}}
    </textarea>

</div>



            </div>











            </div>





<div class="panel-footer">

    <input type="submit" value=" تغیر کردن" id="save" class="btn btn-primary">


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
                این انوایس ایک بار داخل شد
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">بسته</button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modelinvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">خبرتیا</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                مقدار انوایس بالا داخل شد
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

        $("#Inv_Fid").on('change',function () {
            var val = $('#Inv_Fid').val();
            var Pro_Fid = $('#Pro_Fid').val();
            $.ajax({

                url: '{{url('Find_Invoice_Type')}}',
                method: 'get',
                data: {id: val,Pro_Fid:Pro_Fid},
                success: function (response) {
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


            });


        })











        $('#Pro_Fid').on('change',function () {
            var val = $('#Pro_Fid').val();

            $.ajax({

                url: '{{url('Find_Complain_Company')}}',
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

                url: '{{url('Find_Found')}}',
                method: 'get',
                data: {id: val},
                success: function (response) {
                    $('#Accepts_Fund').val(response.Accepts_Fund);

                }

            })






        });

        $('#Save_Date').persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });
        $('#Date_Accept').persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });








        $("#Amount_Invoice").focusout(function () {

            var Accepts_Fund=$("#Accepts_Fund").val();
            var Amount_Invoice=$("#Amount_Invoice").val();

            var Tot=parseFloat(Amount_Invoice)*100/parseFloat(Accepts_Fund);
            $("#Persantage").val(Tot);




            var val = $('#Pro_Fid').val();
            $.ajax({

                url: '{{url('Check_Amount_Invoice')}}',
                method: 'get',
                data: {id: val},
                success: function (response) {
                     tot= parseFloat(response)+parseFloat(Amount_Invoice) ;
                 if(tot<=Accepts_Fund)
                 {
                     console.log(response);
                     console.log(tot)
                     $('#save').attr("disabled", false);
                 }
                 else
                 {
                     $("#modelinvoice").modal("show");
                     $('#save').attr("disabled", true);
                 }
                },
                error:function (res) {
                    console.log(res);

                }

            })

        });
















    })

</script>




    @endsection
