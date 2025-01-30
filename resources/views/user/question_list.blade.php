<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>問題一覧</title>
  <link rel="stylesheet" href="{{ asset('css/question_list.blade.css') }}">
</head>

<body>
  <h1>問題一覧</h1>
  <a class="reset position-reset" href="{{ route('progress_reset') }}">進捗リセット</a>

  <div class="button-container">
    <form id="settingBox">
      <thead>
        <tr class="mode">

          <th class="lang java">
            <input id="javaCheck" type="radio" name="tab_item" checked value="java">
            <label class="tab_item checkBox kind" for="javaCheck">JAVA</label>
          </th>

          <th class="lang php">
            <input id="phpCheck" type="radio" name="tab_item" value="php">
            <label class="tab_item checkBox kind" for="phpCheck">PHP</label>
          </th>

          <th class="lang python">
            <input id="pythonCheck" type="radio" name="tab_item" value="python">
            <label class="tab_item checkBox kind" for="pythonCheck">PYTHON</label>
          </th>


        </tr>
        <tr class="level">

          <th>
            <input id="easy" type="radio" name="tab_item2" value="easy" checked>
            <label class="tab_item checkBox2" for="easy">イージー</label>
          </th>


          <th>
            <input id="normal" type="radio" name="tab_item2" value="normal">
            <label class="tab_item checkBox2" for="normal">ノーマル</label>
          </th>


          <th>
            <input id="hard" type="radio" name="tab_item2" value="hard">
            <label class="tab_item checkBox2" for="hard">ハード</label>
          </th>
        </tr>
      </thead>
    </form>
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

      @foreach ($questions['java']['easy'] as $index => $question)
      <tr class="java easy">
        <td>{{ $index + 1 }}</td>
        <td class="question highlight-row ">{{ $question->question }}</td>
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

      @foreach ($questions['java']['normal'] as $index => $question)
      <tr class="java normal sort">
        <td>{{ $index + 1 }}</td>
        <td class="question highlight-row ">{{ $question->question }}</td>
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

      @foreach ($questions['java']['hard'] as $index => $question)
      <tr class="java hard sort">
        <td>{{ $index + 1 }}</td>
        <td class="question highlight-row ">{{ $question->question }}</td>
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

      @foreach ($questions['python']['easy'] as $index => $question)
      <tr class="python easy sort" data-status="active">
        <td>{{ $index + 1 }}</td>
        <td class="question highlight-row ">{{ $question->question }}</td>
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

      @foreach ($questions['python']['normal'] as $index => $question)
      <tr class="python normal sort" data-status="inactive">
        <td>{{ $index + 1 }}</td>
        <td class="question highlight-row ">{{ $question->question }}</td>
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

      @foreach ($questions['python']['hard'] as $index => $question)
      <tr class="python hard sort" data-status="inactive">
        <td>{{ $index + 1 }}</td>
        <td class="question highlight-row ">{{ $question->question }}</td>
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

      @foreach ($questions['php']['easy'] as $index => $question)
      <tr class="php easy sort" data-status="active">
        <td>{{ $index + 1 }}</td>
        <td class="question highlight-row">{{ $question->question }}</td>
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

      @foreach ($questions['php']['normal'] as $index => $question)
      <tr class="php normal sort" data-status="inactive">
        <td>{{ $index + 1 }}</td>
        <td class="question highlight-row ">{{ $question->question }}</td>
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

      @foreach ($questions['php']['hard'] as $index => $question)
      <tr class="php hard sort" data-status="inactive">
        <td>{{ $index + 1 }}</td>
        <td class="question highlight-row ">{{ $question->question }}</td>
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
</body>

</html>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    // ラジオボタンの変更を監視
    const languageRadios = document.querySelectorAll("input[name='tab_item']");
    const levelRadios = document.querySelectorAll("input[name='tab_item2']");

    // テーブル行をフィルタリングする関数
    function filterQuestions() {
      // 選択されたモード（言語）と難易度を取得
      const selectedLanguage = document.querySelector("input[name='tab_item']:checked").value;
      const selectedLevel = document.querySelector("input[name='tab_item2']:checked").value;

      // すべての行を取得
      const rows = document.querySelectorAll("tr.sort");

      // 行の表示/非表示を切り替え
      rows.forEach((row) => {
        const isLanguageMatch = row.classList.contains(selectedLanguage);
        const isLevelMatch = row.classList.contains(selectedLevel);

        if (isLanguageMatch && isLevelMatch) {
          row.style.display = ""; // 表示
        } else {
          row.style.display = "none"; // 非表示
        }
      });
    }

    // イベントリスナーを設定
    languageRadios.forEach((radio) => {
      radio.addEventListener("change", filterQuestions);
    });

    levelRadios.forEach((radio) => {
      radio.addEventListener("change", filterQuestions);
    });

    // 初期フィルタリングを実行
    filterQuestions();
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