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
        <h4>Edit 
@if ($user->email == Sentry::getUser()->email)
  Your
@else 
  {{ $user->email }}'s 
@endif 

Profile</h4>
<div class="well">
  <form class="form-horizontal" action='{{URL::action("UsersController@post_account", "[$user->id]")}}' method="post">
        <input type="hidden" name="_token" id="_token" value="{{ Session::getToken() }}" />
        
      <div class="control-group {{ ($errors->has('firstName')) ? 'error' : '' }}" for="firstName">
          <label class="control-label" for="firstName">First Name</label>
        <div class="controls">
        <input name="firstName" value="{{ (Request::old('firstName')) ? Request::old("firstName") : $user->first_name }}" type="text" class="input-xlarge" placeholder="First Name">
          {{ ($errors->has('firstName') ? $errors->first('firstName') : '') }}
        </div>
      </div>

      <div class="control-group {{ $errors->has('lastName') ? 'error' : '' }}" for="lastName">
          <label class="control-label" for="lastName">Last Name</label>
        <div class="controls">
        <input name="lastName" value="{{ (Request::old('lastName')) ? Request::old("lastName") : $user->last_name }}" type="text" class="input-xlarge" placeholder="Last Name">
          {{ ($errors->has('lastName') ?  $errors->first('lastName') : '') }}
        </div>
      </div>

      <div class="control-group {{$errors->has('phoneNumber') ? 'error' : '' }}" for="phoneNumber">
        <label class="control-label" for="phoneNumber">Phone Number</label>
        <div class="controls">
          <input name="phoneNumber" value="{{ (Request::old('phoneNumber')) ? Request::old("phoneNumber") : $user->phone_number }}" type="text" class="input-xlarge" placeholder="(XXX) XXX-XXXX">
          {{ ($errors->has('phoneNumber') ? $errors->first('phoneNumber') : '') }}
        </div>
      </div>

      <div class="form-actions">
        <input class="btn-primary btn" type="submit" value="Submit Changes"> 
        <input class="btn-inverse btn" type="reset" value="Reset">
      </div>
    </form>
</div>

<h4>Change Password</h4>
<div class="well">
  <form class="form-horizontal" action="/users/changepassword/{{ $user->id }}" method="post">
        <input type="hidden" name="_token" id="_token" value="{{ Session::getToken() }}" />
        
        <div class="control-group {{ $errors->has('oldPassword') ? 'error' : '' }}" for="oldPassword">
          <label class="control-label" for="oldPassword">Old Password</label>
        <div class="controls">
        <input name="oldPassword" value="" type="password" class="input-xlarge" placeholder="Old Password">
          {{ ($errors->has('oldPassword') ? $errors->first('oldPassword') : '') }}
        </div>
      </div>

        <div class="control-group {{ $errors->has('newPassword') ? 'error' : '' }}" for="newPassword">
          <label class="control-label" for="newPassword">New Password</label>
        <div class="controls">
        <input name="newPassword" value="" type="password" class="input-xlarge" placeholder="New Password">
          {{ ($errors->has('newPassword') ?  $errors->first('newPassword') : '') }}
        </div>
      </div>

      <div class="control-group {{ $errors->has('newPassword_confirmation') ? 'error' : '' }}" for="newPassword_confirmation">
          <label class="control-label" for="newPassword_confirmation">Confirm New Password</label>
        <div class="controls">
        <input name="newPassword_confirmation" value="" type="password" class="input-xlarge" placeholder="New Password Again">
          {{ ($errors->has('newPassword_confirmation') ? $errors->first('newPassword_confirmation') : '') }}
        </div>
      </div>
            
      <div class="form-actions">
        <input class="btn-primary btn" type="submit" value="Change Password"> 
        <input class="btn-inverse btn" type="reset" value="Reset">
      </div>
      </form>
  </div>

@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
<h4>User Group Memberships</h4>
<div class="well">
    <form class="form-horizontal" action="/users/updatememberships/{{ $user->id }}" method="post">
        <input type="hidden" name="_token" id="_token" value="{{ Session::getToken() }}" />

        <table class="table">
            <thead>
                <th>Group</th>
                <th>Membership Status</th>
            </thead>
            <tbody>
                @foreach ($allGroups as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>
                            <div class="switch" data-on-label="In" data-on='info' data-off-label="Out">
                                <input name="permissions[{{ $group->id }}]" type="checkbox" {{ ( $user->inGroup($group)) ? 'checked' : '' }} >
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="form-actions">
            <input class="btn-primary btn" type="submit" value="Update Memberships">
        </div> 
    </form>
</div>
@endif
    </div> <!-- /container -->
    {{HTML::script('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js')}}
  </body>
</html>