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
            this.scene.start('QuizScene', { questionIndex: 0, totalQuestions: questionData.length, correctAnswers: 0 }); // 最初の問題を渡す
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

        // 現在の問題の情報を取得
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

        // ユーザーの入力を処理
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

        this.input.on('textinput', (event) => {
            this.userAnswer += event.text;
            this.updateAnswerDisplay();
        });
    }

    updateAnswerDisplay() {
        this.answerInput.setText(`答え: ${this.userAnswer}`);
    }

    checkAnswer() {
        let resultText = '';
        let color = '#ff0000';

        if (this.userAnswer === this.correctAnswer) {
            resultText = '正解！';
            color = '#00ff00';
            this.correctAnswers++;
        } else {
            resultText = `不正解... 正しい答えは: ${this.correctAnswer}`;
        }

        // 結果の表示
        this.resultLabel = this.add.text(100, 300, resultText, {
            fontSize: '24px',
            fill: color
        });

        // 2秒後に次の問題へ進む
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

        this.input.keyboard.on('keydown-ENTER', () => {
            this.scene.start('StartScene');
        });
    }
}

window.StartScene = StartScene;
window.QuizScene = QuizScene;
window.AnswerResultScene = AnswerResultScene;
window.EndScene = EndScene;
