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
            <div class="panel-title text-center">ارسال ایمل  اجناس</div>

        </div>

        <form action="{{url('Insert_Email_Item_Contract')}}" method="post">
            @csrf
        <div class="panel-body">

                <div class="row">
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>موضوع ایمل</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" name="Subject"  required id="Subject"  class="form-control myfont "  >
                            <input type="hidden"  name="id"  value="{{$id}}">

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group ">
                        <label>ثپت تاریخ ایمل</label>
                        <div class="input-group {{ $errors->has('Date') ? 'has-error' : ''}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input type="text" id="Date" name="Date" autocomplete="off" required class="form-control myfont " >
                            <small class="text-danger">{{ $errors->first('Date') }}</small>
                        </div>

                    </div>

                </div>

                    <div class="col-lg-4">
                        <div class="form-group ">
                            <label>ملاحضات</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>

                                <select name="type" id="type" class="form-control">

                                    <option  value="">لطفا نوع ایمل انتخاب کنید</option>
                                    <option  value="5">اطلاع ایمیل  به هیت معاینه و تشریح  </option>
                                    <option  value="6">ارسال ایمیل تعقیبی به هیت معاینه و تشریح </option>

                                </select>



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

                                <textarea name="Remakrs" class="form-control" rows="3">

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
    <div class="row">
        <section class="col-lg-12 col-md-12 " >
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>

                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">


                    <div class="row">
                        <div class="col-lg-12">





                            <table class="table table-bordered">
                                <thead>
                                <th>شماره</th>
                                <th>نوع ایمل</th>
                                <th>تاریخ ثبت</th>
                                <th>مدت</th>
                                <th>وقت</th>
                                </thead>
                                <tbody>
                                @foreach($data as $key=>$rcd)
                                    <Tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$rcd->Type}}</td>
                                        <td>{{$rcd->Date}}</td>
                                        <td>{{$rcd->Day}}</td>

                                        <td>{{$rcd->time}}</td>
                                    </Tr>
                                @endforeach

                                </tbody>

                            </table>




                        </div>

                    </div>





                </div>
            </div>

        </section>



    </div>

</div>

<!----------------------Alert modela--------------------------->


<!-- Modal -->
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">بسته</button>

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

        $('#Date').persianDatepicker({
            formatDate: "YYYY-0M-0D"
        });


$("#type").on('change',function () {

    var id=$("#type").val();
    if(id==5)
    {
$("#Day").attr('disabled','true');
        $("#time").removeAttr('disabled');
    }
   if(id==6)
   {
       $("#time").attr('disabled','true');
       $("#Day").removeAttr('disabled');
   }


})




        });














</script>




    @endsection
