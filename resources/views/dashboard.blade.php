@extends('layouts.app')

@section('content')
<div class="container">
    <h1>ダッシュボード</h1>

    <div class="card mb-4">
        <div class="card-header">
            ユーザー情報
        </div>
        <div class="card-body">
            <h5>名前: {{ Auth::user()->name }}</h5>
            <h5>メール: {{ Auth::user()->email }}</h5>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            最近の活動
        </div>
        <div class="card-body">
            <ul>
                <li>最近のログイン: {{ Auth::user()->updated_at }}</li>
                <li>最近のアクティビティを表示（必要に応じて追加）</li>
            </ul>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            簡単な統計情報
        </div>
        <div class="card-body">
            <h5>登録ユーザー数: {{ \App\Models\User::count() }}</h5>
            <!-- 他の統計情報を追加可能 -->
        </div>
    </div>
</div>
@endsection

