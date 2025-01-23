const D_WIDTH = Math.min(window.innerWidth, 1920);
const D_HEIGHT = Math.min(window.innerHeight, 1080);

window.addEventListener('resize', () => {
    game.scale.resize(window.innerWidth, window.innerHeight);
});

document.addEventListener('DOMContentLoaded', () => {
    const config = {
        type: Phaser.AUTO,
        
        scale: {
            mode: Phaser.Scale.FIT,
            parent: 'phaser-example',
            autoCenter: Phaser.Scale.CENTER_BOTH,
            width: D_WIDTH,
            height: D_HEIGHT,
        },
        physics: {
            default: 'arcade',
            arcade: {
                gravity: { y: 0 },
                debug: false
            }
        },
        scene: [StartScene, QuizScene,AnswerResultScene,EndScene,CharacterScene]  // スタート画面とクイズ画面のシーン
    };

    new Phaser.Game(config);
    game.scene.events.on('start', function() {
        this.sound.add('bgm');  // 'background_music' はロードした音楽のキー
    });
});
