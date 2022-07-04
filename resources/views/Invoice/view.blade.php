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
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
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
                            <td class="myfont">{{$project->Project_Name}}</td>


                        </tr>
                        <tr>
                            <td>بودجه منظور شده</td>
                            <td class="myfont">{{$project->Accepts_Fund}}</td>


                        </tr>

                    </table>
                </div>
            </div>

            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">لست انوایس</h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <table class="table table-responsive" id="tblinvoice">

<tr>
    <td>شماره مسسلسل</td>

    <td>اسم انوایس</td>
    <td>تاریخ انوایس</td>
    <td>فیصدی انوایس</td>
    <td>مقدار انوایس</td>
    <td>فایل انوایس</td>
    <td>چک وارده انوایس</td>
    <td>تاریخ تسلیمی اجناس</td>
    <td>تغیر</td>

</tr>
@foreach($data as $key=>$rcd)

                        <tr class="myfont">
                            <td>{{++$key}}</td>


                            <td>{{$rcd->invoicetype->name}} </td>
                            <td>{{$rcd->Save_Date}}</td>
                            <td>{{$rcd->Persantage}} </td>
                            <td>{{$rcd->Amount_Invoice}}</td>
                            <td> <a href="{{asset('storage/app/public/Invoice_File')}}/{{$rcd->Check_Invvoice_File}}" ><span class="fa fa-download"></span></a></td>
                            <td> <a href="{{asset('storage/app/public/Invoice_File')}}/{{$rcd->Invoice_File}}" ><span class="fa fa-download"></span></a></td>
                            <td>{{$rcd->Date_Accept}}</td>
                            <td>
                                @if($rcd->registerprocurement->is_complete==0)
                                <a href="{{url('Edit_Inovoice')}}/{{$rcd->id}}" ><span class="fa fa-pencil"></span></a>
                            @endif
                            </td>
                        </tr>

@endforeach

                    </table>
                </div>
            </div>


        </section>
    </div>




    <script>

        $(document).ready(function () {


            $("#tblinvoice").dataTable();
        });

</script>





    @endsection
