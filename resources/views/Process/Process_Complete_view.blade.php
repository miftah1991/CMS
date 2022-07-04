<link rel="stylesheet" href="{{asset('public/css/bootstrap-theme.css')}} ">
<!-- Bootstrap rtl -->
<link rel="stylesheet" href="{{asset('public/css/rtl.css')}} ">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('public/font-awesome/css/font-awesome.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('public/Ionicons/css/ionicons.min.css')}}">
<!-- jvectormap -->
<link rel="stylesheet" href=" {{asset('public/jvectormap/jquery-jvectormap.css')}}">
<link rel="stylesheet" href=" {{asset('public/tables/datatables.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('public/css/AdminLTE.css')}}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{asset('public/css/skins/_all-skins.min.css')}}">

<script src="{{asset('public/tables/jquery.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('public/css/my.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/select2/css/select2.css')}}">
    <section class="container-fluid">

        <div class="row">
            <section class="col-lg-12 col-md-12"  >
                <div class="box box-info">
                    <div class="box-header">

                    </div>
                    <div class="box-body">

                        <!-- register project  Details-->
                      <?php
                        use App\RegisterProcurement;
                        use App\AnouceProject;
                        use App\AounceProjectMemberList;
                        use App\ConditionOffer;
                        use App\Evaluation;
try
{
                        $data=RegisterProcurement::where('id' ,$id)->first();

                        if($data)
                            {
                        ?>
                       @include('Process.All view.view_register_porject')

                        <?php
                        }

                        $data=AnouceProject::where('Pro_Fid',$id)->first();

                        $Member_List=AounceProjectMemberList::where('Ano_Fid',$data->id)->get();
                        if($data)
                        {
                        ?>
                        @include('Process.All view.view_Anounce')
                    <?php
                        }
                        $data=ConditionOffer::where('Pro_Fid',$id)->get();

                        if($data)
                        {
                        ?>
                        @include('Process.All view.view_Offer_Condition')
                    <?php
                        }
                        $data= Evaluation::where('Pro_Fid',$id)->first();
                        $Team_Contact_List=AounceProjectMemberList::where('Eval_Fid',$data->id)->get();

                        if($data)
                        {
                        ?>
                        @include('Process.All view.view_Evaluation')
                        <?php
                        }

                        $data= \App\EvaluationReport::where('Pro_Fid',$id)->first();


                        if($data)
                        {
                        ?>
                        @include('Process.All view.Eval_Accept_view')
                        <?php
                        }

                        $data= \App\RejectProject::where('Pro_Fid',$id)->first();


                        if($data)
                        {
                        ?>
                        @include('Process.All view.Eval_Reject_view')
                        <?php
                        }
                        $data= \App\Award::where('Pro_Fid',$id)->first();
                        $company=\App\CompanyContact::where('Awar_Fid',$data->id)->first();

                        if($data)
                        {
                        ?>
                        @include('Process.All view.view_Award')
                        <?php
                        }

                        $data= $data=\App\Complain::where('Pro_Fid',$id)->first();
                        $offer_company_List=\App\CompanyContact::where('Com_Fid',$data->id)->get();

                        if($data)
                        {
                        ?>
                        @include('Process.All view.view_complain')
                        <?php
                        }
                        $data= $data=\App\Contract::where('Pro_Fid',$id)->first();
                        $offer_company_List=\App\AounceProjectMemberList::where('Con_Fid',$data->id)->get();

                        if($data)
                        {
                        ?>
                        @include('Process.All view.view_contract')
                        <?php
                        }
                        $persantage =\App\Workpersantage::where('Pro_Fid',$id)->get();


                        if($persantage)
                        {
                        ?>
                        @include('Process.All view.view_persantage')
                        <?php
                        }

                        $data= $data=\App\ContractReport::where('Pro_Fid',$id)->get();

                        if($data)
                        {
                        ?>
                        @include('Process.All view.view_contract_report')
                        <?php
                        }
                        $data=\App\Invoice::where('Pro_Fid',$id)->get();

                        if($data)
                        {
                        ?>
                        @include('Process.All view.view_invoice')
                        <?php
                        }
                        $data=\App\ExtandProject::where('Pro_Fid',$id)->get();

                        if($data)
                        {
                        ?>
                        @include('Process.All view.view_Extand_Project')
                        <?php
                        }
                        }
                        catch (Exception $msg)
                            {

                            }
                        ?>


                    </div>
                </div>

            </section>
        </div>
        <!-- Main row -->
    </section>



<script type="text/javascript" charset="utf8" src="{{asset('public/tables/datatables.js') }}"></script>


<script src="{{asset('public/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/js/adminlte.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('public/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('public/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/Chart.js/Chart.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/js/demo.js')}}"></script>
<script type="text/javascript" charset="utf8" src="{{asset('public/select2/js/select2.js') }}"></script>
    <script>
        $(document).ready(function () {


            $("#Pro_Fid").select2({

                allowClear: true
            });


            setTimeout(function(){$('.overlay').hide();}, 2000);





        })


    </script>

