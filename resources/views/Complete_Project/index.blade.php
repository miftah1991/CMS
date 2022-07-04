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
            <div class="panel-title text-center">ثپت قرارداد تکمیل شده</div>

        </div>
        <form action="{{url('Add_Complete_Project')}}"  method="post"  enctype="multipart/form-data">
            @csrf
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>لست پروژه قرارداد شده</label>
                        <div class="input-group {{ $errors->has('Pro_Fid') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Pro_Fid" id="Pro_Fid" required class="form-control">
                                <option value="">پروژه را انتخاب کنید</option>
                                @foreach($register_project as $rcd)
                                <option value="{{$rcd->id}}">{{$rcd->Project_Name}}</option>
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

                            <input type="text" name="Pro_Code" id="Project_Code" readonly  required  autocomplete="off" class="form-control  myfont"  >

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

                            <input type="text" name="Exp_Date"  id="Exp_Date" autocomplete="off" readonly class="form-control myfont " >

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

                            <input type="text" id="Company_Name" name="Company_Name"  readonly class="form-control  "  >

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تصدیق پروژه</label>
                        <div class="input-group  {{ $errors->has('Confirm_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="file" name="Confirm_File"  class="form-control "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Confirm_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تامینات </label>
                        <div class="input-group {{ $errors->has('Taminat_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Taminat_File" class="form-control " >

                        </div>
                        <small   class="text-danger">{{ $errors->first('Taminat_File') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تضمین</label>
                        <div class="input-group {{ $errors->has('Warrenty_File') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file"  name="Warrenty_File" class="form-control " >

                        </div>
                        <small   class="text-danger">{{ $errors->first('Warrenty_File') }}</small>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ تکمیل شده</label>
                        <div class="input-group {{ $errors->has('Complate_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Complate_Date" id="Complate_Date" autocomplete="off" required class="form-control myfont "  >

                        </div>
                        <small class="text-danger">{{ $errors->first('Complate_Date') }}</small>
                    </div>
                </div>



                <div class="col-lg-8">

                    <div class="form-group ">
                        <label>ملاحضات</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="text" name="Remarks" class="form-control " >

                        </div>

                    </div>
                </div>



        </div>

<div class="panel-footer">

    <input type="submit" value=" ثپت کردن" id="btnsave" class="btn btn-primary">


</div>
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
                این پروژه قبلا ثپت است
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"  data-dismiss="modal">بسته</button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="PersantageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">خبرتیا</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               فیصدی این پروژه تکمیل نیست
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"  data-dismiss="modal">بسته</button>

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

                url:'{{url('Find_Project_at_Complete')}}',
                method:'get',
                data:{id:val},
                success:function (response) {

                    if(response.id>0)
                    {

                        $("#exampleModal").modal("show");
                        $('#btnsave').attr("disabled", true);



                    }
                    else
                    {

                        $('#btnsave').removeAttr("disabled");
                    }


                }

            })
// find  perstange for this project

           /* $.ajax({

                url:'{{url('Find_Project_at_Complete_Persantage')}}',
                method:'get',
                data:{id:val},
                success:function (response) {

                    if(response<100)
                    {

                        $("#PersantageModal").modal("show");

                        $('#btnsave').attr("disabled", true);


                    }
                    else
                    {

                        $('#btnsave').removeAttr("disabled");
                    }


                }

            })*/


        });





        $("#Save_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });



        $("#Complate_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });
        $("#Extand_Date").persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });
        var i=0;


    })


</script>




    @endsection
