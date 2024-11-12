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
    }

    update() {
    }
}

window.MainScene = MainScene;
