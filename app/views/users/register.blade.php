
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in &middot; Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    {{HTML::style("//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css", array('rel' => 'stylesheets'))}}
    {{HTML::style("//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css", array('rel' => 'stylesheets'))}}
    
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php
            print_r($errors);
    ?>
    <div class="container">
        {{ Form::open(array('url' => 'users/register', 'class' => 'form-signin')) }}
            <h2 class="form-signin-heading">Please sign in</h2>
            {{ Form::text('email', '', array('class' => 'input-block-level', 'id' => 'email', 'placeholder' => 'Email address')) }}
            {{ Form::password('password', '', array('class' => 'input-block-level', 'id' => 'password', 'placeholder' => 'Password'))}}
            {{ Form::password('password_confirmation', '', array('class' => 'input-block-level', 'id' => 'password_confirm', 'placeholder' => 'Password'))}}
            {{ Form::button('Register', array('type' => 'submit', 'class' => 'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div> <!-- /container -->
    {{HTML::script('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js')}}
  </body>
</html>