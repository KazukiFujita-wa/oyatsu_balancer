<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シェア | おやつ予算アプリ</title>
    @vite(['resources/css/app.css'])
    <style>
        body {
            font-family: "Noto Sans JP", sans-serif;
            background: #fafafa;
            text-align: center;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            background: #fff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        button {
            background: #f08b2f;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            margin: 10px;
        }
        .twitter { background: #1DA1F2; }
        .line { background: #00B900; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎉 結果をシェア!</h1>
        <p>友達におやつバランサーを共有しよう!</p>

        <button class="twitter" id="shareTwitter">Twitter(X)でシェア</button>
        <button class="line" id="shareLine">LINEでシェア</button>
        <button onclick="window.location.href='{{ route('home') }}'">戻る</button>
    </div>

    <script>
        const url = encodeURIComponent("{{ url('/') }}");
        const text = encodeURIComponent("おやつバランサーで遊んでみた! 🍪");

        document.getElementById('shareTwitter').onclick = () => {
            window.open(`https://twitter.com/intent/tweet?text=${text}&url=${url}`);
        };

        document.getElementById('shareLine').onclick = () => {
            window.open(`https://social-plugins.line.me/lineit/share?url=${url}`);
        };
    </script>
</body>
</html>