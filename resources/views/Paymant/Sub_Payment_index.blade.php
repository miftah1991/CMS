@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">

    <div class="panel panel-danger ">
        <div class="panel-heading">
            <div class="panel-title text-center"></div>

        </div>
        <form  action="{{url('Add_Sub_Paymant')}}" method="post" enctype="multipart/form-data">

            <input type="hidden" name="Pay_Fid" value="{{$data->id}}" readonly>
            <input type="hidden" name="Pro_Fid" value="{{$data->Pro_Fid}}" readonly>
            @csrf
        <div class="panel-body">


            <div class="row">


                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>Quntity</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-open"></i>
                            </div>


                            <input type="text"  name="Qunity"  value="{{$data->Qunity}}"   readonly id="Qunity" class="form-control MulQuntity " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>Unite Price </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-open"></i>
                            </div>


                            <input type="text" name="Unit_Price" value="{{$data->Unit_Price}}"  readonly id="Unit_Price" class="form-control  MulQuntity " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>Total Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Total_Price" value="{{$data->Total_Price}}"  readonly id="Total_Price" class="form-control " >

                        </div>

                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>Discount</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Discount" value="{{$data->Discount}}"  readonly id="Discount" max="100" class="form-control " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label></label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Amount"  value="{{$data->Amount}}" readonly  id="Amount" class="form-control " >

                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>Price After Discount</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Price_Distcount" value="{{$data->Price_Distcount}}"  readonly  id="Price_Distcount" class="form-control " >

                        </div>

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12 ">

                    <div class="panel panel-danger ">
                        <div class="panel-heading">
                            <div class="panel-title text-center">ثپت اینوایس</div>

                        </div>

                            <div class="panel-body">



                                <div class="row">


                                    <div class="col-lg-3">
                                        <div class="form-group ">
                                            <label>Inovice</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-product-hunt"></i>
                                                </div>

                                                <select name="Inv_Type_Fid" id="Inv_Type_Fid"  required class="form-control">
                                                    <option value="">لطفا پروژه انتخاب کنید</option>
                                                    @foreach( $Invoicetype as $rcd)

                                                        <option value="{{$rcd->id}}">{{$rcd->name}}</option>
                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group ">
                                            <label>Unit </label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope-open"></i>
                                                </div>


                                                <input type="text" name="Inv_unit"  id="Inv_unit" class="form-control " >

                                            </div>

                                        </div>
                                    </div>



                                    <div class="col-lg-3">
                                        <div class="form-group ">
                                            <label>T.Price</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>

                                                <input type="text" name="Inv_T_Price" id="Inv_T_Price" class="form-control " >

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group ">
                                            <label>P.After Discount</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>

                                                <input type="text" name="Inv_P_Distcount" id="Inv_P_Distcount"  autocomplete="off" class="form-control " >

                                            </div>

                                        </div>
                                    </div>

                                </div>







                            </div>


                    </div>
                </div>

            </div>

            <div class="btn  btn-warning text-center btn-block" >شرکت اعتراض کننده</div>

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

        $("#Discount").on('keyup',function () {

            var TotVal=$("#Total_Price").val();
            var DisVal=$("#Discount").val();
            var Net_Price=parseFloat(TotVal)-(parseFloat(TotVal) * parseFloat(DisVal)/100);
           // alert(Net_Price);
            $("#Price_Distcount").val(Net_Price);

            var UnitVal=$("#Unit_Price").val();
            var Net_Amount=parseFloat(UnitVal)-(parseFloat(UnitVal)*parseFloat(DisVal)/100);
$("#Amount").val(Net_Amount);

        });





    })
    function show()
    {


        $('#rm').parent().parent().remove();

    }

</script>




    @endsection