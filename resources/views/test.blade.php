<body>
    <h1>hello world</h1>
    @for($i = 0; $i < 10; $i++)
        <p>{{ $i }}</p>
    @endfor

    @foreach($users as $user)
        <p>{{ $user->name }}</p>
    @endforeach
</body>