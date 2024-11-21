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

        this.registry.set('timeLimit',timeLimitData);
        // Enterキーを待機してクイズシーンへ
        this.newScore = 0;
        this.registry.set('lastScore',this.newScore);
        this.registry.set('progressData', Array(6).fill(null));
        this.input.keyboard.on('keydown-ENTER', () => {
            this.scene.start('QuizScene', { 
                questionIndex: 0,//持ってきた問題
                totalQuestions: questionData.length,//全問題
                correctAnswers: 0,//正答数
                lives: 3, // 残機を初期化
                progress: 0,//現在の進行度
            });
        });
    }
}

class ProgressBar {
    constructor(scene, totalQuestions) {
        this.scene = scene;
        this.totalQuestions = totalQuestions;
        this.steps = [];
        this.backgrounds = [];

        // 全体背景を描画（角丸長方形）
        const totalWidth = totalQuestions * 50 + 100; // ステップ間隔 * 総ステップ数 + 余裕分
        const totalHeight = 40; // 背景の高さ
        const barX = 100 + totalWidth / 2 - 50; // 背景バーの中央X位置（余裕分を調整）
        const barY = 50; // 背景バーの中央Y位置
        const radius = 20; // 角丸の半径

        // 角丸背景の描画
        const graphics = this.scene.add.graphics();
        graphics.fillStyle(0xffffff, 1); // 白色
        graphics.fillRoundedRect(
            barX - totalWidth / 2, // 長方形の左上X座標
            barY - totalHeight / 2, // 長方形の左上Y座標
            totalWidth, // 長方形の幅（全体幅＋余裕分）
            totalHeight, // 長方形の高さ
            radius // 角丸の半径
        );

        // 各ステップを初期化
        for (let i = 0; i < this.totalQuestions; i++) {
            const x = 125 + i * 50; // ステップ間隔を調整（少し右寄りに）
            const y = 50;

            // 各ステップの個別背景を追加
            const stepBg = this.scene.add.rectangle(x, y, 40, 30, 0x000000); // 黒背景
            stepBg.setOrigin(0.5);
            this.backgrounds.push(stepBg);

            // 非アクティブ時のステップ番号をテキストで表示
            const stepText = this.scene.add.text(x, y, `${i + 1}`, {
                fontSize: '24px',
                fill: '#ffffff',
            }).setOrigin(0.5);

            this.steps.push({ text: stepText, active: false });
        }
    }

    update() {
        // 現在の進捗データを元に更新
        const progressData = this.scene.registry.get('progressData');
        for (let i = 0; i < this.steps.length; i++) {
            const step = this.steps[i];
            if (progressData[i] === true) {
                step.text.setText('✓'); // 正解時
                step.text.setStyle({ fill: '#00ff00' }); 
            } else if (progressData[i] === false) {
                step.text.setText('✗'); // 不正解時
                step.text.setStyle({ fill: '#ff0000' }); 
            } else {
                step.text.setText(`${i + 1}`); // 非アクティブ時
                step.text.setStyle({ fill: '#ffffff' });
            }
        }
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
        this.lives = data.lives;
        this.progress = data.progress;
        this.missCount = 0;
        this.score = 0;
        this.timeLimit = this.registry.get('timeLimit');
        this.progressBar = new ProgressBar(this, this.totalQuestions);
        this.progressBar.update(this.registry.get('progressData'));
        // 現在の問題を取得
        this.questionText = questionData[this.questionIndex].question;
        this.correctAnswer = questionData[this.questionIndex].answer;
        // 問題進行度の表示
        // this.progressText = this.add.text(0, 50, ` ${this.progress}`, {
        //     fontSize: '30px',
        //     fill: '#ffffff'
        // });
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

        // 最後の回答表示の初期化
        this.lastAnswer = this.add.text(100, 350, '', {
            fontSize: '24px',
            fill: '#ff0000'
        });

        this.livesText = this.add.text(100, 400, `残機: ${this.lives}`, { fontSize: '24px', fill: '#ff0000' });
        this.scoreText = this.add.text(600, 600, `スコア: ${this.registry.get('lastScore')}`, { fontSize: '24px', fill: '#ff0000' });

        // タイマーの設定
        this.timerText = this.add.text(100, 50, `残り時間: ${this.timeLimit} `, {
            fontSize: '24px',
            fill: '#ff0000'
        });
        this.time.delayedCall(1000, () => {
            this.startTime = this.time.now; 
            console.log('タイマー開始！');
        });
        console.log('計測開始: ', this.startTime);
        this.timerEvent = this.time.addEvent({
            delay: 1000,
            callback: this.updateTimer,
            callbackScope: this,
            repeat: this.timeLimit - 1
        });

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

        // 15秒後にタイムアウトとして処理
        this.time.delayedCall(this.timeLimit * 1000, () => {
            this.checkAnswer(true);
            this.input.keyboard.removeListener('keydown');
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
        let progressData = this.registry.get('progressData');
        // this.progressBar.updateProgress(this.progress);
        // 正解の場合
        if (this.userAnswer === this.correctAnswer) {
            resultText = '正解！';
            color = '#00ff00';
            this.correctAnswers++;
            progressData[this.questionIndex] = true; 
            const elapsedTime = (this.time.now - this.startTime) / 1000;
            console.log('経過時間: ' + elapsedTime + '秒');
            if (this.timerEvent) this.timerEvent.remove();
            // スコア計算
            this.score = Math.floor(200 - ((elapsedTime / this.timeLimit) * 100 + this.missCount * 10));
            this.score = this.score < 0 ? 0 : this.score;
            this.input.keyboard.removeListener('keydown');
        }
        // 時間切れの場合
        else if (timeout) {
            resultText = '時間切れ！不正解';
            this.lives--;
            progressData[this.questionIndex] = false; 
        }
        // 不正解の場合
        else {
            // 前回の解答を保持して表示
            this.answerresult = this.userAnswer;
            this.userAnswer = '';
            this.updateAnswerDisplay();
            this.missCount++;

            // 前回の解答を更新
            this.lastAnswer.setText(`前回の解答: ${this.answerresult}`);
            return; // 不正解の場合、ここで処理終了
        }
        this.livesText.setText(`残機: ${this.lives}`);

        
        // 正解または時間切れの場合、結果を表示して次へ
        this.resultLabel = this.add.text(100, 300, resultText, { fontSize: '24px', fill: color });
        this.progressBar.update(progressData);
        this.registry.set('progressData', progressData);
        // 2秒後に次のシーンへ遷移
        this.time.delayedCall(2000, () => {
            this.scene.start('AnswerResultScene', {
                correctAnswer: this.correctAnswer,
                questionIndex: this.questionIndex,
                totalQuestions: this.totalQuestions,
                correctAnswers: this.correctAnswers,
                lives: this.lives,
                progress: this.progress,
                missCount: this.missCount,
                score : this.score,
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
        this.lives = data.lives;
        this.progress = data.progress;
        this.missCount = data.missCount;
        this.score = data.score;
        this.progressBar = new ProgressBar(this, data.totalQuestions);
        this.progressBar.update(data.progress);
        this.registry.set('lastScore', this.registry.get('lastScore') + this.score);
        this.add.text(100, 250, `正しい答え: ${data.correctAnswer}`, {
            fontSize: '24px',
            fill: '#ffffff'
        });
        this.livesText = this.add.text(100, 400, `残機: ${this.lives}`, { fontSize: '24px', fill: '#ff0000' });
        this.progressText = this.add.text(400, 400, ` ${this.progress}`, { fontSize: '24px', fill: '#ff0000' });
        this.missText = this.add.text(600, 400, ` ${this.missCount}`, { fontSize: '24px', fill: '#ff0000' });
        this.scoreText = this.add.text(600, 600, `スコア: ${this.registry.get('lastScore')}`, { fontSize: '24px', fill: '#ff0000' });

        // 2秒後に次の問題に進むか終了
        this.time.delayedCall(2000, () => {
            if (this.lives != 0 === data.questionIndex + 1 < data.totalQuestions) {
                this.scene.start('QuizScene', {
                    questionIndex: data.questionIndex + 1,
                    totalQuestions: data.totalQuestions,
                    correctAnswers: data.correctAnswers,
                    lives: this.lives,
                    progress: this.progress + 1,
                });
            } else {
                this.scene.start('EndScene', { correctAnswers: data.correctAnswers, totalQuestions: data.totalQuestions,lives: this.lives });
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
        this.resultScore =  this.registry.get('lastScore') + data.lives * 100;

        this.add.text(600, 600, `最終スコア: ${this.resultScore}`, {
            fontSize: '24px',
            fill: '#ffffff'
        });
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