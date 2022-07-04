@extends('layouts.master')

@section('content')

    <div class="row">
        <section class="col-lg-12 col-md-12">




            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">لست پروژه شرطنامه</h3>
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

    <td>کود پروژه</td>

    <td>اسم شرکت</td>
    <td>شماره تماس</td>
    <td>ایمل</td>
    <td>تاریخ اغاز تضمین</td>
    <td>تاریخ ختم تضمین</td>
    <td>خط نماینده</td>
    <td>تضمین</td>
    <td>تغیر</td>

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

                            <td>{{$rcd->registerprocurement->Pro_Code}}</td>


                            <td>{{$rcd->Name}}</td>
                            <td>{{$rcd->Phone}}</td>
                            <td>{{$rcd->Email}}</td>
                            <td>{{$rcd->Start_Date}} </td>
                            <td>{{$rcd->End_Date}} </td>


                            <td>
                                <a href="{{asset('storage/app/public/conditionoffer_Files')}}/{{$rcd->positionfile}}" ><span class="fa fa-download"></span></a>
                            </td>



                            <td>
                                <a href="{{asset('storage/app/public/conditionoffer_Files')}}/{{$rcd->Tazmin}}" ><span class="fa fa-download"></span></a>
                            </td>
                            <td>
                                <a href="{{url('Edit_Condition_Offer')}}/{{$rcd->id}}" ><span class="fa fa-pencil"></span></a>

                            </td>
                        </tr>

@endforeach

                    </table>
                </div>
            </div>


        </section>
    </div>




    <script>



</script>





    @endsection
