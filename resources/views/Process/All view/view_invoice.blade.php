<span class="btn btn-warning btn-block"></span>
    <div class="row">
        <section class="col-lg-12 col-md-12">



            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">بخش انوایس تسلیم شده </h3>
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

                        </tr>

@endforeach

                    </table>
                </div>
            </div>


        </section>
    </div>


