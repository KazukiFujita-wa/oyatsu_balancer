<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    // API用: JSON返却
    public function index()
    {
        return response()->json(Snack::all());
    }

    // View用: 結果画面表示
    public function result(Request $request)
    {
        $budget = $request->query('budget', 500);
        $balance = $request->query('balance', 5);

        // お菓子データ取得
        $allSnacks = Snack::all();

        // 抽選ロジック
        $selectedSnacks = $this->selectSnacks($allSnacks, $budget, $balance);

        // 合計金額
        $total = collect($selectedSnacks)->sum('price');
        $remaining = $budget - $total;

        return view('result', [
            'snacks' => $selectedSnacks,
            'total' => $total,
            'remaining' => $remaining,
            'budget' => $budget,
            'balance' => $balance,
        ]);
    }

    // 🎲 抽選ロジック
    private function selectSnacks($snacks, $budget, $balance)
    {
        $sweetRatio = (10 - $balance) / 10;
        $saltyRatio = $balance / 10;

        $sweetSnacks = $snacks->where('taste', 'sweet')->values();
        $saltySnacks = $snacks->where('taste', 'salty')->values();

        $selected = [];
        $total = 0;
        $attempts = 0;
        $maxAttempts = 100;

        while ($total < $budget && $attempts < $maxAttempts) {
            $attempts++;

            // 甘い/しょっぱいをランダム選択
            $pickList = (rand(0, 100) / 100 < $sweetRatio) ? $sweetSnacks : $saltySnacks;

            if ($pickList->isEmpty()) continue;

            $randomSnack = $pickList->random();

            if ($total + $randomSnack->price <= $budget) {
                $selected[] = $randomSnack;
                $total += $randomSnack->price;
            }
        }

        return $selected;
    }
}