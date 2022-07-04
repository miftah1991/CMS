<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> سیستم قراردادها </title>

    <link rel="icon" href="">

    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('public/css/custom.css')}}">
</head>

<body>
<div class="container-fluid h-100">
    <!-- Top -->
    <div class="row login-header">
        <div class="col-sm-1"></div>
        <div class="col-12 col-sm-10 text-center">
            <img src="public/assets/img/dabs.png" class="img-fluid mt-1" width="80" height="80">
            <h4 class="mt-1">سیستم ارزیابی قراردادها  </h4>
            <div class="navbar_trapezoid">
                <a href="https://pmis.dabs.af">
                    <button class="btn bg-orange text-white"><span class="fa fa-home fa-lg"></span> 2صفحه اصلی</button>
                </a>
                <a href="https://main.dabs.af">
                    <button class="btn bg-orange text-white"><span class="fa fa-internet-explorer m-0"></span> وب سایت</button>
                </a>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-12 col-sm-6">
            <form action="login" method="post">
                @csrf
                <table class="table" dir="rtl">
                    <tr><td colspan="2" class="border-0"></td></tr>
                    <tr><td colspan="2" class="border-0"></td></tr>
                    <tr><td colspan="2" class="border-0"></td></tr>
                    <tr><td colspan="2" class="border-0"></td></tr>
                    <tr>
                        <th colspan="2" class="border-0 text-center">
                            <h1 style="line-height: 2" class="text-white rounded bg-orange">ورود به سیستم</h1>
                        </th>
                    </tr>

                    @if ($errors->has('email'))
                        <span style="color:white">
                <strong>{{ $errors->first('email') }}</strong>

                    @endif

                    @if(!empty(Session::get('success')))
                        <tr>
                            <th></th>
                            <th class="text-success font-cb">{{Session::get('success')}}</th>
                        </tr>
                        @endif



                        <tr>
                            <th class="border-0">ایمیل</th>
                            <td class="border-0"><input type="text" maxlength="40" name="email"  class="form-control" autofocus required/></td>
                        </tr>
                        <tr>
                            <th class="border-0">رمز عبور</th>
                            <td class="border-0"><input type="password" maxlength="20" name="password" autocomplete="off" class="form-control" required/></td>
                        </tr>
                        <tr>
                            <td style="border: none!important">&nbsp;</td>
                            <td style="border: none!important"><input type="submit" name="login_user" value="ورود" class="btn btn-success w-200"></td>
                        </tr>
                </table>
            </form>
        </div>

        <div class="col-sm-3"></div>
    </div>
    <div class="row login-footer">
        <div class="col-12 col-sm-12">Designed & Developed by DABS MIS Team, ICT Department - © 1398</div>
    </div>
    <!-- ... -->
</div><!-- End of container-fluid -->

</body>
</html>
