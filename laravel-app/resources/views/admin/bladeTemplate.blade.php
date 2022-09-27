@extends('layouts.adminapp')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<p>The Blade is a powerful templating engine in a Laravel framework. The blade allows to use the templating engine easily, and it makes the syntax writing very simple. The blade templating engine provides its own structure such as conditional statements and loops.</p>
<p>@isset($records)
    // $records is defined and is not null...
    @endisset

    @empty($records)
    // $records is "empty"...
    @endempty
    @for ($i = 0; $i < 10; $i++) The current value is {{ $i }} @endfor @foreach ($users as $user) <p>This is user {{ $user->id }}</p>
    <?php echo "called"; ?>
@endforeach

@forelse ($users as $user)
<li>{{ $user->name }}</li>
@empty
<p>No users</p>
@endforelse

@while (true)
<p>I'm looping forever.</p>
@endwhile
</p>
@if($data)
<blockquote>
    <ul>
        @foreach($data as $d)
        <li>{{$d}}</li>
        @endforeach
    </ul>
</blockquote>
@endif
{{ __('You are logged in!') }}
@endsection