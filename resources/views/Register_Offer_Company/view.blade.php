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
                            <td colspan="4"><span class="fa fa-home fa-lg btn btn-warning"></span>اسم قرارداد </td>
                        </tr>

                        <tr>

                            <td colspan="4"> @isset($data->registerprocuremnet->Project_Name){{$data->registerprocuremnet->Project_Name}}  @endif</td>

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
                                @isset($data->registerprocuremnet->founder->FouName){{$data->registerprocuremnet->founder->FouName}}  @endif
                            </td>
                            <td>
                                <span class="fa  fa-sort-numeric-asc  btn btn-primary"></span>        کود پروژه
                            </td>
                            <td class="myfont">
                              @isset($data->registerprocuremnet->Pro_Code) {{$data->registerprocuremnet->Pro_Code}} @endif
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="fa  fa-calendar fa-lg btn btn-primary"></span>    تاریخ ثپت شرکت افر کننده
                            </td>
                            <td class="myfont">
                              {{$data->Offer_Date}}
                            </td>

                        </tr>



                    </table>
                </div>
            </div>



            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">لست شرکت افر کننده</h3>
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
    <td>اسم شرکت</td>
    <td>نماینده شرکت</td>
    <td>موقف نماینده</td>
    <td>شماره تماس</td>
    <td>ایمل ادرس</td>
</tr>
@foreach($offer_company_List as $key=>$rcd)
                        <tr class="myfont">
                            <td>{{++$key}}</td>
                            <td>{{$rcd->Name}}</td>
                            <td>{{$rcd->MemberName}}</td>
                            <td>{{$rcd->position}}</td>
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
