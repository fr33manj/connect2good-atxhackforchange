@extends('layouts.default')


@section('content')
  <div class="row-fluid">
    <div class="span12">
      <div class="jumbotron">
        <h1>Connect2Good</h1>
        <p class="lead">Connecting people and resources 2 good.</p>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      {{Form::open(array())}}
        {{Form::textarea('tags', '', array('id' => 'tags', 'rows' => '5'))}}<br>
        {{Form::button('Submit', array('id' => 'search', 'class' => 'btn btn-large btn-primary'))}}
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
      </ul>
    </div>
    <div class="span6 well well-small">
      <ul id="offering">
        
      </ul>
    </div>
  </div>
@endsection