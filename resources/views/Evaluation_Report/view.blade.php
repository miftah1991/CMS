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

                            <td colspan="4">{{$data->registerprocuremnet->Project_Name}}</td>

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
                                <span class="fa  fa-sort-numeric-desc btn btn-default fa-lg"></span>     کود پروژه
                            </td>
                            <td class="myfont">
    @isset($data->registerprocuremnet->Pro_Code){{$data->registerprocuremnet->Pro_Code}} @endif
  </td>
</tr>


<tr>
  <td>
      <span class="fa  fa-calendar fa-lg btn btn-primary"></span>     تاریخ راپور هیئت
  </td>
  <td class="myfont">
      {{$data->Save_Date}}
  </td>
  <td>
      <span class="fa  fa-calendar btn btn-default fa-lg"></span>
      حالت قرارداد
  </td>
  <td class="myfont">

  </td>
</tr>



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
  <td>
      <span class="fa  fa-reorder  btn btn-info btn-xs"></span>               &nbsp;                                  راپور ارزیابی
  </td>
  <td>
      <a href="{{asset('storage/app/public/Eval_Files')}}/{{$data->Report_File}}" ><span class="fa fa-download"></span></a>
  </td>
  <td>
      <span class="fa   fa-desktop btn btn-primary"></span> حکم قبول قرارداد
  </td>
  <td>
      <a href="{{asset('storage/app/public/Eval_Files')}}/{{$data->Accept_File}}" ><span class="fa fa-download"></span></a>
  </td>
</tr>


<tr>
  <td>
      <span class="fa  fa-file fa-lg btn btn-primary"></span>      پشنهاد
  </td>
  <td>
      <a href="{{asset('storage/app/public/Eval_Files')}}/{{$data->Request_File}}" ><span class="fa fa-download "></span></a>
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



</script>





@endsection
