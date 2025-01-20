@extends('layout.layout')
@section('title', 'ゲーム一覧')
@section('css')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/question_list.blade.css') }}">
@endsection

@section('content')
<h1>問題一覧</h1>
<a class="reset position-reset" href="{{ route('progress_reset') }}">進捗リセット</a>

<div class="button-container">
  <button class="language-button" onclick="filterTable('java',this)">Java</button>
  <button class="language-button" onclick="filterTable('php',this)">PHP</button>
  <button class="language-button" onclick="filterTable('python',this)">Python</button>
  <button class="difficulty-button" onclick="">Easy</button>
  <button class="difficulty-button" onclick="">Normal</button>
  <button class="difficulty-button" onclick="">Hard</button>
</div>


<div class="table-controls">
  <div class="searchForm">
    <button class="searchForm-submit" type="button" onclick="searchTable()">🔍</button>
    <input id="searchInput" class="searchForm-input" type="text" placeholder="検索キーワード">
    <select id="searchField" class="searchForm-select">
      <option value="question">問題文</option>
      <option value="answer">解答</option>
    </select>
  </div>

  <div class="toggle_button">
    <span class="toggle-status">Hidden</span>
    <input id="toggle" class="toggle_input" type="checkbox" />
    <label for="toggle" class="toggle_label"></label>
  </div>
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
    <!-- Java問題 -->
    @foreach ($questionsJava as $index => $question)
    <tr class="java" data-status="active">
      <td>{{ $index + 1 }}</td>
      <td class="question">{{ $question->question }}</td>
      <td class="answer-cell">
        <button class="toggle-answer eye-closed"></button>
        <span class="answer">{{ $question->answer }}</span>
      </td>
      <td>
        <a href="javascript:void(0)"
          class="toggle-explanation"
          data-explanation="{{ $question->explanation }}">▽開く</a>
      </td>
      <td>{{ isset($userData[$question->id]) && ($userData[$question->id]['正解数'] > 0 || $userData[$question->id]['誤答数'] > 0) ? '回答済み' : '未回答' }}</td>
    </tr>
    @endforeach

    <!-- Python問題 -->
    @foreach ($questionsPython as $index => $question)
    <tr class="python" data-status="inactive">
      <td>{{ $index + 1 }}</td>
      <td class="question">{{ $question->question }}</td>
      <td class="answer-cell">
        <button class="toggle-answer eye-closed"></button>
        <span class="answer">{{ $question->answer }}</span>
      </td>
      <td>
        <a href="javascript:void(0)"
          class="toggle-explanation"
          data-explanation="{{ $question->explanation }}">▽開く</a>
      </td>
      <td>{{ isset($userData[$question->id]) && ($userData[$question->id]['正解数'] > 0 || $userData[$question->id]['誤答数'] > 0) ? '回答済み' : '未回答' }}</td>
    </tr>
    @endforeach

    <!-- PHP問題 -->
    @foreach ($questionsPHP as $index => $question)
    <tr class="php" data-status="inactive">
      <td>{{ $index + 1 }}</td>
      <td class="question">{{ $question->question }}</td>
      <td class="answer-cell">
        <button class="toggle-answer eye-closed"></button>
        <span class="answer">{{ $question->answer }}</span>
      </td>
      <td>
        <a href="javascript:void(0)"
          class="toggle-explanation"
          data-explanation="{{ $question->explanation }}">▽開く</a>
      </td>
      <td>{{ isset($userData[$question->id]) && ($userData[$question->id]['正解数'] > 0 || $userData[$question->id]['誤答数'] > 0) ? '回答済み' : '未回答' }}</td>
    </tr>
    @endforeach


  </tbody>
  <!-- モーダル -->
  <div id="explanationModal" class="modal" style="display: none;">
    <div class="modal-content">
      <p id="explanationText"></p>
    </div>
  </div>

</table>

<!-- モーダル構造 -->
<div id="explanationModal" class="modal" style="display: none;">
  <div class="modal-content">
    <p id="explanationText"></p>
  </div>
</div>

<div class="back-button">
  <a href="{{ route('select_mode') }}" style="color:white;">≻戻る</a>
</div>



<script>
  function filterTable(language, button, status = null) {
    const rows = document.querySelectorAll("tbody tr");
    const buttons = document.querySelectorAll(".language-button, .difficulty-button");

    // 言語とステータスに応じて行をフィルタリング
    rows.forEach(row => {
      const isLanguageMatch = row.classList.contains(language);
      const isStatusMatch = !status || row.dataset.status === status;

      if (isLanguageMatch && isStatusMatch) {
        row.classList.remove("hidden");
      } else {
        row.classList.add("hidden");
      }
    });

    // 全てのボタンの 'active' クラスを削除し、クリックされたボタンに付与
    buttons.forEach(btn => btn.classList.remove("active"));
    button.classList.add("active");
  }

  // ページロード時にJavaの行を表示し、Javaボタンをアクティブに
  document.addEventListener("DOMContentLoaded", () => {
    const defaultButton = document.querySelector(".language-button:first-child");
    filterTable('java', defaultButton);
  });


  function searchTable() {
    const searchField = document.getElementById('searchField').value;
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll("tbody tr:not(.hidden)"); // 非表示でない行だけを選択
    let matchFound = false;

    rows.forEach(row => {
      const targetCell = row.querySelector(`.${searchField}`);
      const cellText = targetCell ? targetCell.textContent.toLowerCase() : '';

      if (cellText.includes(searchInput)) {
        row.classList.remove("hidden");
        matchFound = true;
      } else {
        row.classList.add("hidden");
      }
    });

    if (!matchFound) {
      alert('該当する項目が見つかりませんでした。');
    }
  }


  document.addEventListener("DOMContentLoaded", () => {
    // 既存の要素取得
    const toggleAllCheckbox = document.getElementById("toggle"); // 一括表示/非表示チェックボックス
    const toggleLabel = document.querySelector("label[for='toggle']"); // ラベル取得
    const toggleButtons = document.querySelectorAll(".toggle-answer"); // 各解答ボタン
    const answers = document.querySelectorAll(".answer"); // 各解答内容
    const toggleStatus = document.querySelector(".toggle-status"); // Visible/Hidden 表示用

    // --- 初期状態を設定 ---
    if (toggleStatus) {
      toggleStatus.textContent = toggleAllCheckbox.checked ? "Visible" : "Hidden";
    }

    // --- 一括表示/非表示の切り替え ---
    toggleAllCheckbox.addEventListener("change", () => {
      const isChecked = toggleAllCheckbox.checked;

      // 解答を一括表示/非表示
      answers.forEach(answer => {
        answer.style.display = isChecked ? "block" : "none";
      });

      // 各ボタンのアイコンを一括変更
      toggleButtons.forEach(button => {
        if (isChecked) {
          button.classList.remove("eye-closed");
          button.classList.add("eye-open");
        } else {
          button.classList.remove("eye-open");
          button.classList.add("eye-closed");
        }
      });



      // Visible/Hiddenの切り替えを設定
      if (toggleStatus) {
        toggleStatus.textContent = isChecked ? "Visible" : "Hidden";
      }
    });

    // --- 個別表示/非表示の切り替え ---
    toggleButtons.forEach(button => {
      button.addEventListener("click", () => {
        const cell = button.closest(".answer-cell"); // ボタンが属するセルを取得
        const answer = cell ? cell.querySelector(".answer") : null;

        if (!answer) {
          console.error("解答要素が見つかりません");
          return;
        }

        // 解答の表示/非表示を切り替え
        if (answer.style.display === "none" || !answer.style.display) {
          answer.style.display = "block";
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
  //モーダル
  document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("explanationModal");
    const modalContent = document.getElementById("explanationText");
    const explanationLinks = document.querySelectorAll(".toggle-explanation");

    // 解説リンククリック時
    explanationLinks.forEach(link => {
      link.addEventListener("click", function() {
        const explanation = this.getAttribute("data-explanation"); // 解説内容を取得
        modalContent.textContent = explanation; // モーダル内に解説を挿入
        modal.style.display = "flex"; // モーダルを表示
      });
    });

    // モーダル背景クリック時に閉じる
    modal.addEventListener("click", function(event) {
      if (event.target === modal) {
        modal.style.display = "none"; // モーダルを非表示
      }
    });
  });
</script>
@endsection