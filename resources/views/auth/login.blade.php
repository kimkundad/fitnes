<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{ url('main.b4e6647d7c747f30c87e.css') }}?v2" rel="stylesheet"></head>
    <style>
    .app-logo {
      height: 37px;
      width: 155px;
    }
    .app-logo {
      height: 69px;
      width: 162px;
    background: url(assets/images/logo-inverse.png?v3);
}
    </style>
<body>
    <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100">
                    <div class="h-100 no-gutters row">
                        <div class="d-none d-lg-block col-lg-4">
                            <div class="slider-light">
                                <div class="slick-slider">
                                    <div>
                                        <div class="h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url('{{ url('assets/images/originals/city.jpg') }}');"></div>
                                            <div class="slider-content"><h3>Perfect Balance</h3>
                                                <p>ArchitectUI is like a dream. Some think it's too good to be true! Extensive collection of unified React Boostrap Components and Elements.</p></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url('{{ url('assets/images/originals/citynights.jpg') }}');"></div>
                                            <div class="slider-content"><h3>Scalable, Modular, Consistent</h3>
                                                <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components</p></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url('{{ url('assets/images/originals/citydark.jpg') }}');"></div>
                                            <div class="slider-content"><h3>Complex, but lightweight</h3>
                                                <p>We've included a lot of components that cover almost all use cases for any type of application.</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                            <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                                <div class="app-logo"></div>
                                <h4 class="mb-0">
                                    <span class="d-block">Welcome back,</span>
                                    <span>Please sign in to your account.</span></h4>

                                <div class="divider row"></div>
                                <div>
                                  <form action="{{ url('/login') }}" method="POST">
                                    {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label>
                                                  <input name="email" id="exampleEmail" placeholder="Email here..." type="email" class="form-control">
                                                  @if ($errors->has('email'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('email') }}</strong>
                                                      </span>
                                                  @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="examplePassword" class="">Password</label>
                                                  <input name="password" id="examplePassword" placeholder="Password here..." type="password" class="form-control">
                                                  @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Keep me logged in</label></div>
                                        <div class="divider row"></div>
                                        <div class="d-flex align-items-center">
                                            <div class="ml-auto"><a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
                                                <button type="submit" class="btn btn-primary btn-lg">Login to Dashboard</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<script type="text/javascript" src="{{url('assets/scripts/main.b4e6647d7c747f30c87e.js')}}"></script></body>
</html>
