@extends('layouts.master')

@section('content')

    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">قرارداد</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" id="btnprint"><i class="fa fa-print"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body  ">

                    <table class="table table-responsive ">

                        <tr>
                            <td colspan="4"><span class="fa fa-home fa-lg btn btn-warning"></span>عنوان پروژه   </td>
                        </tr>

                        <tr>

                            <td colspan="4">{{$data->Project_Name}}</td>

                        </tr>
                        <tr>
                            <td colspan="4">
                                <span class="btn btn-primary btn-block btn-xs"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-user fa-lg btn btn-info"></span>    تمویل کننده
                            </td>
                            <td>
                                @isset($data->founder->FouName){{$data->founder->FouName}}  @endif
                            </td>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-info"></span>
                                شماره حکم


                            </td>
                            <td>
                                {{$data->Order_Number}}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>       واحد پولی
                            </td>
                            <td>

                               @if($data->rupee =='af') افغانی @else  دالر @endif
                            </td>
                            <td>
                                <span class="fa  fa-sort-numeric-desc btn btn-default fa-lg"></span>       کود پروژه
                            </td>
                            <td>
                                {{$data->Pro_Code}}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>   نوع پرژوه
                            </td>
                            <td>
                                {{$data->procurementtype->ProName}}
                            </td>
                            <td>
                                <span class="fa  fa-money fa-lg btn btn-default"></span>موقعیت پروژه
                            </td>
                            <td class="myfont">
                   {{$data->Location}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-user-md fa-lg btn btn-default"></span>  شرکت قراداد کننده
                            </td>
                            <td>
                                {{$contractComapny->Name}}
                            </td>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-default"></span>تاریخ ختم قرارداد
                            </td>
                            <td class="myfont">
                                {{$contract->End_Date_Contract}}
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h4 class="box-title">لست وصولی پول</h4>
                    <!-- tools box -->

                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive ">


                        <table class="table table-bordered" >
                            <thead>
                            <tr>

                                <th>شماره</th>
                                <th>نوع پرداخت فیصدی</th>
                                <th>ثپت تاریخ</th>
                                <th>فیصدی</th>
                                <th>پول قرارداد</th>
                                <th>شروع تاریخ</th>
                                <th>تاریخ ختم</th>
                                <th>مبلغ پیش پرداخت</th>
                                <th>بانک مربوطه</th>
                                <th>شماره ګرنټی</th>


                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $tot_per=0;
                            $tot_Net=0;
                            ?>
@foreach($persantage   as $key=>$rcd)

    <?php
    $tot_per=$tot_per+$rcd->Persantage;
    $tot_Net=$tot_Net+$rcd->Net_Amount;

    ?>

                            <tr class="myfont">

                                <td>{{++$key}}</td>
                                <td>{{$rcd->Per_Name}}</td>
                                <td>{{$rcd->Date}}</td>
                                <td>{{$rcd->Persantage}}</td>
                                <td>{{$rcd->Amount}}</td>
                                <td>{{$rcd->Start_Date_Tazmin}}</td>
                                <td>{{$rcd->End_Date_Tazmin}}</td>
                                <td>{{$rcd->Net_Amount}}</td>
                                <td>{{$rcd->bank}}</td>
                                <td>{{$rcd->Warrenty_Number}}</td>





                            </tr>

@endforeach
                            <tr>
                                <td colspan="10">

                                    <div class="btn btn-warning btn-block btn-xs"></div>
                                </td>
                            </tr>
<tr class="myfont">

    <td></td>
    <td></td>
    <td>فیصدی مجموعی</td>
    <td ><span class="text-bold">{{$tot_per}}</span> </td>
    <td></td>
    <td></td>
    <td>قیمت مجموعی</td>
    <td class="text-primary">{{$tot_Net}}</td>


</tr>

                            </tbody>

                        </table>

                    </table>
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">ملاحظات</h3>
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
                            <td>
                                {{$data->remark}}
                            </td>
                        </tr>






                    </table>
                </div>
            </div>
        </section>
    </div>




    <script>

$(document).ready(function () {
    $("#btnprint").on('click',function () {
        window.print();
    })
})

</script>





    @endsection
