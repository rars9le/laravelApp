    <body>
        <h1>Index</h1>
        @if (isset($msg) && $msg != '')
        <p>こんにちは、{{ $msg }}さん</p>
        @else
        <p>なにか書いてください</p>
        @endif  
        <form action="/hello" method="post">
            @csrf
            <input type="text" name="msg">
            <input type="submit">
        </form>


        <p>ここが本文コンテンツ</p>
        <ul>
            @each('components.item', $data, 'item')
        </ul>
        <p>Contoller Value<br>'message' = {{ $message }}</p>
        <p>ViewComposer Value<br>'view_message' = {{ $view_message }}</p>
    </body>