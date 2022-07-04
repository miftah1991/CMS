@extends('layouts.master')

@section('content')
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
    <div class="box box-info col-lg-12">

        <div class="box-header">
            لست  قراداد پلانی

        </div>

        <div class="box-body">


            <table class="table table-bordered table-hover text-center" id="tbleregister">
                <thead class="text-center">
                <tr >
                    <th>شماره</th>
                    <th>کود پروژه</th>
                    <th>تمویل کننده</th>
                    <th>نوع پروژه</th>


                    <th>قیمت تخمنی پروژه</th>
                    <th>حالت پروژه</th>
                    <th></th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $key=>$rcd)
                <tr class="myfont" >
                    <td>{{++$key}}</td>
                    <td>{{$rcd->Pro_Code}}</td>

                    <td>@isset($rcd->procurementtype->ProName){{$rcd->procurementtype->ProName}}  @endif</td>


                    <td>@isset($rcd->founder->FouName){{$rcd->founder->FouName}}  @endif</td>
                    <td>{{$rcd->Rupee_Amount}}</td>
                    <td>
                        @if($rcd->is_complete==1)
                           مکمل

                        @else
                         جریان

                        @endif
                    </td>
                    <td>
                        @if($rcd->is_complete==1)
                            <span class="fa fa-check" style="color: green"></span>

                        @else

                            <span class="fa fa-spinner fa-spin fa-1x " style="color: blue"></span>
                        @endif
                    </td>
                    <td>



                        <a href="Print_Register_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-print btn btn-primary btn-xs"> </i></a>
                            <a href="View_Register_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-barcode btn btn-info btn-xs"> </i></a>

                        @if($rcd->is_complete==0 and $rcd->reject_id==0)

                        <a href="Edit_Register_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-pencil btn btn-default btn-xs">   </i></a>
                        <a href="Reject_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-recycle btn btn-danger btn-xs"> </i></a>
                    @endif
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

    $(document).ready(function () {
       $("#tbleregister").dataTable();
    });

    setTimeout(function(){

        $('#exampleModal').hide("modal");
        $('#exampleModal').addClass("hide");


    }, 2000);

</script>



    @endsection
