<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <form method="post" action="{{route('custom.index')}}">
            @csrf
            <p>
                <select name="country">
                    <option disabled selected value>未選択</option>
                    <option value="jp" selected>日本</option>
                    <option value="fr">フランス</option>
                    <option value="ca">カナダ</option>
                    <option value="de">ドイツ</option>
                    <option value="gb">イギリス</option>
                    <option value="it">イタリア</option>
                    <option value="us">アメリカ</option>
                    <option value="ru">ロシア</option>
                </select>
                <select name="category">
                    <option disabled selected value>未選択</option>
                    <option value="entertainment">entertainment</option>
                    <option value="business">business</option>
                    <option value="general">general</option>
                    <option value="health">health</option>
                    <option value="science">science</option>
                    <option value="sports">sports</option>
                    <option value="technology">technology</option>
                </select>
            </p>
            <p><input type="submit" value="取得する"></p>
        </form>
        @foreach($news as $data)
        <div class="card-body pt-0 pb-2">
            <h3 class="h5 card-title">
                <a href="{{$data['url']}}">{{$data['name']}}</a>
            </h3>
            <div class="card-text">
                <img src="{{$data['thumbnail']}}">
            </div>
        </div>
        @endforeach
    </div>


</body>

</html>