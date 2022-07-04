
    <div class="row">
        <section class="col-lg-12 col-md-12">

            <div class="box box-danger">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <table class="table table-responsive ">



                        <tr>
                            <td colspan="4">
                                <span class="btn btn-success btn-block"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa  fa-file fa-lg btn btn-pinterest"></span>  درحالت نوع لغوه قرارداد
                            </td>
                            <td>
                               {{$data->statustype->Stat_Name}}
                            </td>
                            <td>
                                <span class="fa   fa-calendar btn btn-primary"></span>  تاریخ لغوه قرارداد
                            </td>
                            <td>
                             {{$data->Date_Reject}}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-file fa-lg btn btn-pinterest"></span>  حکم رد قرارداد
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Reject')}}/{{$data->Reject_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                            <td>
                                <span class="fa   fa-file-archive-o btn btn-pinterest"></span>   راپور رد قرارداد
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/Reject')}}/{{$data->Report_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                              <textarea class="form-control col-lg-12">{{$data->Remarks}}</textarea>
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
                                {{$data->Remarks}}
                            </td>
                        </tr>






                    </table>
                </div>
            </div>

        </section>
    </div>
