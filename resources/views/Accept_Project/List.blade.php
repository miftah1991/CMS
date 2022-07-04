@extends('layouts.master')

@section('content')


    @if($msg=Session::get('msg'))



        <div class="modal show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">خبرتیا</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{$msg}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">بسته</button>

                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="box box-info col-lg-12">
        <div class="box-header">
         لست قرارداد قبول شده
        </div>

        <div class="box-body">


            <table class="table table-bordered table-hover text-center" id="tablreject">
                <thead class="text-center">
                <tr >
                    <th>شماره</th>

                    <th>کود پروژه</th>
                    <th>تمویل کننده</th>
                    <th>تاریخ</th>
                    <th>حالت قبول پروژه</th>
                    <th>راپور</th>
                    <th>حکم قبول</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $key=>$rcd)
                <tr >
                    <td>{{++$key}}</td>

                    <td>@isset($rcd->registerprocurement->Pro_Code){{$rcd->registerprocurement->Pro_Code}}  @endif</td>
                    <td>@isset($rcd->registerprocurement->founder->FouName){{$rcd->registerprocurement->founder->FouName}}  @endif</td>
                    <td>@isset($rcd->Accept_Date){{$rcd->Accept_Date}}  @endif</td>
                    <td>@isset($rcd->statustype->Stat_Name){{$rcd->statustype->Stat_Name}}  @endif</td>
                    <td><a href="{{asset('storage/app/public/AcceptProject')}}/{{$rcd->Order_File}}" ><span class="fa fa-download"></span></a></td>
                     <td><a href="{{asset('storage/app/public/AcceptProject')}}/{{$rcd->Request_File}}" ><span class="fa fa-download"></span></a></td>

                    <td>

                        <a href="View_Accept_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-eye btn-xs btn btn-primary">   </i></a>
                        <a href="Edit_Accept_Project/@isset($rcd->id){{$rcd->id}}@endif"> <i class="fa fa-pencil btn-xs btn btn-default">   </i></a>




                    </td>

                    @endforeach

                </tbody>
            </table>


        </div>



    </div>





<script>

    $(document).ready(function() {
        setTimeout(function(){

            $('#exampleModal').hide("modal");
            $('#exampleModal').addClass("hide");


        }, 2000);

        $("#tablreject").dataTable();


    });

</script>


    @endsection
