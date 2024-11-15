const D_WIDTH = 1900;
const D_HEIGHT = 900;

document.addEventListener('DOMContentLoaded', () => {
    const config = {
        type: Phaser.AUTO,
        scale: {
            mode: Phaser.Scale.FIT,
            parent: 'phaser-example',
            autoCenter: Phaser.Scale.CENTER_BOTH,
            width: D_WIDTH,
            height: D_HEIGHT
        },
        physics: {
            default: 'arcade',
            arcade: {
                gravity: { y: 0 },
                debug: false
            }
        },
        scene: [StartScene, QuizScene,AnswerResultScene,EndScene]  // スタート画面とクイズ画面のシーン
    };

    new Phaser.Game(config);
});
