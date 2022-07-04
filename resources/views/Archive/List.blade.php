@extends('layouts.master')


@section('content')
<br>
<div class="col-lg-12 ">
    @if($msg=Session::get('msg'))
        <div class="alert alert-info   show" role="alert">
            {{$msg}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif
    <div class="panel panel-info ">
        <div class="panel-heading">
            <div class="panel-title text-center">جدول سیستم ارشیف</div>

        </div>

        <div class="panel-body">


            <table class="table table-bordered table-hover text-center myfont" id="tbloffer">
                <thead class="text-center">
                <tr >

                    <th>کود پروژه</th>
                    <th>شرکت قرارداد کننده</th>
                    <th>موقعیت پروژه</th>
                    <th>اغاز سال</th>
                    <th>ختم سال</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($data as $key=>$rcd)
                    <tr >
                        <td>{{$rcd->Project_Code}}</td>
                        <td>{{$rcd->company->Name}}</td>
                        <td>{{$rcd->archive_location->name}}</td>

                        <td>{{$rcd->Year}}</td>
                        <td>{{$rcd->End_year}}</td>
                        <td><a href="{{url('Edit_Archive')}}/{{$rcd->id}}"><span class="btn btn-primary btn-xs fa fa-pencil"></span></a>

                            <a href="{{url('view_Archive')}}/{{$rcd->id}}"><span class=" btn btn-info btn-xs fa fa-eye"></span></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>









            </div>






    </div>

</div>
<link rel="stylesheet" type="text/css" href="{{asset('public/datepicker/css/persianDatepicker-default.css')}}">

<script src="{{asset('public/datepicker/js/persianDatepicker.js')}}"></script>

<script>

    $(document).ready(function () {

        $("#tbloffer").dataTable();
        });





</script>




    @endsection