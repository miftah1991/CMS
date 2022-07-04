@extends('layouts.master')

@section('content')

    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">مشخصات قرارداد رد شده</h3>
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
                            <td colspan="4"><span class="fa fa-home fa-lg btn btn-warning"></span>اسم قرارداد </td>
                        </tr>

                        <tr>

                            <td colspan="4">{{$data->registerprocurement->Project_Name}}</td>


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
                                @isset($data->registerprocurement->founder->FouName){{$data->registerprocurement->founder->FouName}}  @endif

                            </td>
                            <td>
                                <span class="fa  fa-user fa-code btn btn-info"></span>    شماره حکم
                            </td>
                            <td class="myfont">
                               {{$data->registerprocurement->Order_Number}}

                            </td>
                        </tr>


                        <tr>
                            <td >
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>       حکم تاریخ
                            </td>
                            <td class="myfont">
                              {{$data->registerprocurement->Order_Date}}

                            </td>
                            <td>
                                <span class="fa   fa-money btn btn-default fa-lg"></span>        قیمت تخمنی
                            </td>
                            <td class="myfont">
                              {{$data->registerprocurement->Rupee_Amount}}

                            </td>
                        </tr>

                        <tr>
                            <td >
                                <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>نوع پرژوه
                            </td>
                            <td>
                                {{$data->registerprocurement->procurementtype->ProName}}

                            </td>
                            <td>
                                <span class="fa   fa-money fa-lg btn btn-default"></span>بودجه منظور شده
                            </td>
                            <td class="myfont">
                                {{$data->registerprocurement->Accepts_Fund}}

                            </td>
                        </tr>

                    </table>
                </div>
            </div>

            <div class="box box-danger">
                <div class="box-header">

                    <!-- /. tools -->
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
                                <span class="fa  fa-file fa-lg btn btn-pinterest"></span>  درحالت نوع قبول قرارداد
                            </td>
                            <td>
                               {{$data->statustype->Stat_Name}}
                            </td>
                            <td>
                                <span class="fa   fa-calendar btn btn-primary"></span>  تاریخ قبول قرارداد
                            </td>
                            <td>
                             {{$data->Accept_Date}}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="fa  fa-file fa-lg btn btn-pinterest"></span>  حکم قبول قرارداد
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/AcceptProject')}}/{{$data->Order_File}}" ><span class="fa fa-download"></span></a>
                            </td>
                            <td>
                                <span class="fa   fa-file-archive-o btn btn-pinterest"></span>  پشنهاد قرارداد
                            </td>
                            <td>
                                <a href="{{asset('storage/app/public/AcceptProject')}}/{{$data->Request_File}}" ><span class="fa fa-download"></span></a>
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

        </section>
    </div>




    <script>



</script>





    @endsection
