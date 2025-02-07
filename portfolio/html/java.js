const mediaPlayerControl = {
mediaElement: document.getElementById('mediaPlayer'),

    play: function() {
        if (this.mediaElement) {
this.mediaElement.play();
        }
    },

    pause: function() {
        if (this.mediaElement) {
this.mediaElement.pause();
        }
    },

    stop: function() {
        if (this.mediaElement) {
this.mediaElement.pause();
this.mediaElement.currentTime = 0;
        }
    }
};
