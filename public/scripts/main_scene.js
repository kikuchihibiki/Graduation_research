// スタート画面のシーン
class StartScene extends Phaser.Scene {
    constructor() {
        super({ key: 'StartScene' });
    }

    preload() {
        this.load.image('background', '/assets/background.png');
    }

    create() {
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);

        // スタートメッセージ表示
        const startLabel = this.add.text(D_WIDTH / 2, D_HEIGHT / 2, 'Press ENTER to Start', {
            fontSize: '30px',
            fill: '#ffffff'
        }).setOrigin(0.5);

        // Enterキーを待機
        this.input.keyboard.on('keydown-ENTER', () => {
            this.scene.start('QuizScene', { questionIndex: 0 }); // 最初の問題を渡す
        });
    }
}

// クイズ画面のシーン
class QuizScene extends Phaser.Scene {
    constructor() {
        super({ key: 'QuizScene' });
    }

    preload() {
        this.load.image('background', '/assets/background.png');
    }

    create(data) {
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);

        // 受け取ったデータから問題と解答を取得
        const questionIndex = data.questionIndex;
        const questionText = questionData[questionIndex].question;
        this.correctAnswer = questionData[questionIndex].answer;

        // 質問の表示
        this.questionLabel = this.add.text(100, 100, `問題: ${questionText}`, {
            fontSize: '30px',
            fill: '#ffffff'
        });

        // 回答欄の表示
        this.answerInput = this.add.text(100, 200, '答え: ', {
            fontSize: '24px',
            fill: '#ffcc00'
        });

        // ユーザー入力を保持する変数
        this.userAnswer = '';

        // キーボード入力処理
        this.input.keyboard.on('keydown', (event) => {
            if (event.key === 'Enter') {
                // Enterが押された時に回答をチェック
                this.checkAnswer();
            } else if (event.key === 'Backspace') {
                // Backspaceキーで最後の文字を削除
                this.userAnswer = this.userAnswer.slice(0, -1);
                this.updateAnswerDisplay();
            } else if (event.key.length === 1) {  
                // 1文字入力のみ受け付け、全角文字にも対応
                this.userAnswer += event.key;
                this.updateAnswerDisplay();
            }
        });

        // IMEによる入力を処理するため、inputイベントを使用
        this.input.on('textinput', (event) => {
            // イベントが発生したら入力された文字を追加
            this.userAnswer += event.text;
            this.updateAnswerDisplay();
        });
    }

    updateAnswerDisplay() {
        // ユーザーの入力した答えを表示
        this.answerInput.setText(`答え: ${this.userAnswer}`);
    }

    checkAnswer() {
        // 回答が正しいかどうかをチェック
        if (this.userAnswer === this.correctAnswer) {
            this.add.text(100, 300, '正解！', {
                fontSize: '24px',
                fill: '#00ff00'
            });
        } else {
            this.add.text(100, 300, '不正解...', {
                fontSize: '24px',
                fill: '#ff0000'
            });
        }

        // 次の問題に進むなど、追加の処理を行うこともできます。
    }
}

window.StartScene = StartScene;
window.QuizScene = QuizScene;
