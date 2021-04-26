<body>
    <h1>Index</h1>
    <p>ここが本文コンテンツ</p>
    <ul>
        @each('components.item', $data, 'item')
    </ul>
    <p>Contoller Value<br>'message' = {{ $message }}</p>
    <p>ViewComposer Value<br>'view_message' = {{ $view_message }}</p>
</body>