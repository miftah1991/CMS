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

                                ثپت تاریخ ګزارش
                            </td>
                            <td>
                               {{$data->Save_Date}}
                            </td>

                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-eyedropper fa-lg btn btn-default"></span>نوع پرژوه
                            </td>
                            <td>
                                {{$data->registerprocurement->procurementtype->ProName}}
                            </td>
                            <td>
                                <span class="fa  fa-code btn btn-default fa-lg"></span>      کود پروژه
                            </td>
                            <td>
                                {{$data->registerprocurement->Pro_Code}}
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




    <script>
        $(document).ready(function () {

            $("#btnprint").on('click',function () {

                window.print();



            })


        })


</script>





    @endsection
