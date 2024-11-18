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

        const startLabel = this.add.text(D_WIDTH / 2, D_HEIGHT / 2, 'Press ENTER to Start', {
            fontSize: '30px',
            fill: '#ffffff'
        }).setOrigin(0.5);

        // Enterキーを待機してクイズシーンへ
        this.input.keyboard.on('keydown-ENTER', () => {
            this.scene.start('QuizScene', { questionIndex: 0, totalQuestions: questionData.length, correctAnswers: 0 });
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

        this.questionIndex = data.questionIndex;
        this.totalQuestions = data.totalQuestions;
        this.correctAnswers = data.correctAnswers;

        // 現在の問題を取得
        this.questionText = questionData[this.questionIndex].question;
        this.correctAnswer = questionData[this.questionIndex].answer;

        // 質問の表示
        this.questionLabel = this.add.text(100, 100, `問題: ${this.questionText}`, {
            fontSize: '30px',
            fill: '#ffffff'
        });

        // 回答欄の表示
        this.answerInput = this.add.text(100, 200, '答え: ', {
            fontSize: '24px',
            fill: '#ffcc00'
        });

        this.userAnswer = '';

        // ユーザー入力の処理
        this.input.keyboard.on('keydown', (event) => {
            if (event.key === 'Enter') {
                this.checkAnswer();
            } else if (event.key === 'Backspace') {
                this.userAnswer = this.userAnswer.slice(0, -1);
                this.updateAnswerDisplay();
            } else if (event.key.length === 1) {
                this.userAnswer += event.key;
                this.updateAnswerDisplay();
            }
        });

        // タイマーの設定
        this.timerText = this.add.text(100, 50, '残り時間: 15秒', {
            fontSize: '24px',
            fill: '#ff0000'
        });
        this.timeLimit = 15;
        this.timerEvent = this.time.addEvent({
            delay: 1000,
            callback: this.updateTimer,
            callbackScope: this,
            repeat: this.timeLimit - 1
        });

        // 15秒後にタイムアウトとして処理
        this.time.delayedCall(15000, () => {
            this.checkAnswer(true);
        });
    }

    updateAnswerDisplay() {
        this.answerInput.setText(`答え: ${this.userAnswer}`);
    }

    updateTimer() {
        this.timeLimit--;
        this.timerText.setText(`残り時間: ${this.timeLimit}秒`);
    }

    checkAnswer(timeout = false) {
        let resultText = '';
        let color = '#ff0000';
    
        // タイマー停止
        
    
        // 正解の場合
        if (this.userAnswer === this.correctAnswer) {
            resultText = '正解！';
            color = '#00ff00';
            this.correctAnswers++;
            this.timerEvent.remove();
        }
        // 時間切れの場合
        else if (timeout) {
            resultText = '時間切れ！不正解';
        } 
        // 不正解の場合
        else {
            // 前回の解答を保持し、表示を更新
            this.answerresult = this.userAnswer;
    
            // 前回の解答をリセットして更新
            this.userAnswer = '';
            this.updateAnswerDisplay();
    
            // 以前の解答表示があれば更新、なければ新規作成
            if (this.lastAnswer) {
                this.lastAnswer.setText(`前回の解答: ${this.answerresult}`);
            } else {
                this.lastAnswer = this.add.text(100, 350, `前回の解答: ${this.answerresult}`, {
                    fontSize: '24px',
                    fill: color
                });
            }
            return; // 不正解の場合、ここで処理終了
        }
    
        // 正解または時間切れの場合、結果を表示して次へ
        this.resultLabel = this.add.text(100, 300, resultText, {
            fontSize: '24px',
            fill: color
        });
    
        // 2秒後に次のシーンへ遷移
        this.time.delayedCall(2000, () => {
            this.scene.start('AnswerResultScene', {
                correctAnswer: this.correctAnswer,
                questionIndex: this.questionIndex,
                totalQuestions: this.totalQuestions,
                correctAnswers: this.correctAnswers
            });
        });
    }
    
}

// 正誤結果を表示するシーン
class AnswerResultScene extends Phaser.Scene {
    constructor() {
        super({ key: 'AnswerResultScene' });
    }

    preload() {
        this.load.image('background', '/assets/background.png');
    }

    create(data) {
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);

        this.add.text(100, 250, `正しい答え: ${data.correctAnswer}`, {
            fontSize: '24px',
            fill: '#ffffff'
        });

        // 2秒後に次の問題に進むか終了
        this.time.delayedCall(2000, () => {
            if (data.questionIndex + 1 < data.totalQuestions) {
                this.scene.start('QuizScene', {
                    questionIndex: data.questionIndex + 1,
                    totalQuestions: data.totalQuestions,
                    correctAnswers: data.correctAnswers
                });
            } else {
                this.scene.start('EndScene', { correctAnswers: data.correctAnswers, totalQuestions: data.totalQuestions });
            }
        });
    }
}

// クイズ終了シーン
class EndScene extends Phaser.Scene {
    constructor() {
        super({ key: 'EndScene' });
    }

    preload() {
        this.load.image('background', '/assets/background.png');
    }

    create(data) {
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);

        this.add.text(100, 200, `クイズ終了！`, {
            fontSize: '30px',
            fill: '#00ff00'
        });

        this.add.text(100, 250, `正解数: ${data.correctAnswers} / ${data.totalQuestions}`, {
            fontSize: '24px',
            fill: '#ffffff'
        });

        this.add.text(100, 300, 'Press ENTER to Restart', {
            fontSize: '24px',
            fill: '#ffcc00'
        });

        // Enterキーで再スタート
        this.input.keyboard.on('keydown-ENTER', () => {
            this.scene.start('StartScene');
        });
    }
}

// ゲーム初期化
const config = {
    type: Phaser.AUTO,
    width: D_WIDTH,
    height: D_HEIGHT,
    scene: [StartScene, QuizScene, AnswerResultScene, EndScene]
};

const game = new Phaser.Game(config);
