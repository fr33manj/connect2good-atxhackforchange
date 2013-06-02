@extends('layouts.default')


@section('content')
  <div class="row-fluid">
    <div class="span12">
      <div class="jumbotron">
        <h1>Connect2Good</h1>
        <p class="lead">Whether you're in need of stuff, or looking to get rid of stuff, we are here to provide.</p>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      {{Form::open(array('url' => 'index.php/main/search'))}}
        {{Form::textarea('tags', '', array('rows' => '5'))}}<br>
        {{Form::submit('Submit', array('class' => 'btn btn-large btn-primary'))}}
      {{Form::close()}}
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <h2>Looking For:</h2>
    </div>
    <div class="span6">
      <h2>Has to Offer:</h2>
    </div>
  </div>
  <div class="row-fluid" id="lists">
    <div class="span6 well well-small">
      <ul id="looking">
        <li>
          <div class="bcard">
            <div class="bcard-header">
              <h3>Joe Swanson Co.</h3>
            </div>
            <div class="bcard-body">
              <div class="row">
                <div class="pull-left">
                  (716)647-7383
                </div>
                <div class="pull-right">
                  example@example.com
                </div>
              </div>
            </div>
            <div class="bcard-footer">
              <a href="#">Click for more...</a>
            </div>
          </div>
        </li>
        <li>
          <p>
            <strong>Name:</strong> HERPADERPA Inc.<br>
            <strong>Contact:</strong> (716) 647-7383<br>
            <strong>Needs:</strong> Toner, Printers<br>
          </p>
        </li>
        <li>
          <p>
            <strong>Name:</strong> Surfin Co.<br>
            <strong>Contact:</strong> (716) 647-7383<br>
            <strong>Needs:</strong> Paper, Cabinets<br>
          </p>
        </li>
      </ul>
    </div>
    <div class="span6 well well-small">
      <ul id="offering">
        <li>
          <p>
            <strong>Name:</strong> Joe Swanson Co.<br>
            <strong>Contact:</strong> (716) 647-7383<br>
            <strong>Needs:</strong> Computers, Binders<br>
          </p>
        </li>
        <li>
          <p>
            <strong>Name:</strong> HERPADERPA Inc.<br>
            <strong>Contact:</strong> (716) 647-7383<br>
            <strong>Needs:</strong> Toner, Printers<br>
          </p>
        </li>
        <li>
          <p>
            <strong>Name:</strong> Surfin Co.<br>
            <strong>Contact:</strong> (716) 647-7383<br>
            <strong>Needs:</strong> Paper, Cabinets<br>
          </p>
        </li>
      </ul>
    </div>
  </div>
@endsection