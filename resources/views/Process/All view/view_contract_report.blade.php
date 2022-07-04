
<span class="btn btn-warning btn-block"></span>
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">راپور هیت معاینه قرارداد </h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">

                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">

                    <table class="table table-responsive ">


                        <tr>

                            <td>

                                ثپت تاریخ ګزارش
                            </td>
                            <td>
                              موضوع ګزارش
                            </td>
                            <td>
                                 فایل ګزارش
                            </td>
                        </tr>
                        @foreach($data as $rcd)
                        <tr>
                            <td>
                               {{$rcd->Save_Date}}
                            </td>
                            <td>
                                {{$rcd->Subject}}
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Contract_Report')}}/{{$rcd->Report_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                        </tr>
@endforeach
                    </table>
                </div>
            </div>


        </section>
    </div>

