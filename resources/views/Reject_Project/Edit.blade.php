@extends('layouts.master')


@section('content')


<div class="col-lg-12 ">



<br> <br>
<form action="{{url('Update_Reject_Project')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="panel panel-info ">
        <div class="panel-heading">
            <div class="panel-title text-center">لغوه قرادادها</div>

           <input type="hidden" name="id" value="{{$data->id}}">
<input type="hidden" name="Pro_Fid" value="{{$data->Pro_Fid}}">
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

                            <input type="text" name="Project_Name" value="{{$data->registerprocurement->Project_Name}}" autocomplete="off"  class="form-control "  >


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

                            <input type="text" name="Project_Code" id="Project_Code" value="{{$data->registerprocurement->Pro_Code}}" required class="form-control "  >

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

                            <input type="text" name="Project_Code" id="Project_Code" value="{{$data->registerprocurement->founder->FouName}}" required class="form-control "  >



                        </div>
                        <small class="text-danger">{{ $errors->first('Fou_Fid') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ لغوه قرارداد</label>
                        <div class="input-group {{ $errors->has('Order_Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon ">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Date_Reject" value="{{$data->Date_Reject}}" id="Order_Date" autocomplete="off" required class="form-control " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Order_Date') }}</small>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>درحالت نوع لغوه قرارداد</label>
                        <div class="input-group ">
                            <div class="input-group-addon">
                                <i class="fa fa-pagelines"></i>
                            </div>

                            <select name="Stat_Fid" class="form-control" required>
                                <option value="">نوع لغوه قرارداد انتخاب کنید</option>
                                @foreach($statustype as $rcd)
                                    <option value="{{$rcd->id}}" @if($data->Stat_Fid==$rcd->id) selected="selected"  @endif>{{$rcd->Stat_Name}}</option>

                                @endforeach
                            </select>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>حکم لغوه قرارداد </label>
                        <div class="input-group ">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Reject_File"   class="form-control " >
                            <input type="hidden" name="RejectFile" value="{{$data->Reject_File}}"  class="form-control " >
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>راپور رد</label>
                        <div class="input-group ">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Report_File"    class="form-control " >

                            <input type="hidden" name="ReportFile"  value="{{$data->Report_File}}"   class="form-control " >
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="form-group ">
                        <label>ملاحضات</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>

                            <input type="text" name="Remarks"  value="{{$data->Remarks}}"  class="form-control "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group ">
                        <label>حالت</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>
                            <select name="Status" class="form-control" required>

                                    <option value="1" >لغوه قرارداد</option>



                            </select>

                        </div>

                    </div>
                </div>
            </div>


        </div>
<div class="panel-footer">

    <input type="submit" value="تغیر" class="btn btn-primary">


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




})

</script>




    @endsection
