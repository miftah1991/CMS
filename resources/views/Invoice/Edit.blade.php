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
            <div class="panel-title text-center">تغیر کردن انوایس</div>

        </div>
        <form  action="{{url('Update_Invoice')}}" method="post" enctype="multipart/form-data">
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

                            <input type="text" name="Project_Code" value="{{$data->registerprocurement->Pro_Code}}" readonly id="Project_Code" class="form-control myfont "  >

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

                            <input type="text" name="name" id="Name"  value="@isset($com_data->Name) {{$com_data->Name}} @endisset " readonly class="form-control "  >

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

                            <input type="text" name="Phone" readonly id="Phone" value="@isset($com_data->Phone) {{$com_data->Phone}} @endisset " class="form-control myfont "  >

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


                            <input type="text"  name="Email" readonly id="Email" value="@isset($com_data->Email) {{$com_data->Email}} @endisset " class="form-control " >

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


                            <input type="text" name="Jawaz" readonly id="Jawaz" value="@isset($com_data->Jawaz) {{$com_data->Jawaz}} @endisset " class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ثپت تاریخ انوایس</label>
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




                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>انوایس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Inv_Fid" id="Inv_Fid"  required class="form-control">
                                <option value="">لطفا پروژه انتخاب کنید</option>
                                @foreach($Invoicetype as $rcd)

                                    <option value="{{$rcd->id}}" @if($rcd->id==$data->Inv_Fid)  selected="selected" @endif >{{$rcd->name}}</option>
                                @endforeach

                            </select>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>چک وارده  انوایس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Check_Invvoice_File" required class="form-control " >
                            <input type="hidden" name="CheckInvvoiceFile" value="{{$data->Check_Invvoice_File}}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>فایل انوایس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Invoice_File"  class="form-control " >
<input type="hidden" name="InvoiceFile" value="{{$data->Invoice_File}}">
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">




                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>مقدار انوایس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>


                            <input type="number" name="Amount_Invoice"  value="{{$data->Amount_Invoice}}" min="1" max="100" id="Amount_Invoice" required class="form-control myfont " >
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>بودجه پروژه </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <input type="text" name="Accepts_Fund" value="{{$Project_Found->Accepts_Fund}}" id="Accepts_Fund" readonly required class="form-control myfont " >


                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>فیصدی مطابق مقدار انوایس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="text" name="Persantage" id="Persantage" value="{{$data->Persantage}}" readonly required class="form-control myfont " >


                        </div>

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>تاریخ تسلیمی اجناس</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="text" name="Date_Accept" id="Date_Accept"  value="{{$data->Date_Accept}}" required class="form-control myfont " >


                        </div>

                    </div>
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
                       console.log(response);
                        $("#exampleModal").modal("show");
                        $('#save').attr("disabled", true);



                    }
                    else
                    {
                        console.log(response);
                        $('#save').removeAttr("disabled");
                    }



                }


            });


        })



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



$(".MulQuntity").on('keyup',function () {

    var QVal=$("#Qunity").val();
    var UnitVal=$("#Unit_Price").val();
    var Tot=parseFloat(QVal)*parseFloat(UnitVal);
    $("#Total_Price").val(Tot);


});




        $("#Inv_unit").on('keyup',function () {

            var InVal=$("#Inv_unit").val();
            var UnitVal=$("#Unit_Price").val();
            var Tot=parseFloat(InVal)*parseFloat(UnitVal);
            $("#Inv_T_Price").val(Tot);

         var InvTot=parseFloat( $("#Amount").val()* parseFloat( InVal));



            $("#Inv_P_Distcount").val(InvTot);

        });




    })

</script>




    @endsection