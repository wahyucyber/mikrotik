<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>{{ env("app_name") }}</title>
   @include('_layouts.css')
</head>
<body>
   <body class="login">
      <div>
        <div class="login_wrapper">
          <div class="animate form login_form">
            <section class="login_content">
              <form>
                <h1>Login</h1>
                <div>
                  <input type="text" class="form-control" placeholder="Username" required="" />
                </div>
                <div>
                  <input type="password" class="form-control" placeholder="Password" required="" />
                </div>
                <div>
                  <button type="submit" class="btn btn-success btn-block">Login</button>
                </div>
  
                <div class="clearfix"></div>
  
                <div class="separator">
                  <div>
                    <h1><i class="fa fa-paw"></i> {{ env("app_name") }}!</h1>
                    <p>©2020 Copyright.</p>
                  </div>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </body>

   @include('_layouts.js')

  <script type="text/javascript">
  </script>
</body>
</html>