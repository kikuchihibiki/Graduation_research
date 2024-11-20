@extends('layout.layout')
@section('title', 'ゲーム一覧')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/question_list.blade.css') }}">
@endsection

@section('content')
<h1>問題一覧</h1>
<div class="button-container">
  <button onclick="filterTable('java')">Java</button>
  <button onclick="filterTable('php')">PHP</button>
  <button onclick="filterTable('python')">Python</button>
  <button onclick="filterTable('all')">All</button>
</div>

<!-- 検索窓 -->
<div class="searchForm">
  <select id="searchField" class="searchForm-select">
    <option value="question">問題文</option>
    <option value="answer">解答</option>
  </select>
  <input id="searchInput" class="searchForm-input" type="text" placeholder="検索キーワード">
  <button class="searchForm-submit" type="button" onclick="searchTable()">🔍</button>
</div>

<!--トグルボタン-->
<div class="toggle-container">
  <span id="toggle-label">Hidden</span>
  <label class="toggle">
    <input type="checkbox" id="toggle-all">
    <span class="slider"></span>
  </label>
</div>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>問題</th>
            <th>解答</th>
            <th>解説</th>
            <th>回答状況</th>
        </tr>
    </thead>
    <tbody>
        <!-- Java問題 -->
        @for ($i = 0; $i < 4; $i++)
            <tr class="java">
                <td>{{ $i + 1 }}</td>
                <td class="question">java問題{{ $i + 1 }}</td>
                <td class="answer-cell">
                <button class="toggle-answer eye-closed"></button>
                <span class="answer">java解答{{ $i + 1 }}</span>
                </td>
                <td>java解説 {{ $i + 1 }}</td>
                <td>java回答状況 {{ $i + 1 }}</td>
            </tr>
        @endfor

        <!-- Python問題 -->
        @for ($i = 0; $i < 4; $i++)
            <tr class="python">
                <td>{{ $i + 1 }}</td>
                <td class="question">python問題{{ $i + 1 }}</td>
                <td class="answer-cell">
                <button class="toggle-answer eye-closed"></button>
                <span class="answer">python解答{{ $i + 1 }}</span>
                </td>
                <td>python解説 {{ $i + 1 }}</td>
                <td>python回答状況 {{ $i + 1 }}</td>
            </tr>
        @endfor

        <!-- PHP問題 -->
        @for ($i = 0; $i < 4; $i++)
            <tr class="php">
                <td>{{ $i + 1 }}</td>
                <td class="question">php問題{{ $i + 1 }}</td>
                <td class="answer-cell">
                <button class="toggle-answer eye-closed"></button>
                <span class="answer">php解答{{ $i + 1 }}</span>
                </td>
                <td>php解説 {{ $i + 1 }}</td>
                <td>php回答状況 {{ $i + 1 }}</td>
            </tr>
        @endfor
    </tbody>
</table>


<script>
  function filterTable(language) {
    const rows = document.querySelectorAll("tbody tr");
    rows.forEach(row => {
      if (language === 'all') {
        row.classList.remove("hidden");
      } else if (row.classList.contains(language)) {
        row.classList.remove("hidden");
      } else {
        row.classList.add("hidden");
      }
    });
  }

  function searchTable() {
  // プルダウンで選択された検索対象（question または answer）
  const searchField = document.getElementById('searchField').value; 
  const searchInput = document.getElementById('searchInput').value.toLowerCase(); // 検索キーワードを小文字に変換
  const rows = document.querySelectorAll("tbody tr"); // テーブルの行を取得

  rows.forEach(row => {
    // 対象のセルを選択（選択値によって切り替え）
    const targetCell = row.querySelector(`.${searchField}`);
    const cellText = targetCell ? targetCell.textContent.toLowerCase() : '';

    // キーワードが一致するかを判定
    if (cellText.includes(searchInput)) {
      row.classList.remove("hidden"); // 一致する行を表示
    } else {
      row.classList.add("hidden"); // 一致しない行を非表示
    }
  });
}


document.addEventListener("DOMContentLoaded", () => {
  const toggleAllCheckbox = document.getElementById("toggle-all");
  const toggleLabel = document.getElementById("toggle-label");
  const toggleButtons = document.querySelectorAll(".toggle-answer");
  const answers = document.querySelectorAll(".answer");

  // 一括表示/非表示の切り替え
  toggleAllCheckbox.addEventListener("change", () => {
    const isChecked = toggleAllCheckbox.checked;

    // 解答を一括表示/非表示
    answers.forEach(answer => {
      answer.style.display = isChecked ? "inline" : "none";
    });

    // 個別ボタンの状態を一括更新
    toggleButtons.forEach(button => {
      if (isChecked) {
        button.classList.remove("eye-closed");
        button.classList.add("eye-open");
      } else {
        button.classList.remove("eye-open");
        button.classList.add("eye-closed");
      }
    });

    // ラベルを変更
    toggleLabel.textContent = isChecked ? "Visible" : "Hidden";
  });

  // 個別表示/非表示の切り替え
  toggleButtons.forEach(button => {
    button.addEventListener("click", () => {
      const cell = button.closest(".answer-cell");
      const answer = cell.querySelector(".answer");

      // 解答セルの表示/非表示切り替え
      if (answer.style.display === "none" || !answer.style.display) {
        answer.style.display = "inline";
        button.classList.remove("eye-closed");
        button.classList.add("eye-open");
      } else {
        answer.style.display = "none";
        button.classList.remove("eye-open");
        button.classList.add("eye-closed");
      }
    });
  });
});
</script>

<a href="/select_mode">戻る</a>
@endsection
