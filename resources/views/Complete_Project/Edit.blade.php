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
            <div class="panel-title text-center">تغیر کردن قرارداد تکمیل شده</div>

        </div>
        <form action="{{url('Update_Complete_Project')}}"  method="post"  enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$data->id}}">
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

                            <select name="Pro_Fid" id="Pro_Fid" class="form-control" required>
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

                            <input type="text" name="Pro_Code" id="Project_Code" value="{{$data->registerprocurement->Pro_Code}}"  readonly  required  autocomplete="off" class="form-control myfont "  >

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

                            <input type="text" name="Exp_Date"  id="Exp_Date" autocomplete="off" readonly class="form-control " >

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

                            <input type="text" id="Company_Name" name="Company_Name"    readonly class="form-control "  >

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
                            <input type="hidden" name="ConfirmFile" value="{{$data->Confirm_File}}"  class="form-control "  >

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
                            <input type="hidden" name="TaminatFile" value="{{$data->Taminat_File}}" class="form-control " >

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
                            <input type="hidden"  name="WarrentyFile" value="{{$data->Warrenty_File}}" class="form-control " >

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

                            <input type="text" name="Complate_Date" value="{{$data->Complate_Date}}" id="Complate_Date" autocomplete="off" class="form-control myfont "  >

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

                            <input type="text" name="Remarks" value="{{$data->Remarks}}" class="form-control myfont " >

                        </div>

                    </div>
                </div>



        </div>

<div class="panel-footer">

    <input type="submit" value=" تغیر کردن" class="btn btn-primary">


</div>
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
                        '<input type="text" name ="rows['+i+'][Name]"  value="'+data[0].Name+'" class="form-control txtnumber "><input type="hidden" value="'+data[0].USERID+'" name="rows['+i+'][EmpCode]" ' +


                        '</td>'+

                        '<td>'+
                        '<input type="text"  value="'+data[0].Mobile+'"  name ="rows['+i+'][Mobile]"  class="form-control ">'+
                        '</td>'+

                        '<td>'+
                        '<input type="text"   value="'+data[0].Email+'" id="txtjob" name ="rows['+i+'][Email]" class="form-control ">'+
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