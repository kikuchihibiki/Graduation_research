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
                <td>
                <!-- 解説リンクに解説データを設定 -->
                <a href="javascript:void(0)" 
                class="toggle-explanation" 
                data-explanation="java解説 {{ $i + 1 }}">▽解説</a>
                </td>
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


<script>
function filterTable(language, status = null) {
  const rows = document.querySelectorAll("tbody tr");
  rows.forEach(row => {
    const isLanguageMatch = language === 'all' || row.classList.contains(language);
    const isStatusMatch = !status || row.dataset.status === status;

    if (isLanguageMatch && isStatusMatch) {
      row.classList.remove("hidden");
    } else {
      row.classList.add("hidden");
    }
  });
}


function searchTable() {
  const searchField = document.getElementById('searchField').value; 
  const searchInput = document.getElementById('searchInput').value.toLowerCase();
  const rows = document.querySelectorAll("tbody tr");
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

//モーダル
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("explanationModal");
    const modalContent = document.getElementById("explanationText");
    const explanationLinks = document.querySelectorAll(".toggle-explanation");

    // 解説リンククリック時
    explanationLinks.forEach(link => {
        link.addEventListener("click", function () {
            const explanation = this.getAttribute("data-explanation"); // 解説内容を取得
            modalContent.textContent = explanation; // モーダル内に解説を挿入
            modal.style.display = "flex"; // モーダルを表示
        });
    });

    // モーダル背景クリック時に閉じる
    modal.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none"; // モーダルを非表示
        }
    });
});

</script>

<a href="/select_mode">戻る</a>
@endsection
