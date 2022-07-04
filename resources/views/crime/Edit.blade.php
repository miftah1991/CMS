@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">

    <div class="panel panel-danger ">


        <div class="panel-heading">
            <div class="panel-title text-center">تغیر کردن جریمه قراردادی</div>

        </div>
        <form action="{{url('Update_Crime')}}"  method="post"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id"  value="{{$data->id}}">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>لست پروژه قرارداد شده</label>
                        <div class="input-group {{ $errors->has('Pro_Fid') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Pro_Fid" id="Pro_Fid" class="form-control">
                                <option value="">پروژه را انتخاب کنید</option>
                                @foreach($register_project as $rcd)
                                <option value="{{$rcd->id}}" @if($data->Pro_Fid==$rcd->id) selected="selected" @endif>{{$rcd->Project_Name}}</option>
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
                        <div class="input-group {{ $errors->has('Project_Code') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Pro_Code" id="Project_Code"  value="{{$data->registerprocurement->Pro_Code}}" readonly  required  autocomplete="off" class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Project_Code') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ ختم قرارداد</label>
                        <div class="input-group {{ $errors->has('Exp_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Exp_Date"  id="Exp_Date" value="{{$contract->End_Date_Contract}}" autocomplete="off" readonly class="form-control myfont " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Exp_Date') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>شرکت قرارداد کننده</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" id="Company_Name" name="Company_Name"   readonly class="form-control "  >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>علت جریمه</label>
                        <div class="input-group {{ $errors->has('Extend_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="text" name="Name" id="Name"  value="{{$data->Name}}"  autocomplete="off" class="form-control">

                        </div>
                        <small   class="text-danger">{{ $errors->first('Extend_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ثپت تاریخ جریمه</label>
                        <div class="input-group {{ $errors->has('Save_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="text" name="Save_Date" value="{{$data->Save_Date}}" autocomplete="off" id="Save_Date" class="form-control">

                        </div>
                        <small   class="text-danger">{{ $errors->first('Save_Date') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>حکم جریمه</label>
                        <div class="input-group {{ $errors->has('Order_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <input type="file" name="Order_File"  class="form-control "  >
                            <input type="hidden" name="OrderFile"  value="{{$data->Order_File}}">
                        </div>
                        <small class="text-danger">{{ $errors->first('Order_File') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>مقدار قرارداد</label>
                        <div class="input-group {{ $errors->has('day') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="number" name="Contract_Rupee" value="{{$data->Contract_Rupee}}" id="Contract_Rupee" readonly autocomplete="off" class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('day') }}</small>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>حداکثر جریمه تاخیر روز</label>
                        <div class="input-group {{ $errors->has('day') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="number" name="day" id="day"  value="{{$data->day}}" autocomplete="off" class="form-control myfont crime "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('day') }}</small>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>فیصدی جریمه تاخیر در روز</label>
                        <div class="input-group {{ $errors->has('day') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="crime" id="crime"  value="{{$data->crime}}" autocomplete="off" class="form-control myfont crime "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('day') }}</small>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>فیصدی جریمه تاخیر</label>
                        <div class="input-group {{ $errors->has('Amount') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="number" name="Amount" value="{{$data->Amount}}"  id="Amount" autocomplete="off" class="form-control myfont crime "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Amount') }}</small>
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


                            <textarea name="remark"  class="form-control" rows="2">{{$data->remark}}</textarea>
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

        $("#Pro_Fid").select2({

            allowClear: true
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


            $.ajax({

                url: '{{url('Find_Complain_Company')}}',
                method: 'get',
                data: {id: val},
                success: function (response) {
                    console.log(response);
                    $('#Company_Name').val(response.Name);



                }


            });

            $.ajax({

                url: '{{url('Find_Contract_List')}}',
                method: 'get',
                data: {id: val},
                success: function (response) {
                    console.log(response);
                    $('#Contract_Rupee').val(response.Contract_Rupee);
                    $('#Exp_Date').val(response.End_Date_Contract);


                }


            });


        });





        $("#Save_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });



        $("#End_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });
        $("#Extand_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });
        var i=0;


    })



    $(".crime").on('keyup',function () {

        var day= $("#day").val();
        var crime=parseFloat($("#crime").val());


        var contract= $("#Contract_Rupee").val();
         var net_contract=parseFloat(crime*contract/100);

        var net=parseFloat(day)*parseFloat(net_contract);
        $("#Amount").val(net);



    })










</script>




    @endsection
