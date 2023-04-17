<!DOCTYPE html>
<html>
<head>

	<title>{{ $page_title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <meta name="keywords" content="share serices, share anything, hire, list service, products, tools, power tools, tickets, photography, videography, gear, luggage, office space, chinny anthony, services, nanny, trainer, cleaners, subscription, farming, equipments, enechukwu, chinny, ladder, tutors, musical instrument, teachers, others, electronics, lenses, drones, become an agent, earn cash, borrow, how it works, services, guarantee, new york, lagos, nigeria, save cost, digital, customers, make money">

  <meta name="description" content="Sharreit - Share any service anywhere">

  <meta name="msapplication-navbutton-color" content="#C1DDF2"> <!-- Windows Phone -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#C1DDF2"> <!-- iOS Safari -->
  <meta name="theme-color" content="#C1DDF2">

  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">

	<link href="https://fonts.googleapis.com/css?family=Poppins:500&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>

  <link rel="stylesheet" href="{{ asset('css/bootstrap_custom.css') }}">

  <link rel="stylesheet" href="{{ asset('css/custom-bootstrap-margin-padding.css') }}">
  <link rel="stylesheet" href="{{ asset('css/login_style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
  <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
  

</head>
<body>
  <input type="hidden" value="{{ csrf_token() }}" id="txt_token">
  <input type="text" value="{{ url('/') }}" id="txtsite_url" style="display:none">
  <input type="text" value="{{ $page_name }}" id="page_name" style="display:none">

  <div class="alert1 alert-danger"></div>
  <div class="overlay1"></div>


<!-- <a href="{{ url('auth/google') }}" class="btn bth-lg-primaty btn-block">
<strong>Login With Google</strong>
</a> 

<a href="{{ url('auth/facebook') }}" class="btn bth-lg-primaty btn-block">
<strong>Login With facebook</strong>
</a>  -->


	<img class="wave" src="{{ asset('images/wave.png') }}">
  <div class="home_link"><a href="{{ url('/') }}" title="Home Page"><i class="fas fa-home"></i></a></div>


  <div class="circle"></div>

	<div class="container">
		<div class="img">
			<img src="{{ asset('images/bg.svg') }}">
		</div>

		<div class="login-content mt-xs-30">
			<form action="#" class="form_data" autocomplete="off">
        {{ csrf_field() }}
        <img src="{{ asset('images/logo.png') }}">
				<!-- <h2 class="title">Welcome</h2> -->
        
        <div class="login_form" style="display: nones">
          <p class="m-0 mb-40 mt-10 login-caption">Don't have an account? <span class="slide_signup">Sign Up</span></p>

          <div class="input-div one">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>

              <div class="div">
                <h5>Email or phone</h5>
                <input type="text" class="input" required="" id="txtemail" name="txtemail">
              </div>
          </div>

          <div class="input-div pass">
              <div class="i"> 
                <i class="fas fa-lock"></i>
              </div>
              <div class="div">
                <h5>Password</h5>
                <input type="password" class="input" required="" id="txtpass" name="txtpass">
              </div>
          </div>

          <div class="mt-5 mb-40">
            <p class="switch1">
              <label class="switch">
                  <input type="checkbox" name="remember" id="remember" class="checkbox" {{ old('remember') ? 'checked' : 'checked' }} value="0">

                  <span class="slider round"></span>
              </label>
              <font class="fs">Remember me</font>
            </p>
            <a href="javascript:;" class="slide_forgot">Forgot Password?</a>
          </div>
          <input type="submit" class="btn cmd_signin" value="Login">

          <div><label style="font-weight:normal!important;font-size:14px;color:#555;"> - Or Sign in with -</label></div>

          <div class="row social_login p-0 pt-10">
            <div class="offset-4 col-4 p-0">
              <div class="row p-0">
                <div class="col-6 p-0 pr-5" style="backgrounds:red">
                  <a href="{{ url('auth/google') }}">
                    <img src="{{ asset('images/google_login.png') }}">
                  </a> 
                </div>

                <div class="col-6 p-0 pl-5" style="backgrounds:green">
                  <a href="{{ url('auth/facebook') }}" style="text-align:left">
                    <img src="{{ asset('images/fb_login.png') }}">
                  </a> 
                </div>
              </div>
            </div>
          </div>
        </div>
        


        <div class="forgot_form" style="display: none">
          <p class="m-0 mt-10 mb-15 login-caption">Enter your email and reset password</p>

          <div class="mb-20">
            <p class="switch2">
              Return to
              <span class="slide_signin">Sign In</span>
            </p>
          </div>

          <div class="input-div one">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>

              <div class="div">
                <h5>Email Address</h5>
                <input type="email" class="input email_forgot">
              </div>
          </div>
          <div class="infos mt--10 mb-30">Enter your email associated with this platform</div>

          <input type="button" class="btn cmd_send_code" value="Send Reset Code">
        </div>


        <div class="mt-5 reset_form" style="display:none">
          <div class="mb-20 mt-20">
            <p class="switch2">
              Return to
              <span class="slide_signin">Sign In</span>
            </p>
          </div>

          <div class="input-div one mt-20">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>
              <div class="div">
                <h5>Enter code</h5>
                <input type="number" class="input txtcode" id="txtcode" name="txtcode">
              </div>
          </div>

          <div class="input-div one mt--15">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>
              <div class="div">
                <h5>Enter password</h5>
                <input type="password" class="input txtpass1" id="txtpass1" name="txtpass1">
              </div>
          </div>

          <div class="input-div one mt--15">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>
              <div class="div">
                <h5>Confirm password</h5>
                <input type="password" class="input txtpass2" id="txtpass2" name="txtpass2">
              </div>
          </div>
          
          <div class="p-1 mt-15 pb-20">
              <button type="button" class="btn btn-primary w-100 text-decoration-none rounded-50 py-3 fw-bold text-uppercase m-0 cmd_reset_pass">Reset Password</button>
          </div>
        </div>


        <div class="reg_form mb-20 mb-xs-50" style="display: none">
          <p class="m-0 mt-10 mb-20 login-caption">Already a member? <span class="slide_signin">Sign In</span></p>

          <div class="input-div one email_1">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>

              <div class="div">
                <h5>Email Address</h5>
                <input type="email" class="input" id="email_1" style="text-transform: lowercase;">
              </div>
          </div>


          
          <div class="row">
            <div class="col-4 pr-5 pl-15">
              <div class="input-div one">
                <div class="i">
                  <i class="fas fa-phone"></i>
                </div>

                <div class="div">
                  <label class="plus_sign">+</label>
                  <select class="input_select input" id="txt_code" name="txt_code">
                    <option value="">Code</option>
                    @foreach($phoneCodes as $phoneCode)
                      @php $phone_code = $phoneCode['phonecode']; @endphp
                      <option value="{{ $phone_code }}" {{ $phone_code == 1 ? "selected" : "" }} >{{ $phone_code }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>


            <div class="col-8 pl-0">
              <div class="input-div one phone" style="grid-template-columns: 6% 106%;">
                  <div class="i"> 
                    <!-- <i class="fas fa-lock"></i> -->
                  </div>
                  <div class="div">
                    <h5 style="left:-10px;">Phone</h5>
                    <input type="number" class="input" id="phone" style="padding-left:10px!important;left:-18px;">
                  </div>
              </div>
            </div>
          </div>


          <div class="input-div pass password_1 mt-0 mb-40">
              <div class="i"> 
                <i class="fas fa-lock"></i>
              </div>
              <div class="div">
                <h5>Password</h5>
                <input type="password" class="input" id="password_1">
              </div>
          </div>

          <div class="mt--40 mb-50">
            <p class="switch1" style="display:flex">
              <label class="switch">
                  <input type="checkbox" id="agree" name="agree" required checked>
                  <span class="slider round"></span>
              </label>
              <font style="font-size:13px;color:#444;" class="ml-20">Clicking the button below you agree to the <a href="{{ url('/') }}/terms/">terms and condition</a></font>
            </p>
          </div>
          <input type="button" class="btn cmd_signup" value="Create Account">

          <div><label style="font-weight:normal!important;font-size:14px;color:#555;"> - Or Sign up with -</label></div>

          <div class="row social_login p-0 pt-10">
            <div class="offset-4 col-4 p-0">
              <div class="row p-0">
                <div class="col-6 p-0 pr-5" style="backgrounds:red">
                  <a href="{{ url('auth/google') }}">
                    <img src="{{ asset('images/google_login.png') }}">
                  </a> 
                </div>

                <div class="col-6 p-0 pl-5" style="backgrounds:green">
                  <a href="{{ url('auth/facebook') }}" style="text-align:left">
                    <img src="{{ asset('images/fb_login.png') }}">
                  </a> 
                </div>
              </div>
            </div>
          </div>

        </div>

      </form>
    </div>
  </div>

  <div class="footer" style="display: none"></div>


  <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
  
  <script src="{{ asset('js/jscripts.js') }}"></script>

  <script>
      setTimeout(function(){
        var input = $('.input').val();
        
        var email_1 = $('#email_1').val();
        var phone = $('#phone').val();
        var password_1 = $('#password_1').val();

        if(input != ""){
          $(".login_form .input-div.one").addClass("focus");
          $(".login_form .input-div.pass").addClass("focus");
        }


        if(email_1 != ""){
          $(".reg_form .input-div.email_1").addClass("focus");
        }
        if(phone != ""){
          $(".reg_form .input-div.phone").addClass("focus");
        }
        if(password_1 != ""){
          $(".reg_form .input-div.password_1").addClass("focus");
        }
      },500);

      
      const inputs = document.querySelectorAll(".input");
      function addcl(){
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
      }

      function remcl(){
        let parent = this.parentNode.parentNode;
        if(this.value == ""){
          parent.classList.remove("focus");
        }
      }

      inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
      });      
    </script>

</body>
</html>
