<body>
    <h1>Index</h1>
    @if (isset($msg) && $msg != '')
        <p>こんにちは、{{ $msg }}さん</p>
    @else
        <p>なにか書いてください</p>
    @endif  
    <form action="/hello" method="post">

        @foreach ($data as $item)
            <span>{{ $item['name'] }}</span>
            <span>{{ $item['mail'] }}</span>
            <br>
        @endforeach
        @csrf
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body>