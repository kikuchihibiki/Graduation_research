class StartScene extends Phaser.Scene {
    constructor() {
        super({ key: 'StartScene' });
    }

    preload() {
        this.load.image('background', `assets/${modeData}/background${levelData}.png`);
        this.load.audio('bgm','/assets/audio/game.mp3')
        this.load.audio('enter','/assets/audio/enter.mp3')
    }
    create() {
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);
        const answerInputRectWidth = D_WIDTH;  // 幅を調整
        const answerInputRectHeight = D_HEIGHT/1.25; // 高さを調整

        if (!this.sound.get('bgm')) {
            const music = this.sound.add('bgm', { loop: true });
            music.play();
        }
        // 背景矩形を追加（薄い黒）
        this.add.graphics()
            .fillStyle(0x000000, 0.7) // 色: 黒、透明度: 0.5
            .fillRect(0,answerInputRectHeight,answerInputRectWidth,95);
        // 回答欄の表示
        this.answerInput = this.add.text(D_WIDTH/2, D_HEIGHT/1.15, '回答欄：エンターを押してスタート', {
            fontSize: '48px',
            fill: '#ffffff',
            align: 'center',
            fontFamily: 'k8x12L',
        }).setOrigin(0.5).setPadding(6);

        this.registry.set('timeLimit',timeLimitData);
        this.registry.set('mode',modeData);
        this.registry.set('questionData',questionData);
        this.registry.set('level',levelData);
        this.registry.set('clearFlag',true);
        
        this.newScore = 0;
        this.newmissCount = 0;
        this.registry.set('lastScore',this.newScore);
        this.registry.set('newmissCount',this.newmissCount);
        this.registry.set('progressData', Array(6).fill(null));
        this.registry.set('questionId',questionData.id);
        const id = questionData.map(obj => obj.id);
        this.registry.set('questionId',id);
        this.input.keyboard.on('keydown-ENTER', () => {
            const enterSound = this.sound.add('enter'); // 効果音のオーディオをロード済みと仮定
            enterSound.play({
                volume: 1.5,
            });
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
            const scaleX = D_WIDTH *0.3/ originalWidth;
            const scaleY = D_WIDTH  *0.3 / originalHeight;
            const scale = Math.max(scaleX, scaleY); // 幅または高さに合わせて拡大
            character.setScale(scale);
        }
        const backgroundRectWidth = D_WIDTH / 2;  // 背景の幅を調整（テキストの幅に少し余裕を持たせる）
        const backgroundRectHeight = D_HEIGHT /2; 
        const backgroundRectX = D_WIDTH / 2;
        const backgroundRectY = D_HEIGHT / 4;

        this.add.graphics()
        .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
        .fillRect(backgroundRectX - backgroundRectWidth / 2, backgroundRectY, backgroundRectWidth, backgroundRectHeight);
        this.questionText = this.add.text(-400, this.cameras.main.centerY+50, '', {
            fontSize: '43px',
            fill: '#ffffff',
            align: 'center', // テキストの中央揃え
            fontFamily: 'k8x12L',
            wordWrap: { width: 600, useAdvancedWrap: true }
        }).setOrigin(0.5).setPadding(16);
        const formattedQuestionText = questionData[this.questionIndex].question.includes('〇')
    ? questionData[this.questionIndex].question.replace(/〇+/g, match => `\n${match}`) // 連続する「〇」を改行後にまとめて表示
    : questionData[this.questionIndex].question; 
        this.questionText.setText(formattedQuestionText);

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
        const totalWidth = totalQuestions * 50 +40 ; // ステップ間隔 * 総ステップ数 + 余裕分
        const totalHeight = 50; // 背景の高さを増加
        const barX = 125+totalWidth / 2 - 50; // 背景バーの中央X位置（余裕分を調整）
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
            const stepBg = this.scene.add.rectangle(x, y, 40, 40, 0x000000); // 高さ50pxに調整
            stepBg.setOrigin(0.5);
            this.backgrounds.push(stepBg);

            // 非アクティブ時のステップ番号をテキストで表示
            const stepText = this.scene.add.text(x, y, `${i + 1}`, {
                fontSize: '24px',
                fill: '#ffffff',
                fontFamily: 'k8x12L',
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
        this.limitSound = null;
    }

    preload() {
        this.load.image('background', `assets/${this.registry.get('mode')}/background${this.registry.get('level')}.png`);
        this.load.image('character', this.registry.get('characterPath'));  
        this.load.image('block', '/assets/block.png');
        this.load.image('attack', '/assets/attack.png');
        this.load.image('kogeki', '/assets/kogeki.png');
        this.load.image('live', '/assets/live.png');
        this.load.audio('type','/assets/audio/type.mp3')
        this.load.audio('limit','/assets/audio/limit.mp3')
        this.load.audio('attackSE','/assets/audio/attack.mp3')
        this.load.audio('missSE','/assets/audio/miss0.mp3')
        this.load.audio('hakaiSE','/assets/audio/hakai.mp3')
        this.load.audio('bsSE','/assets/audio/bs.mp3')
    }

    create(data) {
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);

        this.qCharacter = this.add.image(this.cameras.main.centerX, this.cameras.main.centerY, 'character');
        const originalWidth = this.qCharacter.width;
        const originalHeight = this.qCharacter.height;

        if (originalWidth <= 300 || originalHeight <= 300) {
            const scaleX = D_WIDTH *0.3 / originalWidth;
            const scaleY = D_WIDTH  *0.3/ originalHeight;
            const scale = Math.max(scaleX, scaleY); // 幅または高さに合わせて拡大
            this.qCharacter.setScale(scale);
        }
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
        const backgroundRectWidth = D_WIDTH / 2;  // 背景の幅を調整（テキストの幅に少し余裕を持たせる）
        const backgroundRectHeight = D_HEIGHT /2; // 背景の高さ
        const backgroundRectX = D_WIDTH / 2;
        const backgroundRectY = D_HEIGHT / 4;
        const formattedQuestionText = this.questionText.includes('〇')
    ? this.questionText.replace(/〇+/g, match => `\n${match}`) // 連続する「〇」を改行後にまとめて表示
    : this.questionText; 

    // 背景矩形を追加
    this.add.graphics()
        .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
        .fillRect(backgroundRectX - backgroundRectWidth / 2, backgroundRectY, backgroundRectWidth, backgroundRectHeight);
        this.questionLabel = this.add.text(D_WIDTH / 2, this.cameras.main.centerY, `${formattedQuestionText}`, {
            fontSize: '43px',
            fill: '#ffffff',
            align: 'center', // テキストの中央揃え
            fontFamily: 'k8x12L',
            wordWrap: { width: 600, useAdvancedWrap: true }
        }).setOrigin(0.5).setPadding(16); // テキスト基準を中央に
        
        const answerInputRectWidth = D_WIDTH;  // 幅を調整
        const answerInputRectHeight = D_HEIGHT/1.25; // 高さを調整
    
        // 背景矩形を追加（薄い黒）
        this.add.graphics()
            .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
            .fillRect(0,answerInputRectHeight,answerInputRectWidth,95);
        // 回答欄の表示
        this.answerInput = this.add.text(D_WIDTH / 2,  D_HEIGHT/1.15, '', {
            fontSize: '48px',
            fill: '#ffcc00',
            align: 'center',
            fontFamily: 'k8x12L',
        }).setOrigin(0.5).setPadding(6);

        this.userAnswer = '';

        // 最後の回答表示の初期化
        this.lastAnswer = this.add.text(this.cameras.main.centerX-130,this.cameras.main.centerY+140, '', {
            fontSize: '38px',
            fill: '#ff0000',
            fontFamily: 'k8x12L',
        }).setPadding(6);
        // コンテナを作成
        const livesContainer = this.add.container(0, 0);

// 背景を作成
        const liveBg = this.add.graphics();
        liveBg.fillStyle(0x000000, 0.8);
        this.liveLabel = this.add.image(1100, 125, 'live').setScale(0.2);
        // テキストを作成
        this.livesText = this.add.text(1120, 100, `x${this.lives}`, { 
            fontSize: '33px', 
            fill: '#ffffff' ,
            fontFamily: 'k8x12L',
        }).setPadding(8);

        // テキストの幅と高さを取得
        const textWidth = this.livesText.width;
        const textHeight = this.livesText.height;
        

        // 背景をテキストの背面に描画
        liveBg.fillRect(1080 - 8, 100 - 8, textWidth + 48, textHeight + 16);

        // 背景とテキストをコンテナに追加
        // livesContainer.add([liveBg, this.livesText,this.liveLabel]);
        const scoreBg = this.add.graphics();
        scoreBg.fillStyle(0x000000, 0.8);
        
        // スコアのテキストを作成
        this.scoreText = this.add.text(80, 100, `スコア: ${this.registry.get('lastScore')}`, { 
            fontSize: '33px', 
            fill: '#ffffff', 
            fontFamily: 'k8x12L' 
        }).setPadding(6);
        
        // スコアテキストの幅と高さを取得
        const scoretextWidth = this.scoreText.width;
        const scoretextHeight = this.scoreText.height; // 修正したプロパティ名
        
        // スコアテキストに合わせて背景を作成（パディングあり）
        scoreBg.fillRect(80 - 8, 100 - 8, scoretextWidth + 30, scoretextHeight + 16);
        
        // タイマーの設定
        this.timerText = this.add.text(D_WIDTH/2-20, 40, ``, {
            fontSize: '53px',
            fill: '#ff0000',
            fontFamily: 'k8x12L',
        }).setPadding(6);

        this.countdownText = this.add.text(D_WIDTH/2-20, 40, '', {
            fontSize: '53px',
            fill: '#ff0000',
            fontFamily: 'k8x12L',
        }).setOrigin(0.5).setAlpha(0);
        this.time.delayedCall(500, () => {
            this.startTime = this.time.now; 
        });
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
            const typeSound = this.sound.add('type'); // 効果音のオーディオをロード済みと仮定
            const bsSound = this.sound.add('bsSE'); // 効果音のオーディオをロード済みと仮定
            if (event.key === 'Enter') {
                this.checkAnswer(); // Enterキーの処理
            } else if (event.key === 'Backspace') {
                this.userAnswer = this.userAnswer.slice(0, -1);
                this.updateAnswerDisplay(); // バックスペース処理
                // バックスペース効果音を再生
                bsSound.play({
                    volume: 2,
                });
            } else if (event.key.length === 1) {
                this.userAnswer += event.key;
                this.updateAnswerDisplay(); // 文字入力処理
                // タイピング効果音を再生
                typeSound.play({
                    volume: 1.5,
                });
            }
        });
        

        // 15秒後にタイムアウトとして処理
        this.time.delayedCall(this.timeLimit * 1000, () => {
            this.checkAnswer(true);
            this.input.keyboard.removeListener('keydown');
        });

        this.cursor = this.add.text(D_WIDTH / 2,  D_HEIGHT/1.15, '|', {
            fontSize: '53px',
            fill: '#ffcc00', // カーソルの色
            align: 'center',
            fontFamily: 'k8x12L',
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
        this.answerInput.setText(`${this.userAnswer}`,{fontFamily: 'k8x12L'});
    }

    updateTimer() {
        this.timeLimit--;
        this.blinking = false;
        // timeLimitが5以下の場合はカウントダウンテキストを表示
        if (this.timeLimit <= 5) {
            this.timerText.setText(`${this.timeLimit}`);
            if (!this.limitSound) {
                this.limitSound = this.sound.add('limit'); // 効果音をロード
            }

            if (!this.limitSound.isPlaying) {
                this.limitSound.play({
                    volume: 0.8,
                }); // 効果音を再生
            }
            // カウントダウンテキストがまだ表示されていない場合、フェードインする
            if (this.countdownText.alpha === 0) {
                this.tweens.add({
                    targets: this.countdownText,
                    alpha: 1, // カウントダウンテキストを表示
                    duration: 500, // 500msかけてフェードイン
                    ease: 'Sine.easeInOut'
                });
            }
            this.tweens.add({
                targets: this.timerText,
                scaleX: 2, // 横方向に1.5倍
                scaleY: 2, // 縦方向に1.5倍
                duration: 300, // 拡大する時間 (200ms)
                yoyo: true,    // 元に戻す (縮小)
                ease: 'Sine.easeInOut' // なめらかな変化
            });
            // timeLimitが5以下になったら背景を赤く滑らかに点滅させる
            if (!this.blinking) {
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
        }
    
        // 時間が0以下になるとカウントダウンテキストを非表示に
        if (this.timeLimit <= 0) {
            // カウントダウンテキストをフェードアウト
            this.tweens.add({
                targets: this.countdownText,
                alpha: 0, // フェードアウト
                duration: 500
            });
            // 点滅を停止
            if(this.stopBlinking) {
            this.tweens.killTweensOf(this.blinkingRect); // 点滅用のtweenを停止
            this.blinkingRect.setAlpha(0); // 透明に戻す
            }
        }
    }
    
    
    checkAnswer(timeout = false) {
        let resultText = '';
        let color = '#ff0000';
        let progressData = this.registry.get('progressData');
        // this.progressBar.updateProgress(this.progress);
        // 正解の場合
        if (this.userAnswer.toLowerCase() === this.correctAnswer.toLowerCase()) {
            const kogeki = this.add.image(D_WIDTH/2-100, 350, 'kogeki');
            this.time.delayedCall(2000, () => {
                kogeki.destroy(); // 画像を削除
            });
            const attackSE = this.sound.add('attackSE');
            attackSE.play({
                volume: 4.0,
            });
            if (this.limitSound) {
                this.limitSound.stop(); // 効果音を停止
                this.limitSound.destroy(); // インスタンスを破棄
                this.limitSound = null; // 再利用のためにリセット
            }
            resultText = '';
            color = '#00ff00';
            this.correctAnswers++;
            progressData[this.questionIndex] = true; 
            const elapsedTime = (this.time.now - this.startTime) / 1000;
            if (this.timerEvent) this.timerEvent.remove();
            const timePenalty = (elapsedTime / this.registry.get('timeLimit')) * 100;
            const missPenalty = this.missCount * 10;
            // スコア計算
            this.score = Math.floor(200 - (timePenalty - missPenalty));
            this.score = this.score < 0 ? 0 : this.score;
            this.input.keyboard.removeListener('keydown');

            this.stopBlinking = true;  // 正解時に点滅を停止

        if (this.characterTween) {
            this.characterTween.stop(); // 拡大アニメーションを停止
        }


        }
        // 時間切れの場合
        else if (timeout) {
            if (this.limitSound) {
                this.limitSound.stop(); // 効果音を停止
                this.limitSound.destroy(); // インスタンスを破棄
                this.limitSound = null; // 再利用のためにリセット
            }
            const hakaiSE = this.sound.add('hakaiSE');
            hakaiSE.play({
                volume: 2.0,
            });
            resultText = '';
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
            const missSE = this.sound.add('missSE');
            missSE.play({
                volume: 4.0,
            });
            const block = this.add.image(this.cameras.main.centerX, this.cameras.main.centerY, 'block').setScale(0.3);
            this.time.delayedCall(1000, () => {
                block.destroy(); // 画像を削除
            });
            this.answerresult = this.userAnswer;
            this.userAnswer = '';
            this.updateAnswerDisplay();
            this.missCount++;
            this.registry.set('newmissCount', this.registry.get('newmissCount') +1);

            // 前回の解答を更新
            this.lastAnswer.setText(`前回の解答: ${this.answerresult}`,{fontFamily: 'k8x12L',});
            return; // 不正解の場合、ここで処理終了
        }
        this.livesText.setText(`x${this.lives}`,{fontFamily: 'k8x12L',}).setPadding(6);

        
        // 正解または時間切れの場合、結果を表示して次へ
        this.resultLabel = this.add.text(this.cameras.main.centerX-30,50 , resultText, { fontSize: '27px', fill: color ,fontFamily: 'k8x12L',});
        this.progressBar.update(progressData);
        this.registry.set('progressData', progressData);
        // 2秒後に次のシーンへ遷移
        this.time.delayedCall(1000, () => {
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

        if(this.lives === 0){
            this.registry.set('clearFlag',false);
        };
        
        this.registry.set('lastScore', this.registry.get('lastScore') + this.score);

        const backgroundRectWidth = D_WIDTH ;  // 背景の幅を調整（テキストの幅に少し余裕を持たせる）
        const backgroundRectHeight = D_HEIGHT /2; 
        const backgroundRectX = D_WIDTH / 2;
        const backgroundRectY = D_HEIGHT / 4;

    // 背景矩形を追加
    this.add.graphics()
        .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
        .fillRect(0, backgroundRectY, backgroundRectWidth, backgroundRectHeight);
        this.answerLabel = this.add.text(D_WIDTH / 2, this.cameras.main.centerY, `正答 \n ${data.correctAnswer}`, {
            fontSize: '45px',
            fill: '#ffffff',
            align: 'center', 
            fontFamily: 'k8x12L',
            wordWrap: { width: 800, useAdvancedWrap: true }
        }).setOrigin(0.5).setPadding(6);

        const liveBg = this.add.graphics();
        liveBg.fillStyle(0x000000, 0.8);
        this.liveLabel = this.add.image(1100, 125, 'live').setScale(0.2);
        // テキストを作成
        this.livesText = this.add.text(1120, 100, `x${this.lives}`, { 
            fontSize: '33px', 
            fill: '#ffffff' ,
            fontFamily: 'k8x12L',
        }).setPadding(8);

        // テキストの幅と高さを取得
        const textWidth = this.livesText.width;
        const textHeight = this.livesText.height;
        

        // 背景をテキストの背面に描画
        liveBg.fillRect(1080 - 8, 100 - 8, textWidth + 48, textHeight + 16);
        const scoreBg = this.add.graphics();
        scoreBg.fillStyle(0x000000, 0.8);
        
        // スコアのテキストを作成
        this.scoreText = this.add.text(80, 100, `スコア: ${this.registry.get('lastScore')}`, { 
            fontSize: '33px', 
            fill: '#ffffff', 
            fontFamily: 'k8x12L' 
        }).setPadding(6);
        
        // スコアテキストの幅と高さを取得
        const scoretextWidth = this.scoreText.width;
        const scoretextHeight = this.scoreText.height; // 修正したプロパティ名
        
        // スコアテキストに合わせて背景を作成（パディングあり）
        scoreBg.fillRect(80 - 8, 100 - 8, scoretextWidth + 30, scoretextHeight + 16);
        
        this.scoreresultText = this.add.text(80, 130., `+${this.score}`, { fontSize: '33px', fill: '#ff0000' ,fontFamily: 'k8x12L',}).setPadding(6);
        // 2秒後に次の問題に進むか終了
        this.time.delayedCall(3000, () => {
            if (this.lives !== 0 && (data.questionIndex + 1 < data.totalQuestions || this.lives === 0)) {
                this.scene.start('CharacterScene', {
                    questionIndex: data.questionIndex + 1,
                    totalQuestions: data.totalQuestions,
                    correctAnswers: data.correctAnswers,
                    lives: this.lives,
                    progress: this.progress + 1,
                });
            } else {
                this.resultScore =  this.registry.get('lastScore') + data.lives * 100;
                this.scene.start('EndScene',{
                    correctAnswers: data.correctAnswers,
                        totalQuestions: data.totalQuestions,
                        resultScore: this.resultScore,
                        answerArray: this.registry.get('progressData'),
                        idArry : this.registry.get('questionId'),
                });
                
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
        this.load.image('background', `assets/${this.registry.get('mode')}/background${this.registry.get('level')}.png`);
        this.load.audio('game_clear','/assets/audio/game_clear.mp3')
        this.load.audio('game_over','/assets/audio/game_over.mp3')
    }

    create(data) {
        if (this.sound.get('bgm')) {
            this.sound.stopByKey('bgm');
        }
        
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);
        this.clearFlag = this.registry.get('clearFlag');
        const game_clear = this.sound.add('game_clear', { loop: true });
        const game_over = this.sound.add('game_over', { loop: true });
        if (this.clearFlag) {
        // BGMが流れていなければ再生
            game_clear.play();
            this.cameras.main.fadeIn(1000, 0, 0, 0, () => {
                this.cameras.main.setBackgroundColor('#000000');
        
                const clearText = this.add.text(
                    this.cameras.main.centerX,
                    this.cameras.main.centerY,
                    'GAME CLEAR',
                    { fontSize: '120px', color: '#ffffff',fontFamily: 'k8x12L', }
                );

                const operatingText = this.add.text(
                    D_WIDTH / 2,
                    520,
                    '---PRESS ENTER---',
                    { fontSize: '80px', color: '#ffffff' ,fontFamily: 'k8x12L',}
                );
        
                clearText.setOrigin(0.5).setPadding(6);
                operatingText.setOrigin(0.5).setPadding(6).centerX;
        
                this.tweens.add({
                    targets: clearText,
                    scale: { from: 0.6, to: 1.2 },
                    duration: 1000,
                    ease: 'Sine.easeIn',
                });
    
                for(let i = 0; i< 10 ; i++){
                    const circle = this.add.circle(
                        this.cameras.main.centerX,
                        this.cameras.main.centerY,
                        10,
                        Phaser.Display.Color.RandomRGB().color
                    );
    
                    this.tweens.add({
                        targets: circle,
                        x: this.cameras.main.centerX + Phaser.Math.Between(-200, 200),
                        y: this.cameras.main.centerY + Phaser.Math.Between(-200, 200),
                        scale: { from: 1, to: 0 },
                        duration: 1500,
                        ease: 'Sine.easeOut',
                        onComplete: () => circle.destroy()
                    })
                }
            });

        } else {
            game_over.play();
            this.cameras.main.fadeIn(1000, 255, 255, 255);

        // ゲームオーバーテキストを追加
        const gameOverText = this.add.text(
            this.cameras.main.centerX,
            this.cameras.main.centerY,
            'GAME OVER',
            { fontSize: '120px', color: '#ffffff', fontStyle: 'bold',fontFamily: 'k8x12L', }
        ).setOrigin(0.5).setAlpha(0); // 初期状態では透明

        const operatingText = this.add.text(
            D_WIDTH / 2,
            520,
            '---PRESS ENTER---',
            { fontSize: '80px', color: '#ffffff',fontFamily: 'k8x12L', }
        ).setOrigin(0.5).setAlpha(0);

        operatingText.setOrigin(0.5).setPadding(6).centerX;
        // テキストフェードインアニメーション
        this.tweens.add({
            targets: gameOverText,
            alpha: 1, // 不透明にする
            duration: 2000, // 2秒かけてフェードイン
            ease: 'Quad.easeInOut',
        });

        this.tweens.add({
            targets: operatingText,
            alpha: 1,
            duration: 2000,
            ease: 'Quad.easeInOut',
        })
        }
        
        
        

        this.input.keyboard.on('keydown-ENTER', () => {
            fetch('/game_result', {
                method: 'POST',
                headers:{
                    'Content-Type' : 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    correctAnswers : data.correctAnswers,
                    totalQuestions : data.totalQuestions,
                    resultScore : data.resultScore,
                    answerArray : this.registry.get('progressData'),
                    idArry : this.registry.get('questionId'),
                    questionArray : this.registry.get('questionData'),
                    mode: this.registry.get('mode'),
                    level: this.registry.get('level'),
                    clearFlag: this.clearFlag,
                    missCount: this.registry.get('newmissCount'),
                }),
            })
            .then(response => response.json())
            .then(data => {
                if(data.clearFlag){
                    // 受け取ったデータから newScore を取り出す
                const newScore = data.newScore;
                // ローカルストレージに保存されているスコアデータを取得
                let savedScores = JSON.parse(localStorage.getItem('quizScores')) || [];
                // newScoreをフラットな形式で保存
                savedScores.push({
                    l: newScore.l,  // レベル
                    m: newScore.m,  // モード
                    s: newScore.s,  // スコア
                    d: newScore.d   // 日付
                });
                // ローカルストレージに再保存
                localStorage.setItem('quizScores', JSON.stringify(savedScores));
                }

                const idJson = data.idJson;
                let progress_data = JSON.parse(localStorage.getItem('user_data')) || {};

                // idJsonをループして、正解数と誤答数をカウント
                idJson.forEach(idJsons => {
                    const questionId = idJsons.id;
                    const isCorrect = idJsons.answer;
                
                    if (isCorrect === null) {
                        return; // 解答がnullの場合はスキップ
                    }
                
                    if (!progress_data[questionId]) {
                        progress_data[questionId] = { '正解数': 0, '誤答数': 0 }; // 初めての質問IDの場合は初期化
                    }
                
                    if (isCorrect === true) {
                        progress_data[questionId]['正解数']++; // 正解数をインクリメント
                    } else if (isCorrect === false) {
                        progress_data[questionId]['誤答数']++; // 誤答数をインクリメント
                    }
                });

                // 更新したデータをローカルストレージに保存
                localStorage.setItem('user_data', JSON.stringify(progress_data, null, 2));
                // 結果ページにリダイレクト
                window.location.href = "/game_result_show";
            })
            
        });
    }
}

window.StartScene = StartScene;
window.QuizScene = QuizScene;
window.AnswerResultScene = AnswerResultScene;
window.EndScene = EndScene;
window.CharacterScene = CharacterScene;