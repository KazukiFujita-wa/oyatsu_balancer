<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>おやつ結果 | おやつバランサー</title>
    @vite(['resources/css/app.css'])
    <style>
        body {
            font-family: "Noto Sans JP", sans-serif;
            background: #fafafa;
            text-align: center;
            color: #333;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .snack-item {
            border-bottom: 1px solid #ddd;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .snack-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .snack-info {
            text-align: left;
        }
        button {
            background: #f08b2f;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            margin: 10px;
        }
        .total {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>おやつの結果一覧 🍪</h1>

        @if(count($snacks) > 0)
            <div class="result-list">
                @foreach($snacks as $snack)
                    <div class="snack-item">
                        @if($snack->image)
                            <img src="{{ asset('storage/' . $snack->image) }}" alt="{{ $snack->name }}">
                        @else
                            <img src="https://via.placeholder.com/100?text={{ urlencode($snack->name) }}" alt="{{ $snack->name }}">
                        @endif
                        <div class="snack-info">
                            <h3>{{ $snack->name }}</h3>
                            <p>価格: ¥{{ number_format($snack->price) }}</p>
                            <p>味: {{ $snack->taste === 'sweet' ? '🍬 甘い' : '🍿 しょっぱい' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="total">
                <p>合計: ¥{{ number_format($total) }} (残り: ¥{{ number_format($remaining) }})</p>
            </div>
        @else
            <p>条件に合うおやつが見つかりませんでした。予算を増やしてみてください。</p>
        @endif

        <div class="actions">
            <button onclick="window.location.href='{{ route('home') }}'">もう一度抽選</button>
            <button onclick="window.location.href='{{ route('share') }}'">結果をシェア</button>
        </div>
    </div>
</body>
</html>