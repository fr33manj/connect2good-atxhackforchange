<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Connect2Good</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    {{HTML::style("//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css", array('rel' => 'stylesheet'))}}
    {{HTML::style("//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css", array('rel' => 'stylesheet'))}}
    
    <style type="text/css">
      .jumbotron {
        text-align: center;
      }

      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }

      form {
        text-align: center;
      }

      form textarea {
        width: 596px;
        resize: none;
      }

      .span6>h2 {
        text-align: center;
      }

      .bcard {
        background-color: #fff;
        border: 1px solid #000;
        margin-bottom: 1%;
      }

      #lists ul {
        list-style-type: none;
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      @yield('content')
    </div>
    {{HTML::script('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js')}}
  </body>
</html>