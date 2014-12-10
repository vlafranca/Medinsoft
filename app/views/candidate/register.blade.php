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

{{ Form::open(array('route' => 'candidate.register')) }}

    <p>{{ Form::label('email', 'Email') }}
        {{ Form::text('email') }}</p>

    <p>{{ Form::label('login', 'Alias') }}
        {{ Form::text('login') }}</p>

    <p>{{ Form::label('password', 'Password') }}
            {{ Form::password('password') }}</p>

    <p>{{ Form::label('password_confirmation', 'Password Confirmation') }}
    {{ Form::password('password_confirmation') }}</p>

    <p>{{ Form::label('name', 'Nom') }}
      {{ Form::text('name') }}</p>

    <p>{{ Form::label('firstname', 'Prenom') }}
      {{ Form::text('firstname') }}</p>

    <p>{{ Form::label('dob', 'Date de naissance') }}
        {{ Form::input('date', 'dob') }}</p>    {{--html5 style--}}

    <p>{{ Form::label('adress', 'Adresse') }}
      {{ Form::text('adress') }}</p>

    <p>{{ Form::label('city', 'Ville') }}
        {{ Form::text('city') }}</p>

    <p>{{ Form::label('cp', 'Code Postal') }}
      {{ Form::text('cp') }}</p>

    <p>{{ Form::label('tos', 'Cochez cette case pour accepter nos Conditions d\'utilisation') }}
      {{ Form::checkbox('tos') }}</p>

  <p>{{ Form::submit('Submit') }}</p>

{{ Form::close() }}