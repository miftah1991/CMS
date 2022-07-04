
<span class="btn btn-warning btn-block"></span>
    <div class="row">
        <section class="col-lg-12 col-md-12">

            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">بخش پیش پرداخت</h3>
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


