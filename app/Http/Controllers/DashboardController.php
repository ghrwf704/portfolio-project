<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory; // ログイン履歴モデルをインポート
use App\Models\User; // ユーザーモデルをインポート
use Illuminate\Support\Facades\Auth; // 認証ファサードをインポート

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // 現在のユーザーを取得
        $recentLogins = LoginHistory::where('user_id', $user->id)
            ->orderBy('login_at', 'desc')
            ->take(10)
            ->get(); // 最近のログイン履歴を取得

        $userCount = User::count(); // 登録ユーザー数を取得

        // ビューにデータを渡す
        return view('dashboard', compact('user', 'recentLogins', 'userCount'));
    }
}

