@if (Session::has('error'))
  {{ trans(Session::get('error')) }}
@elseif (Session::has('success'))
  An email with the password reset has been sent.
@endif
 
{{ Form::open(array('route' => 'password.remind')) }}
 
  <p>{{ Form::label('email', 'Email') }}
  {{ Form::text('email') }}</p>
 
  <p>{{ Form::submit('Submit') }}</p>
 
{{ Form::close() }}