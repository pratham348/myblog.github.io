<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin | Reset Password</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('plugins/iCheck/square/blue.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b>Reset Password</a>
          </div><!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg">Enter your email id and reset password</p>
                <form method="POST" action="{{url('/reset-password')}}">
                    @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        
                                <div class="form-group has-feedback">
                                    <input id="email" type="email" class="form-control" placeholder="E-Mail Address" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
                                       @error('email')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                </div>
                               <div class="form-group has-feedback">
                                       <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
        
                                       @error('password')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                </div>
        
                               <div class="form-group has-feedback">                                 
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" autocomplete="new-password">                                   
                               </div>
                               <div class="row">
                                    <div class="col-xs-12">
                                       <button type="submit" class="btn btn-primary btn-block btn-flat">
                                           Reset Password
                                       </button>
                                    </div>
                               </div>
                           </form>
                        </form>
                    </div><!-- /.login-box-body -->
                  </div><!-- /.login-box -->
    <!-- jQuery 2.1.3 -->
    <script src="{{asset('plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{asset('plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>