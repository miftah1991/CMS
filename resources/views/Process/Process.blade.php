@extends('layouts.master')

@section('content')

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h5 class="myfont">   @isset($count1->totalregisterprocurement) {{$count1->totalregisterprocurement}}   @endisset  </h5>

                        <p>قرارداد های اجناس</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h5 class="myfont"> @isset($Bulding_count1->totalregisterprocurement) {{$Bulding_count1->totalregisterprocurement}} @endisset</h5>

                        <p>قرارداد های ساختمان</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h5 class="myfont">@isset($metting_count1->totalregisterprocurement) {{$metting_count1->totalregisterprocurement}} @endisset</h5>

                        <p>قرارداد مشورتی او غیر مشورتی</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h5 class="myfont"> @isset($Archive) {{$Archive}} @endisset</h5>

                        <p>ارشیف</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">

            <div class="col-lg-3">
                <div class="box box-info box-solid">
                    <div class="box-header">
                        <h3 class="box-title">د افغانستان برشنا شرکت</h3>
                    </div>
                    <div class="box-body">
                        مجموعه
                        <span class="badge bg-danger myfont"> @isset($dabs){{$dabs}} @endisset</span>
                    </div>
                    <!-- /.box-body -->
                    <!-- Loading (remove the following to stop the loading)-->
                    <div class="overlay" >
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <!-- end loading -->
                </div>
            </div>

            <div class="col-lg-3">
                <div class="box box-success box-solid">
                    <div class="box-header">
                        <h3 class="box-title">بانک اسیایی</h3>
                    </div>
                    <div class="box-body">
                        مجموعه
                        <span class="badge bg-danger myfont">@isset($asiabank) {{$asiabank}} @endisset</span>
                    </div>
                    <!-- /.box-body -->
                    <!-- Loading (remove the following to stop the loading)-->
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <!-- end loading -->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">بانک جهانی</h3>
                    </div>
                    <div class="box-body">
                        مجموعه
                        <span class="badge bg-primary myfont"> @isset($nabank){{$nabank}} @endisset</span>
                    </div>
                    <!-- /.box-body -->
                    <!-- Loading (remove the following to stop the loading)-->
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <!-- end loading -->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">
                            تدراکاتی ملی افغانستان

                        </h3>
                    </div>
                    <div class="box-body">
                        مجموعه
                        <span class="badge bg-primary myfont">@isset($naprocurement) {{$naprocurement}} @endisset</span>

                    </div>
                    <!-- /.box-body -->
                    <!-- Loading (remove the following to stop the loading)-->
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <!-- end loading -->
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">حالت دوران قرارداد</h3>
                        <!-- tools box -->
                        <div class="pull-left box-tools">
                            <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <label>لیست پروژه منظور شده</label>
                                    <div class="input-group {{ $errors->has('Pro_Fid') ? 'has-error' : ''}}">
                                        <div class="input-group-addon">
                                            <i class="fa fa-product-hunt"></i>
                                        </div>

                                        <select name="Pro_Fid" id="Pro_Fid" class="form-control">
                                            <option value="">پروژه را انتخاب کنید</option>
                                            @foreach($register_project as $rcd)
                                                <option value="{{$rcd->id}}">{{$rcd->Project_Name}}--{{$rcd->Pro_Code}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <small class="text-danger">{{ $errors->first('Pro_Fid') }}</small>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12">


                                <table class="table table-bordered">

                                    <thead>

                                    <tr style="text-align: center;">



                                        
                                        <th>شماره</th>
                                        <th>حالت</th>
                                        <th></th>
                                        <th></th>
                                    </tr>

                                    </thead>

                                    <tbody id="process" style="vertical-align: ">


                                    </tbody>

                                </table>







                            </div>

                        </div>





                    </div>
                </div>

            </section>
        </div>
        <!-- Main row -->
    </section>




    <script>
        $(document).ready(function () {


            $("#Pro_Fid").select2({

                allowClear: true
            });


            setTimeout(function(){$('.overlay').hide();}, 2000);




            $("#Pro_Fid").on('change',function () {

                var val=$("#Pro_Fid").val();

                var n=0;
                $("#process").empty();
                var tr=''
                $.ajax({

                    url:'Find_Prcess',
                    type:'get',
                    data:{id:val},
                    success:function (data) {
                        var tot=data.length;
                        for(var i=0;i<data.length;i++)
                        {
                            if(i==tot-1 && data[i].complete==null)
                            {
                                tr+='<tr style="text-align:center"><td>'+(++n)+'</td><td>'+data[i].Name+'</td><td><span style="color:green"  class="fa fa-spinner  fa-spin fa-3x fa-fw"></span></td><td><a href="{{url('view_process')}}/'+data[i].Pro_Fid+'/'+data[i].tblnanme+'" target="_blank"> <span style="color:blue" class="fa fa-2x fa fa-eye-slash"></span></a></td></tr>' ;
                            }
                            else  if(i==tot-1 && data[i].complete!=null)

                            {
                                tr+='<tr style="text-align:center"><td>'+(++n)+'</td><td>'+data[i].Name+'</td><td><span style="color:green" class="fa fa-3x fa-check-square-o"></span></td><td><a href="{{url('view_process')}}/'+data[i].Pro_Fid+'/'+data[i].tblnanme+'" target="_blank"> <span style="color:blue" class="fa fa-2x fa fa-eye-slash"></span></a></td></tr>' ;
                            }
                            else
                            {
                                tr+='<tr style="text-align:center"><td>'+(++n)+'</td><td>'+data[i].Name+'</td><td><span style="color:green" class="fa fa-3x fa-check-square-o"></span></td><td><a href="{{url('view_process')}}/'+data[i].Pro_Fid+'/'+data[i].tblnanme+'" target="_blank"> <span style="color:blue" class="fa fa-2x fa fa-eye-slash"></span></a></td></tr>' ;
                            }

                        }

                        $("#process").append(tr);
                    }


                });


            })



        })


    </script>
@endsection
