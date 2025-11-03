<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>おやつ予算アプリ | おやつバランサー</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: "Noto Sans JP", sans-serif;
            background: #fafafa;
            text-align: center;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        input[type="number"], input[type="range"] {
            width: 80%;
            margin: 10px 0;
        }
        button {
            background: #f08b2f;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
        }
        .balance-labels {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin: 0 auto;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🍪 おやつ予算アプリ</h1>
        
        <form action="{{ route('result') }}" method="GET">
            <div class="input-section">
                <label for="budget">予算(円):</label>
                <input type="number" id="budget" name="budget" placeholder="例: 500" min="100" step="50" value="500" required>
            </div>

            <div>
                <label for="balance">味のバランス (甘い ↔ しょっぱい)</label>
                <input type="range" id="balance" name="balance" min="0" max="10" value="5">
                <div class="balance-labels">
                    <span>甘い</span>
                    <span>しょっぱい</span>
                </div>
            </div>

            <button type="submit">おやつを探す!</button>
        </form>
    </div>
</body>
</html>