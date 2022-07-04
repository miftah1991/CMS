@extends('layouts.master')


@section('content')
<br>

<div class="col-lg-12 ">
<form action="{{url('Update_Register_Project')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="panel panel-info ">
        <div class="panel-heading">
            <div class="panel-title text-center">تغیر کردن قرادادها</div>
          <input type="hidden" name="id" value="{{$edata->id}}">
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

                            <input type="text" name="Project_Name" value="{{old('Project_Name',$edata->Project_Name)}}"  class="form-control myfont "  >


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

                            <input type="text" name="Project_Code" id="Project_Code"  value="{{$edata->Pro_Code}}" required class="form-control myfont "  >

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

                            <select class="form-control myfont" required name="Fou_Fid">
                                <option value="">
                                    تمویل کننده انتخاب کو
                                </option>

                                @foreach($Founder as $rcd)
                                    <option value="{{$rcd->id}}"  {{ old('Fou_Fid') == $rcd->id ? 'selected' : '' }} @if($rcd->id==$edata->Fou_Fid) selected="selected" @endif >{{$rcd->FouName}}</option>
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

                            <input type="text" name="Order_Date" value="{{old('Order_Date',$edata->Order_Date)}}" id="Order_Date" required class="form-control myfont " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Order_Date') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>شماره حکم</label>
                        <div class="input-group {{ $errors->has('Order_Number') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-sort-numeric-asc"></i>
                            </div>

                            <input type="text" name="Order_Number" value="{{old('Order_Number',$edata->Order_Number)}}" required class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Order_Number') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>نوع پروژه</label>
                        <div class="input-group {{ $errors->has('Pro_Fid') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-pagelines"></i>
                            </div>

                          <select name="Pro_Type_Fid" class="form-control" required>
                              <option value="">نوع قرارداد انتخاب کو</option>
                @foreach($ProcurementType as $rcd)
                              <option value="{{$rcd->id}}" {{ old('Pro_Type_Fid') == $rcd->id ? 'selected' : ''}} @if($rcd->id==$edata->Pro_Type_Fid) selected="selected" @endif >{{$rcd->ProName}}</option>

@endforeach
                          </select>

                        </div>
                        <small class="text-danger">{{ $errors->first('Pro_Type_Fid') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>قیمتی تخمینی</label>
                        <div class="input-group {{ $errors->has('Rupee_Amount') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>

                            <input type="text" name="Rupee_Amount" value="{{old('Rupee_Amount',$edata->Rupee_Amount)}}" required class="form-control myfont "  >

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

                            <input type="text" name="Project_Member" value="{{old('Project_Member',$edata->Project_Member)}}" required class="form-control myfont "  >

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


                            <input type="text" name="Member_Phone"  value="{{old('Member_Phone',$edata->Member_Phone)}}"  required class="form-control myfont " >

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

                            <input type="email" name="Member_Email"  value="{{old('Member_Email',$edata->Member_Email)}}" required class="form-control myfont "  >

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

                           <select name="Province" id="Province"  class="form-control">
                             <option value="1">
                                 ولایت انتخاب کنید

                             </option>
                             @foreach($Province as $rcd)
                               <option value="{{$rcd->id}}" {{ old('Province') == $rcd->id ? 'selected' : '' }} @if($rcd->id==$edata->district->province_id) selected="selected" @endif >
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

                            <select name="Dis_Fid" id="Dis_Fid"   class="form-control myfont">
                                <option value="0">
                                   ولسوالی انتخاب کنید

                                </option>
                                @foreach($District as $rcd)
                                    <option  value="{{$rcd->id}}" {{ old('Dis_Fid') == $rcd->id ? 'selected' : '' }} @if($rcd->id==$edata->district->id) selected="selected" @endif >{{$rcd->name}}</option>
                                    @endforeach
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
                                <i class="fa fa-dollar"></i>
                            </div>

                            <input type="number" name="Accepts_Fund"  value="{{old('Accepts_Fund',$edata->Accepts_Fund)}}"  class="form-control myfont "  >

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

                            <input type="file" name="Requst_File"  class="form-control "  >
                            <input type="hidden" name="RequstFile"  value="{{$edata->Requst_File}}"  class="form-control myfont "  >
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


                            <input type="file" name="Plan_File"    class="form-control " >
                            <input type="hidden" name="PlanFile"  value="{{$edata->Plan_File}}"  class="form-control myfont " >
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

                            <input type="file" name="Basic_File"    class="form-control " >
                            <input type="hidden" name="BasicFile"  value="{{$edata->Basic_File}}"  class="form-control myfont " >

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

                            <input type="file" name="Attribute_File"    class="form-control "  >
                            <input type="hidden" name="AttributeFile"  value="{{$edata->Attribute_File}}"   class="form-control myfont "  >

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


                            <input type="file" name="Fund_File"   class="form-control " >
                            <input type="hidden" name="FundFile" value="{{$edata->Fund_File}}"  class="form-control myfont " >

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

                            <input type="text" name="Location"  value="{{old('Location',$edata->Location)}}"  required class="form-control  myfont" >

                        </div>
                        <small class="text-danger">{{ $errors->first('Location') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group ">
                        <label>واحد پولی</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>


                            <select class="form-control" required name="rupee"  >
                                <option value="">
                                    واحد پولی انتخاب کنید
                                </option>


                                <option value="af"  @if($edata->rupee=="af") selected="selected" @endif >افغانی</option>
                                <option value="da" @if($edata->rupee=="da") selected="selected" @endif  >دالر</option>

                            </select>

                        </div>

                    </div>
                </div>


                <div class="col-lg-9">
                    <div class="form-group ">
                        <label>ملاحضات</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="text" name="remarks"  value="{{old('remarks',$edata->remarks)}}"  class="form-control myfont "  >

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






    $("#Order_Date").persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });
    $("#Province").on('change',function () {
        $('#Dis_Fid').empty();
        var num =$("#Province").val();

   var option='';
        $.ajax({

            url:'{{url('GetDistrict')}}',
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




})

</script>




    @endsection
