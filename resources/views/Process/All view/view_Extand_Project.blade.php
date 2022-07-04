

    <div class="row">
        <section class="col-lg-12 col-md-12">




            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">بخش ثپت درخواست تعدیلات</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive ">

<tr class="text-center">

    <td>درخواست نوع تعدیل</td>

    <td>تاریخ اغاز بررسی</td>
    <td>تاریخ ختم بررسی</td>
    <td>وقت باقی</td>
    <td>پشنهاد</td>
    <td>ګزارش</td>

</tr>
@foreach($data as $key=>$rcd)




    <?php



                            $d = null;
                            $h = null;
                            $m = null;
                            $red = null;
                            $now = new DateTime($rcd->End_Date);
                            $date = new jDateTime(true, true, 'Asia/Kabul');
                            $to = $date->date("Y-m-d", false, false);

                            $estimate_date = new DateTime($to);


                            $interval = $now->diff($estimate_date);
                            $days = $interval->format('%R%a');
                            if(strpos($days, "-") !== false){
                                if(substr($days, 1) != 0){ $d = substr($days, 1) . " روز"; }
                            }
                            $month = $interval->format('%R%m');
                            if(strpos($month, "-") !== false){
                                if(substr($month, 1) != 0){ $h = substr($month, 1) . " ماه"; }

                            }


                            ?>







                        <tr class="myfont text-center">

                            <td>{{$rcd->Name}}</td>


                            <td>{{$rcd->Start_Date}}</td>
                            <td>{{$rcd->End_Date}}</td>
                            <td><span class="bg badge-danger font-cb">{{$d}}</span><br>
                                </td>
                            <td> <a href="{{asset('storage/app/public/Extand')}}/{{$rcd->Request_File}}" ><span class="fa fa-download"></span></a></td>
                            <td> <a href="{{asset('storage/app/public/Extand')}}/{{$rcd->Report_File}}" ><span class="fa fa-download"></span></a></td>


                        </tr>

@endforeach

                    </table>
                </div>
            </div>


        </section>
    </div>





