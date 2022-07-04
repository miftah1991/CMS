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
                                <span class="fa  fa-sort-numeric-desc btn btn-default fa-lg"></span>     کود پروژه
                            </td>
                            <td class="myfont">
    @isset($data->registerprocurement->Pro_Code){{$data->registerprocurement->Pro_Code}} @endif
  </td>
</tr>


<tr>
  <td>
      <span class="fa  fa-calendar fa-lg btn btn-primary"></span>     تاریخ اغاز ارزیابی
  </td>
  <td class="myfont">
    {{$data->Start_Date}}
  </td>
  <td>
      <span class="fa  fa-calendar btn btn-default fa-lg"></span>
      تاریخ ختم ارزیابی
  </td>
  <td class="myfont">
    {{$data->End_Date}}
  </td>
</tr>



</table>
</div>
</div>



<div class="box box-info">
<div class="box-header">
<i class="fa fa-info-circle"></i>
<h3 class="box-title">لست هیات ارزیابی</h3>
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
@foreach($Team_Contact_List as $key=>$rcd)
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
      <span class="fa  fa-reorder fa-lg btn btn-pinterest"></span> پیشنهاد توظیف هیت
  </td>
  <td>
      <a href="{{asset('storage/app/public/Eval_Files')}}/{{$data->Request_File}}" ><span class="fa fa-download"></span></a>
  </td>
  <td>
      <span class="fa   fa-desktop btn btn-pinterest"></span> پیشنهاد تمدید ارزیابی
  </td>
  <td>
      <a href="{{asset('storage/app/public/Eval_Files')}}/{{$data->Extend_File}}" ><span class="fa fa-download"></span></a>
  </td>
</tr>


<tr>
  <td>
      <span class="fa  fa-file fa-lg btn btn-primary"></span>      استعلام ها واسناد حمایوی
  </td>
  <td>
      <a href="{{asset('storage/app/public/Eval_Files')}}/{{$data->Estilam_File}}" ><span class="fa fa-download "></span></a>
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
