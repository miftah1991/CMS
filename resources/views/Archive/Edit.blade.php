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
            <div class="panel-title text-center">تغیر سیستم ارشیف</div>

        </div>
        <form  action="{{url('Update_Archive')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="panel-body">

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>اسم پروژه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-university"></i>
                            </div>
<input type="hidden" name="id" value="{{$data->id}}">
                            <input type="text" name="Project_Name" id="Project_Name" value="{{$data->Project_Name}}"  required autocomplete="off" class="form-control myfont" >

                        </div>

                    </div>

                </div>




            </div>
            <div class="row">


                <div class="col-lg-4">
                    <div class="form-group">
                        <label>کود پروژه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Project_Code"  value="{{$data->Project_Code}}" id="Project_Code" autocomplete="off" class="form-control myfont "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>خانه الماری</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Arc_Fid" id="Arc_Fid"  required class="form-control myfont">
                                <option value="">لطفا خانه انتخاب کنید</option>
                                @foreach($Location as $rcd)

                                    <option value="{{$rcd->id}}" @if($data->Arc_Fid==$rcd->id) selected="selected" @endif>{{$rcd->name}}</option>
                                @endforeach

                            </select>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>سال</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="number" name="Year" value="{{$data->Year}}" required autocomplete="off" class="form-control myfont " >

                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ختم سال</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="number" name="End_year" value="{{$data->End_year}}"  required autocomplete="off" class="form-control myfont " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>شرکت قراداد کننده</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <select class="form-control" required name="Com_Fid">
                                <option value="">لطفا شرکت انتخاب کنید</option>
                                @foreach($company as $rcd)
                                    <option value="{{$rcd->id}}" @if($rcd->id==$data->Com_Fid) selected="selected" @endif>{{$rcd->Name}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>پروژه</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Project_File"  autocomplete="off" class="form-control myfont " >
<input type="hidden" name="ProjectFile" value="{{$data->Project_File}}">
                        </div>

                    </div>
                </div>
            </div>











            </div>





<div class="panel-footer">

    <input type="submit" value=" تغیر کردن" class="btn btn-primary">


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


        $("#Inv_unit").on('keyup',function () {

            var InVal=$("#Inv_unit").val();
            var UnitVal=$("#Unit_Price").val();
            var Tot=parseFloat(InVal)*parseFloat(UnitVal);
            $("#Inv_T_Price").val(Tot);

         var InvTot=parseFloat( $("#Amount").val()* parseFloat( InVal));



            $("#Inv_P_Distcount").val(InvTot);

        });




    })
    function show()
    {


        $('#rm').parent().parent().remove();

    }

</script>




    @endsection