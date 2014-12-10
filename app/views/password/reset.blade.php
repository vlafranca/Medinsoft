@if (Session::has('error'))
  {{ trans(Session::get('error')) }}
@elseif (Session::has('success'))
  An email with the password reset has been sent.
@endif

{{ Form::open( [ 'action' => 'RemindersController@postReset']) }}
    {{ Form::hidden('token',$token) }}
    <p>{{ Form::label('email', 'Email') }}
      {{ Form::email('email') }}</p>
    <p>{{ Form::label('password', 'Password') }}
      {{ Form::password('password') }}</p>
    <p>{{ Form::label('password_confirmation', 'Password') }}
      {{ Form::password('password_confirmation') }}</p>
    {{ Form::submit('Reset Password') }}
{{ Form::close() }}