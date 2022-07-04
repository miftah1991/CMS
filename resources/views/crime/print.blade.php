@extends('layouts.master')

@section('content')

    <div class="row">
        <section class="col-lg-12 col-md-12">

<br>
            <div class="box box-danger">
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
                    <table class="table table-responsive" id="tblinvoice">

                        <tr>
                            <td>کود قرارداد</td>
                            <td class="myfont">{{$project->Pro_Code}}</td>


                        </tr>
                        <tr>
                            <td>اسم قرارداد</td>
                            <td>{{$project->Project_Name}}</td>


                        </tr>
                        <tr>
                            <td>شرکت قرارداد کننده</td>
                            <td class="myfont">{{$Company->Name}}</td>


                        </tr>
                        <tr>

                            <td>مقدار قرارداد</td>
                            <td>{{$contract->Contract_Rupee}} </td>
                        </tr>

                    </table>
                </div>
            </div>

            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">مشخصات جریمه</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive" id="tblinvoice">

<tr class="text-center">
    <td>شماره </td>

    <td>علت جریمه</td>
    <td>ثپت تاریخ جریمه</td>
    <td>  فیصدی جریمه تاخیر در روز</td>

    <td>تعداد روز</td>
    <td>فیصدی جریمه تاخیر</td>




</tr>
@foreach($data as $key=>$rcd)

                        <tr class="myfont text-center">
                            <td>{{++$key}}</td>


                            <td>{{$rcd->Name}} </td>
                            <td>{{$rcd->Save_Date}}</td>
                            <td>{{$rcd->crime}}</td>
                            <td>{{$rcd->day}}</td>
                            <td>{{$rcd->Amount}}</td>

                            <td>{{$rcd->Date_Accept}}</td>

                        </tr>

@endforeach

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


            $("#tblinvoice").dataTable();
        });

</script>





    @endsection
