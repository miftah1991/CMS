@extends('layouts.master')

@section('content')


<br>
    <div class="box box-info col-lg-12">
        @if($msg=Session::get('msg'))



            <div class="modal show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">خبرتیا</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{$msg}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">بسته</button>

                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="box-header">
         لست قرارداد رد شده
        </div>

        <div class="box-body">


            <table class="table table-bordered table-hover text-center" id="tablreject">
                <thead class="text-center">
                <tr >
                    <th>شماره</th>

                    <th>کود پروژه</th>
                    <th>حالت  پروژه</th>
                    <th>راپور پروژه</th>
                    <th>حکم پروژه</th>
                    <th>حالت</th>
                    <th></th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $key=>$rcd)
                <tr class="myfont" >
                    <td>{{++$key}}</td>

                    <td>@isset($rcd->registerprocuremnet->Pro_Code){{$rcd->registerprocuremnet->Pro_Code}}  @endif</td>
                    <td>
                        @if($rcd->is_reject==0)

                       <span class="badge bg-red">رد شد</span>
                            @else
قبول شد
                        @endif


                    </td>
                    <td>
                        <a href="{{asset('storage/app/public/Eval_Files')}}/{{$rcd->Report_File}}" ><span class="fa fa-download"></span></a></td>

       <td>

           <a href="{{asset('storage/app/public/Eval_Files')}}/{{$rcd->Accept_File}}" ><span class="fa fa-download"></span></a>



       </td>


                    <td>
                        @if($rcd->registerprocuremnet->is_complete==1)
                            مکمل

                        @else
                            جریان

                        @endif
                    </td>
                    <td>
                        @if($rcd->registerprocuremnet->is_complete==1)
                            <span class="fa fa-check" style="color: green"></span>

                        @else

                            <span class="fa fa-spinner fa-spin fa-1x " style="color: blue"></span>
                        @endif
                    </td>





                    <td>
                        @if($rcd->registerprocuremnet->is_complete==0)
                        <a href="Edit_Evaluation_Report/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-pencil   btn-xs btn btn-default">   </i></a>
                        @endif

                        <a href="View_Evaluation_Report/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-barcode btn-xs btn btn-primary">   </i></a>
                    </td>
                    @endforeach

                </tbody>
            </table>


        </div>



    </div>
<div class="modal fade modal-large " id="exampleModalCenter" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title btn btn-warning btn-block" id="exampleModalLongTitle">مشخصات اجناس قرارداد</h5>


            </div>
            <div class="modal-body  ">

                <div class="row">
                    <section class="col-lg-12 col-md-12">
                        <div class="box box-info">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title">قرارداد</h3>
                                <!-- tools box -->
                                <div class="pull-left box-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <div class="box-body">
                                <table class="table table-responsive ">

                                    <tr>
                                        <td colspan="4"><span class="fa fa-home fa-lg"></span>عوان پروژه </td>
                                    </tr>
                                    <tr>

                                        <td colspan="4"><textarea id="Project_Name" class="form-control"></textarea></td>

                                    </tr>
                                    <tr>
                                        <td>
                                         تمویل کننده
                                        </td>
                                        <td>
                                         <input type="text" id="Fou_Fid" class="form-control">
                                        </td>
                                        <td>
                                            شماره حکم
                                        </td>
                                        <td>
                                            <input type="text" id="Order_Number" class="form-control">
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                           حکم تاریخ
                                        </td>
                                        <td>
                                            <input type="text" id="Order_Date" class="form-control">
                                        </td>
                                        <td>
                                           قیمت تخمنی
                                        </td>
                                        <td>
                                            <input type="text" id="Rupee_Amount" class="form-control">
                                        </td>
                                    </tr>


                                </table>
                            </div>
                        </div>
                        <div class="box box-info">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title"></h3>
                                <!-- tools box -->
                                <div class="pull-left box-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <div class="box-body">

                            </div>
                        </div>
                    </section>
                </div>






            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بسته</button>

            </div>
        </div>
    </div>
</div>




<script>

    $(document).ready(function() {

        setTimeout(function(){

            $('#exampleModal').hide("modal");
            $('#exampleModal').addClass("hide");


        }, 2000);

        $("#tablreject").dataTable();


    });

</script>


    @endsection
