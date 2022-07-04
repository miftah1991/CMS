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
                <div class="box-body">

                    <table class="table table-responsive ">




                        <tr>
                            <td colspan="4"><span class="fa fa-home fa-lg btn btn-warning"></span>عنوان پروژه </td>
                        </tr>

                        <tr>

                            <td colspan="4" class="myfont">{{$data->registerproject->Project_Name}}</td>

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
                            <td class="myfont">
                                @isset($data->registerproject->founder->FouName){{$data->registerproject->founder->FouName}}  @endif
                            </td>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>    تاریخ اعلان پروژه    &nbsp;
                            </td>
                            <td class="myfont">
                               {{$data->Aoun_Date}}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>        تاریخ جلسه قبل  دواطلبی   &nbsp;
                            </td>
                            <td class="myfont">
                              {{$data->Met_Date}}
                            </td>
                            <td>
                                <span class="fa  fa-calendar btn btn-default fa-lg"></span>       تاریخ افرکشایی    &nbsp;
                            </td>
                            <td class="myfont">
                              {{$data->Offer_Date}}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-default"></span>تاریخ منظوری شرطنامه    &nbsp;  &nbsp;
                            </td>
                            <td class="myfont">
                                {{$data->Accept_Date}}
                            </td>
                            <td>
                                <span class="fa  fa-database btn btn-default"></span>  وقت افر کشایی   &nbsp;
                            </td>
                            <td class="myfont">
                                {{$data->Offer_Time}}
                            </td>
                        </tr>

                    </table>
                </div>
            </div>



            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">لست هیات</h3>
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
    <td>شماره مسسلسل</td>
    <td>اسم هیت</td>
    <td>شماره تماس</td>
    <td>ایمل ادرس</td>
</tr>
@foreach($Member_List as $key=>$rcd)
                        <tr class="myfont">
                            <td>{{++$key}}</td>
                            <td>{{$rcd->Emp_Name}}</td>
                            <td>{{$rcd->Phone}}</td>
                            <td>{{$rcd->Email}}</td>
                        </tr>

@endforeach

                    </table>
                </div>
            </div>

            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">فایل های مربوطه پروژه</h3>
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
                            <td colspan="4">
                                <span class="btn btn-primary btn-block"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-reorder fa-lg btn btn-pinterest"></span>اخبار اعلان پروژه
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/files')}}/{{$data->Anouce_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                            <td>
                                <span class="fa   fa-desktop btn btn-pinterest"></span>   تعدیل شرطنامه
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/files')}}/{{$data->Extend_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-file fa-lg btn btn-primary"></span>      پیشنهاد وتوظیف هیت افرکشایی
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/files')}}/{{$data->Request_File}}" ><span class="fa fa-download "></span></a>
                            </td>
                            <td>
                                <span class="fa  fa-file fa-lg btn btn-warning"></span>جلسه افر کشایی فورمه های
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/files')}}/{{$data->Met_offer_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-list btn btn-default"></span>جدول توضیع شرطنامه
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/files')}}/{{$data->List_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                            <td>
                                <span class="fa  fa-file btn btn-default"></span>شرطنامه تایید شده
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/files')}}/{{$data->Accept_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                        </tr>

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
                                {{$data->remarks}}
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
