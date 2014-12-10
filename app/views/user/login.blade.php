@if($errors->any())
  <div>
    <ul>
      {{ implode('', $errors->all('<li>:message</li>'))}}
    </ul>
  </div>
@endif
@if (Session::has('success'))
  An email with the confirmation link has been sent to your mailbox.
@endif

{{ Form::open(array('route' => $usertype.'.login')) }}

{{ Form::hidden('type',$usertype) }}

  <p>{{ Form::label('email', 'Email') }}
  {{ Form::text('email') }}</p>

  <p>{{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}</p>

  <p>{{ Form::submit('Submit') }}</p>

{{ Form::close() }}