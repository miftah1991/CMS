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
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
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
                                <span class="btn btn-warning btn-block"></span>
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

                    </table>
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">لست وصولی پول</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
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


                                <th>شروع تاریخ</th>
                                <th>تاریخ ختم</th>
                                <th>مبلغ پیش پرداخت</th>
                                <th>بانک مربوطه</th>
                                <th>شماره ګرنټی</th>
                                <th> تضمین</th>


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
                                <td style="white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; ">{{$rcd->Per_Name}}</td>
                                <td>{{$rcd->Date}}</td>
                                <td>{{$rcd->Persantage}}</td>
                                <td>{{$rcd->Start_Date_Tazmin}}</td>
                                <td>{{$rcd->End_Date_Tazmin}}</td>
                                <td>{{$rcd->Net_Amount}}</td>
                                <td>{{$rcd->bank}}</td>
                                <td>{{$rcd->Warrenty_Number}}</td>
                                <td>

                                    <a href="{{asset('storage/app/public/Perstange')}}/{{$rcd->warrenty}}" ><span class="fa fa-download"></span></a>

                                </td>

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
    <td>مچموعی فیصدی</td>
    <td >{{$tot_per}} </td>
    <td></td>
    <td>مجموعی قیمت</td>
    <td>{{$tot_Net}}</td>
    <td>


    </td>

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



</script>





    @endsection
