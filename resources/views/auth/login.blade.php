
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Delivery Administración</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/login.css')}}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  <script src="{{asset("dist/js/ingreso.js")}}"></script>
  </head>
<body>
  
 
    <div class='box'>
      
      <label class="delivery">DELIVERY </label>
      <label class="ibarra" > Ibarra</label> 
        <div class='box-form'>
         
          <div class='box-login-tab'></div>
          <div class='box-login-title'>
            <div class='i i-login'></div><h2>Acceso</h2>
          </div>
          <div class='box-login'>
            <div class='fieldset-body' id='login_form'>
              <button onclick="openLoginInfo();" class='b b-form i i-more' title='Más información'></button>
              
           
              <form method="get" action="{{ route('Login.Acceso')}}">
                {{ csrf_field() }}
                        <p class='field'>
                        <label for='user' class="form" >CORREO </label>
                        
                        <input type='text'  name='CORREO' title='Correo' />
                        
                      </p>

                          <p class='field'>
                        <label for='pass' class="form">CONTRASEÑA</label>
                        <input type='password'  name='CONTRASENA' title='Contraseña' />
                      </p>
                     
 @if (session('denegado'))
            <div id="midiv" class="creado" role="alert">
                {{session('denegado')}}
            </div>
          @endif
                          <input type='submit'  value='INGRESO' title='Ingreso' />
                      </form>
                
            </div>
          </div>
        </div>
        <div class='box-info'>
            <p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Back to Sign In'></button><h3>Necesitas ayuda?</h3>
          </p>
                              <div class='line-wh'></div>
                              <button onclick="" class='b-support' title='Forgot Password?'> Olvidaste tu contraseña?</button>
          <button onclick="" class='b-support' title='Contact Support'> Contacto de Soporte</button>
                              <div class='line-wh'></div>
         
                        </div>
      </div>
       <div class='icon-credits'>Delivery Aplicación</div>
      


  </body>
  
  </html>

