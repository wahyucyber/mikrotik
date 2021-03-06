<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>{{ env("app_name") }} > Login</title>
   @include('_layouts.css')
</head>
<body>
   <body class="login">
      <div>
        <div class="login_wrapper">
          <div class="animate form login_form">
            <section class="login_content">
              <form class="login">
                <h1>Login</h1>
                <div class="errors">
                </div>
                <div>
                  <input type="text" class="form-control username" autofocus autocomplete="none" placeholder="Username"/>
                </div>
                <div>
                  <input type="password" class="form-control password" placeholder="Password"/>
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
  var errorElement = "div.errors";

  class Auth extends App {
    constructor() {
      super();
    }

    login(data = []) {
      this.http({
        method: "POST",
        url: "auth",
        data: data
      }, e => {
        if(e.status == false) {
          app.notif({
            element: errorElement,
            type: "danger",
            text: e.error
          });
        }else{
          window.location="{{ base_url("auth/verify/") }}"+e.data.token;
        }
      })
    }
  }

  var auth = new Auth;

  $(document).on("submit", "form.login", function() {
    username = $("form.login input.username").val(),
    password = $("form.login input.password").val()

    if(username == "") {
      app.notif({
        element: errorElement,
        type: "danger",
        text: "Username belum diisi."
      });
      return false;
    }else if(password == "") {
      app.notif({
        element: errorElement,
        type: "danger",
        text: "Password belum diisi."
      });
      return false;
    }

    auth.login({
      username: username,
      password: password
    });

    return false;
  })
  </script>
</body>
</html>