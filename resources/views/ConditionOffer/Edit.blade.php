  @extends('layouts.master')


@section('content')
<br>
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
            <div class="panel-title text-center">ثپت شرطنامه شرکتاهای افر کننده</div>

        </div>

        <form action="{{url('Update_Condition_Offer')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$data->id}}" name="id">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">

                        <div class="form-group ">
                            <label>لست پروژه منظور شده</label>
                            <div class="input-group {{ $errors->has('Pro_Fid') ? 'has-error' : ''}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-product-hunt"></i>
                                </div>

                                <select name="Pro_Fid" id="Pro_Fid" required class="form-control ">
                                    <option value="">پروژه را انتخاب کنید</option>
                                    @foreach($register_project as $rcd)
                                        <option value="{{$rcd->id}}" @if($data->Pro_Fid==$rcd->id) selected="selected" @endif >{{$rcd->Project_Name}}-{{$rcd->Pro_Code}}</option>
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

                            <input type="text" name="Project_Code"  required id="Project_Code" readonly class="form-control myfont "  >
                            <input type="hidden" id="Ano_Fid" name="Ano_Fid">

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ ثپت شرطنامه شرکتهای افر کننده</label>
                        <div class="input-group {{ $errors->has('Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" id="Date" name="Save_Date" value="{{$data->Save_Date}}" required  autocomplete="off" class="form-control myfont " >
                            <small class="text-danger">{{ $errors->first('Date') }}</small>
                        </div>

                    </div>
                </div>
                </div>





            <div class="btn btn-warning btn-block btn-xs" style="font-size: small;">لست شرکت شرطنامه</div>
            <div class="row">


                <div class="col-lg-4">

                           نام شرکت
                       </div>
                       <div class="col-lg-4">
                           شماره جواز
                       </div>
                       <div class="col-lg-4">
                           نام نماینده
                       </div>
            </div>
            <div class="row">
                <div class="col-lg-4"><input type="text" name="Name" value="{{$data->Name}}" autocomplete="off" required class="form-control myfont"></div>
                <div class="col-lg-4"><input type="text" name="Jawaz" value="{{$data->Jawaz}}" autocomplete="off" required class="form-control myfont"></div>
                <div class="col-lg-4"><input type="text" name="MemberName" value="{{$data->MemberName}}" autocomplete="off" required class="form-control myfont"></div>


            </div>
            <div class="row">
                       <div class="col-lg-4">
                           موقف نماینده
                       </div>
                       <div class="col-lg-4">
                           خط نماینده
                       </div>
                      <div class="col-lg-4">
                افر شرکت
            </div>
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <select name="position" class="form-control" autocomplete="off" required>
                        <option value="">موقف انتخاب</option>
                        <option value="ریس" @if($data->position=="ریس") selected="selected" @endif>ریس</option>
                        <option value="معاون"@if($data->position=="معاون") selected="selected" @endif>معاون</option>
                    </select>

                </div>
                <div class="col-lg-4"><input type="file" name="positionfile" autocomplete="off"  class="form-control myfont"></div>
                <input type="hidden" name="positionfile"  value="{{$data->positionfile}}" >
                <div class="col-lg-4"> <input type="file" name="Offer_File"  autocomplete="off"  class="form-control myfont"></div>
                <input type="hidden" name="OfferFile"  value="{{$data->Offer_File}}" >
            </div>


                   <div class="row">
                       <div class="col-lg-4"> شماره تماس<input type="text" name="Phone" value="{{$data->Phone}}"  autocomplete="off" required class="form-control myfont"></div>
                       <div class="col-lg-4"> ایمل ادرس<input type="text" name="Email" value="{{$data->Email}}" autocomplete="off"  required class="form-control myfont"></div>
                       <div class="col-lg-4">   تضمین<input type="file" name="Tazmin"   autocomplete="off"  class="form-control myfont"></div>
 <input type="hidden" name="Tazmin" value="{{$data->Tazmin}}">
                   </div>
                     <div class="row">

                <div class="col-lg-4"> اغاز تاریخ تضمین<input type="text" name="Start_Date" value="{{$data->Start_Date}}" id="Start_Date" autocomplete="off" required class="form-control myfont date"></div>
                <div class="col-lg-4"> ختم تاریخ تضمین<input type="text" name="End_Date"  value="{{$data->End_Date}}" id="End_Date" autocomplete="off" required class="form-control myfont date"></div>

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
        </div>
<div class="panel-footer">

    <input type="submit" value=" ثپت کردن" id="save" class="btn btn-primary">


</div>
        </form>
    </div>

</div>
<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>
<script>
    $(document).ready(function () {


        $("#End_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });
        $("#Start_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });
        $("#Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });

    })

</script>
@endsection

