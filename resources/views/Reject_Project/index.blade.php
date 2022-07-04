@extends('layouts.master')


@section('content')


<div class="col-lg-12 ">



<br> <br>
<form action="{{url('Add_Reject_Project')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="panel panel-info ">
        <div class="panel-heading">
            <div class="panel-title text-center">لغوه قرادادها</div>

           <input type="hidden" name="id" id="id" value="{{$data->id}}">

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

                            <input type="text" name="Project_Name" value="{{$data->Project_Name}}" autocomplete="off"  class="form-control "  >


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

                            <input type="text" name="Project_Code" id="Project_Code" value="{{$data->Pro_Code}}" required class="form-control "  >

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

                            <input type="text" name="Project_Code" id="Project_Code" value="{{$data->founder->FouName}}" required class="form-control "  >



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

                            <input type="text" name="Date_Reject" value="{{old('Order_Date')}}" id="Order_Date" autocomplete="off" required class="form-control " >

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

                            <select name="Stat_Fid" id="Stat_Fid" class="form-control" required>
                                <option value="">نوع لغوه قرارداد انتخاب کنید</option>
                                @foreach($statustype as $rcd)
                                    <option value="{{$rcd->id}}" >{{$rcd->Stat_Name}}</option>

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

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ګزارش قرارداد</label>
                        <div class="input-group ">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Report_File"  value="{{$data->Report_File}}"  required class="form-control " >

                        </div>

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

                            <input type="text" name="Remarks"  value="{{old('remarks')}}"  class="form-control "  >

                        </div>

                    </div>
                </div>

            </div>


        </div>
<div class="panel-footer">

    <input type="submit" value="لغوه قرارداد" id="btnsave" class="btn btn-primary">


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
                 در این حالت یک بار این قرارداد لغوه شد</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    بسته</button>

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

    $("#Stat_Fid").on('change',function () {
        var Pro_Fid=$("#id").val();
        var Stat_Fid=$("#Stat_Fid").val();


        $.ajax({

            url:'{{url('Find_Duplicate_Reject_Project')}}',
            method:'get',
            data:{Pro_Fid:Pro_Fid,Stat_Fid:Stat_Fid},
            success:function (res) {
                console.log(res);
       if(res.length>0)
       {
           console.log(res.length);

           $("#btnsave").attr('disabled','disabled');
           $("#myModal").modal("show");
       }
       else
                {
                    $("#btnsave").removeAttr('disabled');

                }



            }


        })


    })




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
