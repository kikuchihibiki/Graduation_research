@extends('layout.layout')
@section('title', '問題一覧')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin_questionlist.css') }}">
@endsection

@section('content')
<h1>問題一覧</h1>

<form action="/search" method="POST">
    @csrf
    <input type="text" name="query" placeholder="キーワードで検索">
    <input type="submit" value="検索">
</form>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>問題</th>
            <th>解答</th>
            <th>公開</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questionsJava as $index => $question)
        <tr class="question-row" data-question-id="{{ $question->id }}">
            <td>{{ $index + 1 }}</td>
            <td class="question">{{ $question->question }}</td>
            <td><span class="answer">{{ $question->answer }}</span></td>
            <td>公開</td>
            <td>
                <a href="{{ route('admin.admin_edit', ['id' => $question->id]) }}">編集</a>
            </td>
            <td>
                <!-- 削除ボタン -->
                <div class="trash" data-id="{{ $question->id }}" style="cursor: pointer; color: red;">🗑️</div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/select_mode" class="btn btn-back">モード選択に戻る</a>
<a href="{{ route('admin.admin_questionlist') }}" class="btn btn-back">戻る</a>

<!-- 削除確認モーダル -->
<div id="deleteModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: black; border: 1px solid #ccc; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.5); z-index: 1000;">
    <p>本当に削除しますか？</p>
    <button id="confirmDelete" style="background-color: red; color: white; padding: 10px 20px;">はい</button>
    <button id="cancelDelete" style="background-color: gray; color: white; padding: 10px 20px;">キャンセル</button>
</div>

<!-- モーダルの背景 -->
<div id="modalBackdrop" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 500;"></div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // モーダル要素の取得
        const deleteModal = document.getElementById('deleteModal');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const confirmDeleteButton = document.getElementById('confirmDelete');
        const cancelDeleteButton = document.getElementById('cancelDelete');

        // 削除対象のIDを格納する変数
        let deleteTargetId = null;

        // 削除ボタンのクリックイベントを設定
        document.querySelectorAll('.trash').forEach(function(trashIcon) {
            trashIcon.addEventListener('click', function() {
                // 削除対象のIDを取得
                deleteTargetId = this.getAttribute('data-id');

                // モーダルを表示
                deleteModal.style.display = 'block';
                modalBackdrop.style.display = 'block';
            });
        });

        // 「はい」を押した場合
        confirmDeleteButton.addEventListener('click', function() {
            if (deleteTargetId) {
                // サーバーに削除リクエストを送信
                fetch(`/admin/questions/${deleteTargetId}/delete`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // 削除成功時に行を削除
                            const row = document.querySelector(`.trash[data-id="${deleteTargetId}"]`).closest('tr');
                            row.remove();
                        } else {
                            alert('削除に失敗しました。');
                        }
                    })
                    .catch(error => console.error('エラー:', error));
            }

            // モーダルを閉じる
            deleteModal.style.display = 'none';
            modalBackdrop.style.display = 'none';
        });

        // 「キャンセル」を押した場合
        cancelDeleteButton.addEventListener('click', function() {
            // モーダルを閉じる
            deleteModal.style.display = 'none';
            modalBackdrop.style.display = 'none';
        });
    });
</script>