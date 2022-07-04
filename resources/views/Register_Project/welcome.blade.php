@extends('layouts.master')


@section('content')


<div class="col-lg-12 ">
    @if($msg=Session::get('msg'))
        <div class="alert alert-info   show" role="alert">
            {{$msg}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif
<form action="{{url('Add_Register_Project')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="panel panel-info ">
        <div class="panel-heading">
            <div class="panel-title text-center">ثپت قرادادها</div>
            @if(isset($id))
           <input type="hidden" id="showinsert" value="{{$id}}">
            @else
                <input type="hidden" id="showinsert" value="">
            @endif
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>نام پروژه</label>
                        <div class="input-group {{ $errors->has('Project_Name') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <input type="text" name="Project_Name" value="{{old('Project_Name')}}"  autocomplete="off" class="form-control "  >


                        </div>
                        <small class="text-danger">{{ $errors->first('Project_Name') }}</small>
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

                            <input type="text" name="Project_Code" id="Project_Code" autocomplete="off"  required class="form-control myfont "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>منبع تمویل کننده</label>
                        <div class="input-group {{ $errors->has('Fou_Fid') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-code"></i>
                            </div>

                            <select class="form-control" required name="Fou_Fid">
                                <option value="">
                                    تمویل کننده انتخاب کنید
                                </option>
                                @foreach($Founder as $rcd)
                                    <option value="{{$rcd->id}}"  {{ old('Fou_Fid') == $rcd->id ? 'selected' : '' }}  >{{$rcd->FouName}}</option>
                                @endforeach
                            </select>

                        </div>
                        <small class="text-danger">{{ $errors->first('Fou_Fid') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ حکم</label>
                        <div class="input-group {{ $errors->has('Order_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon ">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Order_Date" value="{{old('Order_Date')}}" id="Order_Date" autocomplete="off"  required class="form-control myfont " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Order_Date') }}</small>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>شماره حکم</label>
                        <div class="input-group {{ $errors->has('Order_Number') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-sort-numeric-asc"></i>
                            </div>

                            <input type="text" name="Order_Number" value="{{old('Order_Number')}}" autocomplete="off"  id="Order_Number" required class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Order_Number') }}</small>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>نوع پروژه</label>
                        <div class="input-group {{ $errors->has('Pro_Type_Fid') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-pagelines"></i>
                            </div>

                          <select name="Pro_Type_Fid" class="form-control" required>
                              <option value="">نوع قرارداد انتخاب کنید</option>
                @foreach($ProcurementType as $rcd)
                              <option value="{{$rcd->id}}" {{ old('Pro_Type_Fid') == $rcd->id ? 'selected' : '' }}>{{$rcd->ProName}}</option>

@endforeach
                          </select>

                        </div>
                        <small class="text-danger">{{ $errors->first('Pro_Type_Fid') }}</small>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>واحد پولی</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-dollar"></i>
                            </div>

                            <select class="form-control" required name="rupee"  >
                                <option value="">
                                    واحد پولی انتخاب کنید
                                </option>

                                <option value="af"  >افغانی</option>
                                <option value="da"  >دالر</option>

                            </select>

                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>قیمتی تخمینی</label>
                        <div class="input-group {{ $errors->has('Rupee_Amount') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa  fa-money"></i>
                            </div>

                            <input type="number" name="Rupee_Amount"  autocomplete="off"  id="Rupee_Amount" value="{{old('Rupee_Amount')}}" required class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Rupee_Amount') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>مسول پروژه</label>
                        <div class="input-group {{ $errors->has('Project_Member') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>

                            <input type="text" name="Project_Member"  autocomplete="off"  value="{{old('Project_Member')}}" required class="form-control "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Project_Member') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group  {{ $errors->has('Member_Phone') ? 'has-error' : ''}}">
                        <label>شماره تماس </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>


                            <input type="text" name="Member_Phone"  autocomplete="off"  value="{{old('Member_Phone')}}"  required class="form-control myfont " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Member_Phone') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ایمل ادرس</label>
                        <div class="input-group {{ $errors->has('Member_Email') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>

                            <input type="email" name="Member_Email"  autocomplete="off"  value="{{old('Member_Email')}}" required class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Member_Email') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ولایت</label>
                        <div class="input-group {{ $errors->has('Province') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card"></i>
                            </div>

                           <select name="Province" id="Province" required class="form-control">
                             <option value="1">
                                 ولایت انتخاب کنید

                             </option>
                             @foreach($Province as $rcd)
                               <option value="{{$rcd->id}}" {{ old('Province') == $rcd->id ? 'selected' : '' }}>
                                 {{$rcd->name}}

                               </option>
                                 @endforeach
                           </select>

                        </div>
                        <small class="text-danger">{{ $errors->first('Province') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group  {{ $errors->has('Dis_Fid') ? 'has-error' : ''}} ">
                        <label>ولسوالی </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-address-card"></i>
                            </div>

                            <select name="Dis_Fid" id="Dis_Fid"  required class="form-control">
                                <option value="1">
                                   ولسوالی انتخاب کنید

                                </option>
                            </select>

                        </div>
                        <small class="text-danger">{{ $errors->first('Dis_Fid') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>بودجه منظوره شده</label>
                        <div class="input-group {{ $errors->has('Accepts_Fund') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>

                            <input type="number" name="Accepts_Fund"  autocomplete="off" id="Accepts_Fund"  value="{{old('Accepts_Fund')}}" required class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Accepts_Fund') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>پشنهاد منظوری تدارکات</label>
                        <div class="input-group {{ $errors->has('Requst_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="file" name="Requst_File"  value="{{old('Requst_File')}}" m class="form-control "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Requst_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>پلان تدارکاتی </label>
                        <div class="input-group {{ $errors->has('Plan_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Plan_File"  value="{{old('Plan_File')}}"  class="form-control " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Plan_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>فورم معلوماتی اپتدایی</label>
                        <div class="input-group {{ $errors->has('Basic_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Basic_File"  value="{{old('Basic_File')}}"  class="form-control " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Basic_File') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>مشخصات پشنهاد شده</label>
                        <div class="input-group {{ $errors->has('Attribute_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="file" name="Attribute_File"  value="{{old('Attribute_File')}}"   class="form-control "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Attribute_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>منظوری بودیجه </label>
                        <div class="input-group {{ $errors->has('Attribute_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Fund_File"  value="{{old('Fund_File')}}"  class="form-control " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Fund_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>موقعیت پروژه</label>
                        <div class="input-group {{ $errors->has('Location') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="text" name="Location" autocomplete="off"   value="{{old('Location')}}"  required class="form-control myfont " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Location') }}</small>
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

                            <textarea name="remarks" class="form-control" rows="3">

                            </textarea>


                        </div>

                    </div>
                </div>

            </div>


        </div>
<div class="panel-footer">

    <input type="submit" value=" ثپت کردن" class="btn btn-primary">


</div>

    </div>
</form>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    Registration done Successfully</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close</button>
                <button type="button" class="btn btn-primary">
                    Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>










<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>

<script>

$(document).ready(function () {



    $("#Pro_Fid").select2({

        allowClear: true
    });



    $('#countvalue').each(function (_, self) {
        jQuery({
            Counter: 0
        }).animate({
            Counter: $(self).text()
        }, {
            duration: 1000,
            easing: 'swing',
            step: function () {
                $(self).text(Math.ceil(this.Counter));
            }
        });
    });



    $("#Order_Date").persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });
    $("#Province").on('change',function () {
        $('#Dis_Fid').empty();
        var num =$("#Province").val();

   var option='';
        $.ajax({

            url:'GetDistrict',
            method:'get',
            data:{data:num},
            success:function (data) {


                    for (var i=0;i<data.length;i++)
                    {
                        option='<option value="'+data[i].id+'">'+data[i].name+'</option>'
                        $('#Dis_Fid').append(option);
                    }


            }



        })


    })








    $(function () {
        $('#Rupee_Amount').keyup(function (e) {
            var ctrlKey = 67, vKey = 86;
            if (e.keyCode != ctrlKey && e.keyCode != vKey) {
                $('#Rupee_Amount').val(persianToEnglish($(this).val()));
            }
        });
    });
    $(function () {
        $('#Accepts_Fund').keyup(function (e) {
            var ctrlKey = 67, vKey = 86;
            if (e.keyCode != ctrlKey && e.keyCode != vKey) {
                $('#Accepts_Fund').val(persianToEnglish($(this).val()));
            }
        });
    });

    $(function () {
        $('#Order_Number').keyup(function (e) {
            var ctrlKey = 67, vKey = 86;
            if (e.keyCode != ctrlKey && e.keyCode != vKey) {
                $('#Order_Number').val(persianToEnglish($(this).val()));
            }
        });
    });









    function persianToEnglish(input) {
        var inputstring = input;
        var persian = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"]
        var english = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]
        for (var i = 0; i < 10; i++) {
            var regex = new RegExp(persian[i], 'g');
            inputstring = inputstring.toString().replace(regex, english[i]);
        }
        return inputstring;
    }







})

</script>




    @endsection
