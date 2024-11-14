class MainScene extends Phaser.Scene {
    constructor() {
        super({ key: 'MainScene' });
    }

    preload() {
        this.load.image('background', '/assets/background.png');
    }

    create() {
        const background = this.add.image(D_WIDTH / 2, D_HEIGHT / 2, 'background');
        background.setDisplaySize(D_WIDTH, D_HEIGHT);

                const questionText = questionData[0].question;
                const answerText = questionData[0].answer;
        
                this.questionLabel = this.add.text(100, 100, `問題: ${questionText}`, {
                    fontSize: '30px',
                    fill: '#ffffff'
                });
        
                // 解答を表示 (デバッグ用)
                this.answerLabel = this.add.text(100, 200, `解答: ${answerText}`, {
                    fontSize: '24px',
                    fill: '#ffcc00'
                });
    }

    update() {
    }
}

window.MainScene = MainScene;
