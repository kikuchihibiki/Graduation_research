class StartScene extends Phaser.Scene {
    constructor() {
        super({ key: 'StartScene' });
    }

    preload() {
        this.load.image('background', `assets/background.png`);
    }
    create() {
        console.log(`Phaser version: ${Phaser.VERSION}`);

        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);
        const answerInputRectWidth = D_WIDTH;  // 幅を調整
        const answerInputRectHeight = 480; // 高さを調整

        console.log(questionData)
        // 背景矩形を追加（薄い黒）
        this.add.graphics()
            .fillStyle(0x000000, 0.7) // 色: 黒、透明度: 0.5
            .fillRect(0,answerInputRectHeight,answerInputRectWidth,80);
        if (flagData === false) {
            this.text = '間違ったことのある問題がありません。エンターで戻る';
        } else {
            this.text = '回答欄：エンターを押してスタート';
        }
        // 回答欄の表示
        this.answerInput = this.add.text(D_WIDTH/2, 520, `${this.text}`, {
            fontSize: '48px',
            fill: '#ffffff',
            align: 'center',
            fontFamily: 'k8x12L',
        }).setOrigin(0.5).setPadding(6);

        this.registry.set('timeLimit',timeLimitData);
        this.registry.set('clearFlag',true);
        console.log(this.registry.get('mode'));
        console.log(this.registry.get('level'));
        this.registry.set('questionData',questionData);
        console.log(correctRatesData)
        
        this.newScore = 0;
        this.registry.set('lastScore',this.newScore);
        this.registry.set('progressData', Array(6).fill(null));
        this.registry.set('questionId',questionData.id);
        const id = questionData.map(obj => obj.id);
        this.registry.set('questionId',id);
        console.log(this.registry.get('questionId'))
        
        this.input.keyboard.on('keydown-ENTER', () => {
            if (flagData === false) {
                window.location.href = '/select_mode';
            } else {
                this.scene.start('CharacterScene', { 
                    questionIndex: 0,
                    totalQuestions: questionData.length,
                    correctAnswers: 0,
                    lives: 3, 
                    progress: 0,
                });
            }
        });
        
    }
}


class CharacterScene extends Phaser.Scene {
    constructor() {
        super({ key: 'CharacterScene' });
    }
    preload(){
        this.textures.remove('character');

        this.load.image('background', `assets/background.png`);

        const characterPath = `assets/character.png`;
        console.log(characterPath);
        this.registry.set('characterPath', characterPath);
        this.load.image('character', `assets/character.png`);

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
        const backgroundRectWidth = 650;  // 背景の幅を調整（テキストの幅に少し余裕を持たせる）
        const backgroundRectHeight = 300; // 背景の高さ
        const backgroundRectX = D_WIDTH / 2;
        const backgroundRectY = 140;

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
        this.load.image('background', `assets/background.png`);
        this.load.image('character', this.registry.get('characterPath'));  
        this.load.image('block', '/assets/block.png');
        this.load.image('attack', '/assets/attack.png');
    }

    create(data) {
        console.log(`after${this.registry.get('characterPath')}`);
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
        this.rateText = Math.floor(correctRatesData[this.questionIndex] * 100);

        // 質問の表示
        const backgroundRectWidth = 650;  // 背景の幅
        const backgroundRectHeight = 300; // 背景の高さ
        const backgroundRectX = D_WIDTH / 2;
        const backgroundRectY = 140;
            
        // 背景の四角を描画
        this.add.graphics()
            .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
            .fillRect(backgroundRectX - backgroundRectWidth / 2, backgroundRectY, backgroundRectWidth, backgroundRectHeight);
            
        // テキストラベル (questionText) を中央に配置
        this.questionLabel = this.add.text(D_WIDTH / 2, this.cameras.main.centerY, `${this.questionText}`, {
            fontSize: '43px',
            fill: '#ffffff',
            align: 'center', // テキストの中央揃え
            wordWrap: { width: 600, useAdvancedWrap: true },
            fontFamily: 'k8x12L',
        }).setOrigin(0.5).setPadding(16);
        
        // 四角の右上座標を計算
        const rectRightX = backgroundRectX + backgroundRectWidth / 2;
        const rectTopY = backgroundRectY;
        
        // rateText を四角の右上に表示
        this.rateLabel = this.add.text(rectRightX, rectTopY, `正答率${this.rateText}%`, {
            fontSize: '30px', // サイズは少し小さめに調整
            fill: '#ffffff',
            fontFamily: 'k8x12L',
            align: 'right' // 右揃え (必要に応じて調整)
        }).setOrigin(1, 0).setPadding(16);; // 原点を右上に設定 (1, 0)

        
        const answerInputRectWidth = D_WIDTH;  // 幅を調整
        const answerInputRectHeight = 480; // 高さを調整
    
        // 背景矩形を追加（薄い黒）
        this.add.graphics()
            .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
            .fillRect(0,answerInputRectHeight,answerInputRectWidth,80);
        // 回答欄の表示
        this.answerInput = this.add.text(D_WIDTH / 2, 520, '', {
            fontSize: '45px',
            fill: '#ffcc00',
            align: 'center',
            fontFamily: 'k8x12L',
        }).setOrigin(0.5).setPadding(6);

        this.userAnswer = '';

        // 最後の回答表示の初期化
        this.lastAnswer = this.add.text(this.cameras.main.centerX-130,this.cameras.main.centerY+140, '', {
            fontSize: '35px',
            fill: '#ff0000',
            fontFamily: 'k8x12L',
        }).setPadding(6);

        // コンテナを作成
        const livesContainer = this.add.container(0, 0);

// 背景を作成
        const liveBg = this.add.graphics();
        liveBg.fillStyle(0x000000, 0.8);

        // テキストを作成
        this.livesText = this.add.text(1080, 100, `残機:✖ ${this.lives}`, { 
            fontSize: '30px', 
            fill: '#ffffff' ,
            fontFamily: 'k8x12L',
        }).setPadding(8);

        // テキストの幅と高さを取得
        const textWidth = this.livesText.width;
        const textHeight = this.livesText.height;

        // 背景をテキストの背面に描画
        liveBg.fillRect(1080 - 8, 100 - 8, textWidth + 16, textHeight + 16);

        // 背景とテキストをコンテナに追加
        livesContainer.add([liveBg, this.livesText]);

        this.scoreText = this.add.text(80, 100, `スコア: ${this.registry.get('lastScore')}`, { fontSize: '30px', fill: '#000000',fontFamily: 'k8x12L', }).setPadding(6);

        // タイマーの設定
        this.timerText = this.add.text(D_WIDTH/2-30, 100, `${this.timeLimit} `, {
            fontSize: '30px',
            fill: '#ff0000',
            fontFamily: 'k8x12L',
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

        this.cursor = this.add.text(D_WIDTH / 2, 520, '|', {
            fontSize: '50px',
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
            const block = this.add.image(this.cameras.main.centerX, this.cameras.main.centerY, 'block').setScale(0.3);
            this.time.delayedCall(1000, () => {
                block.destroy(); // 画像を削除
            });
            this.answerresult = this.userAnswer;
            this.userAnswer = '';
            this.updateAnswerDisplay();
            this.missCount++;

            // 前回の解答を更新
            this.lastAnswer.setText(`前回の解答: ${this.answerresult}`,{fontFamily: 'k8x12L',});
            return; // 不正解の場合、ここで処理終了
        }
        this.livesText.setText(`残機: ${this.lives}`,{fontFamily: 'k8x12L',}).setPadding(6);

        
        // 正解または時間切れの場合、結果を表示して次へ
        this.resultLabel = this.add.text(this.cameras.main.centerX-30,50 , resultText, { fontSize: '24px', fill: color,fontFamily: 'k8x12L', });
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
        this.load.image('background', `assets/background.png`);

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

        const backgroundRectWidth = 650;  // 背景の幅を調整（テキストの幅に少し余裕を持たせる）
        const backgroundRectHeight = 300; // 背景の高さ
        const backgroundRectX = D_WIDTH / 2;
        const backgroundRectY = 140;

    // 背景矩形を追加
    this.add.graphics()
        .fillStyle(0x000000, 0.5) // 色: 黒、透明度: 0.5
        .fillRect(0, backgroundRectY, D_WIDTH, backgroundRectHeight);
        this.answerLabel = this.add.text(D_WIDTH / 2, this.cameras.main.centerY, `正答 \n ${data.correctAnswer}`, {
            fontSize: '45px',
            fill: '#ffffff',
            align: 'center', 
            fontFamily: 'k8x12L',
            wordWrap: { width: 800, useAdvancedWrap: true }
        }).setOrigin(0.5).setPadding(6);

        const livesContainer = this.add.container(0, 0);

        const liveBg = this.add.graphics();
        liveBg.fillStyle(0x000000, 0.8);

        // テキストを作成
        this.livesText = this.add.text(1080, 100, `残機:✖ ${this.lives}`, { 
            fontSize: '30px', 
            fill: '#ffffff' ,
            fontFamily: 'k8x12L',
        }).setPadding(8);

        // テキストの幅と高さを取得
        const textWidth = this.livesText.width;
        const textHeight = this.livesText.height;

        // 背景をテキストの背面に描画
        liveBg.fillRect(1080 - 8, 100 - 8, textWidth + 16, textHeight + 16);

        // 背景とテキストをコンテナに追加
        livesContainer.add([liveBg, this.livesText]);

        this.scoreText = this.add.text(80, 100, `スコア: ${this.registry.get('lastScore')}`, { fontSize: '30px', fill: '#000000',fontFamily: 'k8x12L', }).setPadding(6);
        this.scoreresultText = this.add.text(80, 130., `+${this.score}`, { fontSize: '30px', fill: '#ff0000' ,fontFamily: 'k8x12L',}).setPadding(6);
        
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
        this.load.image('background', `assets/background.png`);
    }

    create(data) {
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);
        this.clearFlag = this.registry.get('clearFlag');
        if (this.clearFlag) {
            this.cameras.main.fadeIn(1000, 0, 0, 0, () => {
                this.cameras.main.setBackgroundColor('#000000');
        
                const clearText = this.add.text(
                    this.cameras.main.centerX,
                    this.cameras.main.centerY,
                    'GAME CLEAR',
                    { fontSize: '120px', color: '#ffffff' ,fontFamily: 'k8x12L',}
                );

                const operatingText = this.add.text(
                    D_WIDTH / 2,
                    520,
                    '---PLEASE ENTER---',
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
            this.cameras.main.fadeIn(1000, 255, 255, 255);

        // ゲームオーバーテキストを追加
        const gameOverText = this.add.text(
            this.cameras.main.centerX,
            this.cameras.main.centerY,
            'GAME OVER',
            { fontSize: '120px', color: '#ffffff', fontStyle: 'bold' ,fontFamily: 'k8x12L',}
        ).setOrigin(0.5).setAlpha(0); // 初期状態では透明

        const operatingText = this.add.text(
            D_WIDTH / 2,
            520,
            '---PLEASE ENTER---',
            { fontSize: '80px', color: '#ffffff' ,fontFamily: 'k8x12L',}
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
            fetch('/miss_result', {
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
                }),
            })

        .then((response)=>{
            if(!response.ok){
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then((result) => {
            if(result.success){
                window.location.href = "/miss_result_show";
            }else{
                console.log('失敗');
            }
        })
        });
    }
}

window.StartScene = StartScene;
window.QuizScene = QuizScene;
window.AnswerResultScene = AnswerResultScene;
window.EndScene = EndScene;
window.CharacterScene = CharacterScene;