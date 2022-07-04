@extends('layouts.master')


@section('content')


<div class="col-lg-12 ">



<br> <br>
<form action="{{url('Add_Evaluation_Report')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="panel panel-info ">
        <div class="panel-heading">
            <div class="panel-title text-center">ثپت راپور هیات ارزیابی</div>



        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group ">
                        <label>لست پروژه منظور شده</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-product-hunt"></i>
                            </div>

                            <select name="Pro_Fid" id="Pro_Fid"  required class="form-control">
                                <option value="">لطفا پروژه انتخاب کنید</option>
                                @foreach($register_project as $rcd)

                                    <option value="{{$rcd->id}}">{{$rcd->Project_Name}} --{{$rcd->Pro_Code}}</option>
                                @endforeach

                            </select>

                        </div>

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

                            <input type="text" name="Project_Code" id="Project_Code" value="" required class="form-control "  >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>مسول پروژه</label>
                        <div class="input-group {{ $errors->has('Project_Member') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>

                            <input type="text" name="Project_Member" id="Project_Member" value="" required class="form-control "  >



                        </div>
                        <small class="text-danger">{{ $errors->first('Project_Member') }}</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تاریخ راپور هیئت</label>
                        <div class="input-group {{ $errors->has('Date_Reject') ? 'has-error' : ''}}">
                            <div class="input-group-addon ">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Date_Reject" value="{{old('Date_Reject')}}" id="Date_Reject" autocomplete="off" required class="form-control " >

                        </div>
                        <small class="text-danger">{{ $errors->first('Date_Reject') }}</small>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>حالت قرارداد</label>
                        <div class="input-group ">
                            <div class="input-group-addon">
                                <i class="fa fa-pagelines"></i>
                            </div>

                            <select name="Stat_Fid" id="Stat_Fid" class="form-control" required>
                                <option value="">نوع  قرارداد انتخاب کنید</option>
                               <option value="1">قبول قرارداد</option>
                                <option value="0">رد قرارداد</option>

                            </select>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>راپور ارزیابی</label>
                        <div class="input-group ">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>

                            <input type="file" name="Reject_Report_File"   class="form-control " >

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>پشنهاد </label>
                        <div class="input-group ">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Request_File"  id="Request_File"   class="form-control " >

                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
           <div class="col-lg-4">
               <div class="form-group ">
                   <label>تایید ګزارش اعلان مجدد </label>
                   <div class="input-group ">
                       <div class="input-group-addon">
                           <i class="fa fa-file-archive-o"></i>
                       </div>


                       <input type="file" name="Reject_File"  id="Reject_File" disabled="disabled"  class="form-control " >

                   </div>

               </div>
           </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>تایید ګزارش ارزیابی</label>
                        <div class="input-group ">
                            <div class="input-group-addon">
                                <i class="fa fa-file-archive-o"></i>
                            </div>


                            <input type="file" name="Accept_File"  id="Accept_File" disabled="disabled"  class="form-control " >

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


                            <textarea name="Remarks" class="form-control" rows="4"></textarea>
                        </div>

                    </div>
                </div>

            </div>


        </div>
<div class="panel-footer">

    <input type="submit" value="لغوه قرارداد"  id="btnsave" class="btn btn-primary">


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

    $('#Pro_Fid').on('change',function () {
        var val = $('#Pro_Fid').val();

        $.ajax({

            url: '{{url('Find_Code')}}',
            method: 'get',
            data: {id: val},
            success: function (response) {

                $('#Project_Member').val(response.Project_Member);
                $('#Project_Code').val(response.Pro_Code);



            }

        })
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



    $("#Date_Reject").persianDatepicker({
        formatDate: "YYYY-0M-0D"
    });
    $("#Stat_Fid").on('change',function () {

        var num =$("#Stat_Fid").val();


        if(num==1)
        {
            $("#Reject_File").attr('disabled','true');
            $("#Accept_File").removeAttr('disabled');
        }
        if(num==0)
        {
            $("#Reject_File").removeAttr('disabled');
            $("#Accept_File").attr('disabled','true');

        }



    })


    $('#Pro_Fid').on('change',function () {
        var val = $('#Pro_Fid').val();
if(val=="")
{
    alert('لطفا قرارداد انتخاب کنید');
}
else
{
    $.ajax({

        url: '{{url('Find_Eval_Report_Duplicate')}}',
        method: 'get',
        data: {id: val},
        success: function (response) {

            if(response.length>0)
            {
                alert('این قرارداد ایک بار ثپت شد');
                $("#btnsave").attr('disabled','true');
            }
            else
            { $("#btnsave").removeAttr('disabled');
            }

        }

    })
}

    });

})

</script>




    @endsection
