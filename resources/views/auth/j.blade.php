@extends('Dashboard.layouts.master2')
@section('css')

    <style>
        .panel {display: none;}
    </style>

<style>
    .panel {display: none;}
    .alert-custom {
        background-color: #f8d7da; /* لون خلفية */
        color: #721c24; /* لون النص */
        border-color: #f5c6cb; /* لون الحدود */
        padding: 15px; /* مساحة داخلية */
        border-radius: 5px; /* زوايا مستديرة */
        margin-bottom: 20px; /* مساحة أسفل الرسالة */
    }
</style>
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')

        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">

                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">

                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{trans('login-trans.Welcome')}}</h2>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">{{trans('login-trans.Select_Enter')}}</label>
                                                <select class="form-control" id="sectionChooser">
                                                    <option value="" selected disabled>{{trans('login-trans.Choose_list')}}</option>
                                                    <option value="user">{{trans('login-trans.patient')}}</option>
                                                    <option value="admin">{{trans('login-trans.admin')}}</option>
                                                    <option value="doctor"> دكتور</option>
                                                    <option value="ray_employee">موظف اشعة </option>
                                                    <option value="laboratorie_employee">موظف مختبر</option>
                                                    <option value="reseption_employee">موظف استقبال</option>

                                                </select>
                                            </div>



                                            {{--form user--}}
                                            <div class="panel" id="user">
                                                <h2>الدخول كمريض</h2>
                                                <form method="POST" action="{{ route('login.patient') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input  class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control" placeholder="Enter your password"   type="password"name="password" required autocomplete="current-password" >
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">Sign In</button>

                                                </form>

                                            </div>


                                            {{--form admin--}}
                                            <div class="panel" id="admin">
                                                <h2>الدخول ادمن</h2>
                                                <form method="POST" action="{{ route('login.admin') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input  class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control" placeholder="Enter your password"   type="password"name="password" required autocomplete="current-password" >
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">Sign In</button>

                                                </form>

                                            </div>


                                            {{--form Doctor--}}
                                            <div class="panel" id="doctor">
                                                <h2>الدخول دكتور</h2>
                                                <form method="POST" action="{{ route('login.doctor') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input  class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control" placeholder="Enter your password"   type="password"name="password" required autocomplete="current-password" >
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">Sign In</button>

                                                </form>

                                            </div>
    {{--form RayEmployee--}}
                                            <div class="panel" id="ray_employee">
                                                <h2>الدخول موظف اشعة</h2>
                                                <form method="POST" action="{{ route('login.ray_employee') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input  class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control" placeholder="Enter your password"   type="password"name="password" required autocomplete="current-password" >
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">Sign In</button>

                                                </form>

                                            </div>
                                            <div class="panel" id="laboratorie_employee">
                                                <h2>الدخول موظف مختبر</h2>
                                                <form method="POST" action="{{ route('login.laboratorie_employee') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input  class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control" placeholder="Enter your password"   type="password"name="password" required autocomplete="current-password" >
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">Sign In</button>

                                                </form>

                                            </div>
                                            <div class="panel" id="reseption_employee">
                                                <h2>الدخول موظف استقبال</h2>
                                                <form method="POST" action="{{ route('login.reseption') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input  class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control" placeholder="Enter your password"   type="password"name="password" required autocomplete="current-password" >
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">Sign In</button>

                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')


    <script>
        $('#sectionChooser').change(function(){
            var myID = $(this).val();
            $('.panel').each(function(){
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
