const fs = Request('fs');
class StartScene extends Phaser.Scene {
    constructor() {
        super({ key: 'StartScene' });
    }

    preload() {
        this.load.image('background', `assets/${modeData}/background${levelData}.png`);
    }
    create() {
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);
        const answerInputRectWidth = D_WIDTH;  // 幅を調整
        const answerInputRectHeight = 100; // 高さを調整
        const answerInputRectX = D_WIDTH / 2;
        const answerInputRectY = 800;
        console.log(questionData)
        // 背景矩形を追加（薄い黒）
        this.add.graphics()
            .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
            .fillRect(answerInputRectX - answerInputRectWidth / 2, answerInputRectY - answerInputRectHeight / 2, answerInputRectWidth, answerInputRectHeight);
        // 回答欄の表示
        this.answerInput = this.add.text(D_WIDTH / 2, 800, '回答欄：エンターを押してスタート', {
            fontSize: '50px',
            fill: '#ffffff',
            align: 'center'
        }).setOrigin(0.5).setPadding(6);

        this.registry.set('timeLimit',timeLimitData);
        this.registry.set('mode',modeData);
        this.registry.set('level',levelData);
        console.log(this.registry.get('mode'));
        console.log(this.registry.get('level'));
        
        this.newScore = 0;
        this.registry.set('lastScore',this.newScore);
        this.registry.set('progressData', Array(6).fill(null));
        this.registry.set('questionId',questionData.id);
        const id = questionData.map(obj => obj.id);
        this.registry.set('questionId',id);
        console.log(this.registry.get('questionId'))
        this.input.keyboard.on('keydown-ENTER', () => {
            this.scene.start('CharacterScene', { 
                questionIndex: 0,
                totalQuestions: questionData.length,
                correctAnswers: 0,
                lives: 3, 
                progress: 0,
            });
        });
    }
}


class CharacterScene extends Phaser.Scene {
    constructor() {
        super({ key: 'CharacterScene' });
    }
    preload(){
        this.textures.remove('character');

        this.load.image('background', `assets/${this.registry.get('mode')}/background${this.registry.get('level')}.png`);

        const characterIndex = this.progress <= 1 ? 1 : this.progress <= 3 ? 2 : 3;
        const characterPath = `assets/${this.registry.get('mode')}/character${this.registry.get('level')}.png`;
        console.log(characterPath);
        this.registry.set('characterPath', characterPath);
        this.load.image('character', characterPath);

    }
    create(data){
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);

        this.questionIndex= data.questionIndex;
        this.totalQuestions= data.totalQuestions;
        this.correctAnswers= data.correctAnswers;
        this.lives =data.lives;
        this.progress=data.progress;

        const character = this.add.image(-400, this.cameras.main.centerY , 'character');
        const originalWidth = character.width;
        const originalHeight = character.height;

        if (originalWidth <= 300 || originalHeight <= 300) {
            const scaleX = D_WIDTH *0.25 / originalWidth;
            const scaleY = D_WIDTH  *0.25 / originalHeight;
            const scale = Math.max(scaleX, scaleY); // 幅または高さに合わせて拡大
            character.setScale(scale);
        }
        const backgroundRectWidth = 850;  // 背景の幅を調整（テキストの幅に少し余裕を持たせる）
        const backgroundRectHeight = 400; // 背景の高さ
        const backgroundRectX = D_WIDTH / 2;
        const backgroundRectY = 400;

        this.add.graphics()
        .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
        .fillRect(backgroundRectX - backgroundRectWidth / 2, backgroundRectY - backgroundRectHeight / 2, backgroundRectWidth, backgroundRectHeight);
        this.questionText = this.add.text(-400, this.cameras.main.centerY, '', {
            fontSize: '60px',
            fill: '#ffffff',
            align: 'center', // テキストの中央揃え
            wordWrap: { width: 800, useAdvancedWrap: true }
        }).setOrigin(0.5).setPadding(16);

        this.questionText.setText(questionData[this.questionIndex].question);

        this.tweens.add({
            targets: character,
            x: this.cameras.main.centerX,
            duration: 1000,
            ease: 'Expo.In',
            onComplete: () => {
                this.tweens.add({
                    targets: this.questionText,
                    x: this.cameras.main.centerX,
                    y: this.cameras.main.centerY,
                    duration: 1000,
                    ease: 'Expo.In',
                    onComplete: () => {
                        this.time.delayedCall(1000, () => {
                        console.log("Starting QuizScene...");
                        this.scene.start('QuizScene', {
                            questionIndex: this.questionIndex,
                            totalQuestions: this.totalQuestions,
                            correctAnswers: this.correctAnswers,
                            lives: this.lives,
                            progress: this.progress,
                        });
                    });
                }
                });
            }
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
        const totalHeight = 60; // 背景の高さを増加
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
            totalHeight, // 長方形の高さ（60pxに増加）
            radius // 角丸の半径
        );

        // 各ステップを初期化
        for (let i = 0; i < this.totalQuestions; i++) {
            const x = 125 + i * 50; // ステップ間隔を調整（少し右寄りに）
            const y = 50;

            // 各ステップの個別背景を追加
            const stepBg = this.scene.add.rectangle(x, y, 40, 50, 0x000000); // 高さ50pxに調整
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
        console.log(progressData);
        for (let i = 0; i < this.steps.length; i++) {
            const step = this.steps[i];
            if (progressData[i] === true) {
                step.text.setText('✓'); // 正解時
                step.text.setStyle({ fill: '#00ff00' }); // 緑色
            } else if (progressData[i] === false) {
                step.text.setText('✗'); // 不正解時
                step.text.setStyle({ fill: '#ff0000' }); // 赤色
            } else {
                step.text.setText(`${i + 1}`); // 非アクティブ時
                step.text.setStyle({ fill: '#ffffff' }); // 白色
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
        this.load.image('background', `assets/${this.registry.get('mode')}/background${this.registry.get('level')}.png`);
        this.load.image('character', this.registry.get('characterPath'));  
        this.load.image('block', '/assets/block.png');
        this.load.image('attack', '/assets/attack.png');
    }

    create(data) {
        console.log(`after${this.registry.get('characterPath')}`);
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        this.qCharacter = this.add.image(this.cameras.main.centerX, this.cameras.main.centerY, 'character');
        const originalWidth = this.qCharacter.width;
        const originalHeight = this.qCharacter.height;
        if (originalWidth <= 300 || originalHeight <= 300) {
            const scaleX = D_WIDTH *0.25 / originalWidth;
            const scaleY = D_WIDTH  *0.25/ originalHeight;
            const scale = Math.max(scaleX, scaleY); // 幅または高さに合わせて拡大
            this.qCharacter.setScale(scale);
        }
        background.setDisplaySize(D_WIDTH, D_HEIGHT);
        console.log(data.progress);
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
        this.characterTween = this.tweens.add({
            targets: this.qCharacter,
            scale: this.qCharacter.scale * 2,  // 最大スケール
            duration: this.timeLimit * 1000, // 制限時間いっぱいで拡大
            ease: 'Linear',
        });


        // 現在の問題を取得
        this.questionText = questionData[this.questionIndex].question;
        this.correctAnswer = questionData[this.questionIndex].answer;
        // 質問の表示
        const backgroundRectWidth = 850;  // 背景の幅を調整（テキストの幅に少し余裕を持たせる）
        const backgroundRectHeight = 400; // 背景の高さ
        const backgroundRectX = D_WIDTH / 2;
        const backgroundRectY = 400;
        

    // 背景矩形を追加
    this.add.graphics()
        .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
        .fillRect(backgroundRectX - backgroundRectWidth / 2, backgroundRectY - backgroundRectHeight / 2, backgroundRectWidth, backgroundRectHeight);
        this.questionLabel = this.add.text(D_WIDTH / 2, 400, `${this.questionText}`, {
            fontSize: '60px',
            fill: '#ffffff',
            align: 'center', // テキストの中央揃え
            wordWrap: { width: 800, useAdvancedWrap: true }
        }).setOrigin(0.5).setPadding(6); // テキスト基準を中央に
        
        const answerInputRectWidth = D_WIDTH;  // 幅を調整
        const answerInputRectHeight = 100; // 高さを調整
        const answerInputRectX = D_WIDTH / 2;
        const answerInputRectY = 800;
    
        // 背景矩形を追加（薄い黒）
        this.add.graphics()
            .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
            .fillRect(answerInputRectX - answerInputRectWidth / 2, answerInputRectY - answerInputRectHeight / 2, answerInputRectWidth, answerInputRectHeight);
        // 回答欄の表示
        this.answerInput = this.add.text(D_WIDTH / 2, 800, '', {
            fontSize: '50px',
            fill: '#ffcc00',
            align: 'center'
        }).setOrigin(0.5).setPadding(6);

        this.userAnswer = '';

        // 最後の回答表示の初期化
        this.lastAnswer = this.add.text(750, 700, '', {
            fontSize: '40px',
            fill: '#ff0000'
        }).setPadding(6);

        this.livesText = this.add.text(1600, 140, `残機:✖ ${this.lives}`, { fontSize: '45px', fill: '#ffffff' }).setPadding(8);
        this.scoreText = this.add.text(100, 100, `スコア: ${this.registry.get('lastScore')}`, { fontSize: '45px', fill: '#ffffff' }).setPadding(6);

        // タイマーの設定
        this.timerText = this.add.text(880, 100, `${this.timeLimit} `, {
            fontSize: '40px',
            fill: '#ff0000'
        }).setPadding(6);
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

        this.blinkingRect = this.add.graphics();
        this.blinkingRect.fillStyle(0xff0000, 0.5);
        this.blinkingRect.fillRect(0, 0, D_WIDTH, D_HEIGHT);
        this.blinkingRect.setAlpha(0); 

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

        this.cursor = this.add.text(D_WIDTH / 2 , 800, '|', {
            fontSize: '50px',
            fill: '#ffcc00', // カーソルの色
            align: 'center'
        }).setOrigin(0.5);

        this.cursorBlinkTimer = this.time.addEvent({
            delay: 500, // 500msごとに点滅
            callback: () => {
                // 入力が空の場合にカーソルの表示状態を切り替え
                if (this.userAnswer === '') {
                    this.cursor.setVisible(!this.cursor.visible);
                } else {
                    this.cursor.setVisible(false); // 入力があるときはカーソルを非表示
                }
            },
            loop: true
        });
        
    }

    updateAnswerDisplay() {
        this.answerInput.setText(`${this.userAnswer}`);
    }

    updateTimer() {
        this.timeLimit--;
        this.timerText.setText(`${this.timeLimit}`);
        this.blinking = false; 
        // timeLimit が 5 以下になったら背景を赤く滑らかに点滅させる
        if (this.timeLimit <= 5 && !this.blinking) {
            this.blinking = true; // 点滅中フラグ

            // 透明度を変更するtweenを設定
            this.tweens.add({
                targets: this.blinkingRect,
                alpha: 0.5, // 最大透明度
                duration: 500, // 500msごとに
                yoyo: true,  // 往復させて点滅を作成
                repeat: -1,  // 無限ループ
                ease: 'Sine.easeInOut' // なめらかな変化
            });
        }

        // timeLimit が 0 以下になったら点滅を完全に止める
        if (this.timeLimit <= 0) {
            // 点滅を停止
            this.tweens.killTweensOf(this.blinkingRect); // 点滅用のtweenを停止
            this.blinkingRect.setAlpha(0); // 透明に戻す
        }
    }

    checkAnswer(timeout = false) {
        let resultText = '';
        let color = '#ff0000';
        let progressData = this.registry.get('progressData');
        // this.progressBar.updateProgress(this.progress);
        // 正解の場合
        if (this.userAnswer === this.correctAnswer) {
            const attack = this.add.image(this.cameras.main.centerX, 350, 'attack');
            this.time.delayedCall(2000, () => {
                attack.destroy(); // 画像を削除
            });
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

            this.stopBlinking = true;  // 正解時に点滅を停止

        if (this.characterTween) {
            this.characterTween.stop(); // 拡大アニメーションを停止
        }

        const keepAnswer =  this.progress;

        }
        // 時間切れの場合
        else if (timeout) {
            resultText = '時間切れ！不正解';
            this.lives--;
            progressData[this.questionIndex] = false;

            const explosion = this.add.sprite(this.cameras.main.centerX, this.cameras.main.centerY, 'attack').setScale(1.5);
            explosion.play('explode'); // 'explode' アニメーションを再生する場合

        // 1秒後に爆発を削除
            this.time.delayedCall(1000, () => {
            explosion.destroy();
        });

        // 画面揺れを追加
        this.cameras.main.shake(500, 0.05); // 500ms間、揺れ幅0.05で揺れる

        // 1秒後に揺れを止める
        this.time.delayedCall(1000, () => {
            this.cameras.main.resetFX();
        });
        }
        // 不正解の場合
        else {
            // 前回の解答を保持して表示
            const block = this.add.image(this.cameras.main.centerX, 500, 'block').setScale(0.3);
            this.time.delayedCall(1000, () => {
                block.destroy(); // 画像を削除
            });
            this.answerresult = this.userAnswer;
            this.userAnswer = '';
            this.updateAnswerDisplay();
            this.missCount++;

            // 前回の解答を更新
            this.lastAnswer.setText(`前回の解答: ${this.answerresult}`);
            return; // 不正解の場合、ここで処理終了
        }
        this.livesText.setText(`残機: ${this.lives}`).setPadding(6);

        
        // 正解または時間切れの場合、結果を表示して次へ
        this.resultLabel = this.add.text(870, 150, resultText, { fontSize: '24px', fill: color });
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
        this.load.image('background', `assets/${this.registry.get('mode')}/background${this.registry.get('level')}.png`);

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
        const backgroundRectWidth = D_WIDTH;  // 背景の幅を調整（テキストの幅に少し余裕を持たせる）
        const backgroundRectHeight = 400; // 背景の高さ
        const backgroundRectX = D_WIDTH / 2;
        const backgroundRectY = 400;

    // 背景矩形を追加
    this.add.graphics()
        .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
        .fillRect(backgroundRectX - backgroundRectWidth / 2, backgroundRectY - backgroundRectHeight / 2, backgroundRectWidth, backgroundRectHeight);
        this.answerLabel = this.add.text(D_WIDTH / 2, 400, `正答 \n ${data.correctAnswer}`, {
            fontSize: '60px',
            fill: '#ffffff',
            align: 'center', 
            wordWrap: { width: 800, useAdvancedWrap: true }
        }).setOrigin(0.5).setPadding(6);
        this.livesText = this.add.text(1600, 140,`残機✖ ${this.lives}`, { fontSize: '45px', fill: '#ffffff' }).setPadding(6);
        this.scoreText = this.add.text(100, 100, `スコア: ${this.registry.get('lastScore')}`, { fontSize: '45px', fill: '#ffffff' }).setPadding(6);
        this.scoreresultText = this.add.text(100, 150, `+${this.score}`, { fontSize: '45px', fill: '#ff0000' }).setPadding(6);
        // 2秒後に次の問題に進むか終了
        this.time.delayedCall(2000, () => {
            if (this.lives != 0 === data.questionIndex + 1 < data.totalQuestions) {
                this.scene.start('CharacterScene', {
                    questionIndex: data.questionIndex + 1,
                    totalQuestions: data.totalQuestions,
                    correctAnswers: data.correctAnswers,
                    lives: this.lives,
                    progress: this.progress + 1,
                });
            } else {
                this.resultScore =  this.registry.get('lastScore') + data.lives * 100;
                fetch('/game_result', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        correctAnswers: data.correctAnswers,
                        totalQuestions: data.totalQuestions,
                        resultScore: this.resultScore,
                        answerArray: this.registry.get('progressData'),
                        idArry : this.registry.get('questionId'),
                    }),
                })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then((result) => {
                        console.log(result);
                        if(result.success){
                            console.log("成功");
                            console.log(result);
                            window.location.href = "/game_result_show";
                        }else{
                            console.log('失敗');
                        }
                    })
                
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
window.CharacterScene = CharacterScene;