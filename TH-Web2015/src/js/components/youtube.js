/**
 * @file youtube.js
 */

var TH = (function( TH, $ ) {
	TH.youtube = function() {
		return {
			videoInit: function() {
				$('body').on('click', '.youtube-video', function () {
					if( !YT ) { return; }

				    var $this = $(this);
				    var videoId = $this.data('videoId');
				    if( !videoId ) { return; }

				    var controls = $this.data('controls') || 0,
				      showinfo = $this.data('showinfo') || 0,
				      loop = $this.data('loop') || 1,
				      playlist = $this.data('playlist') || videoId,
				      allowfullscreen = $this.data('allowfullscreen') || 0;

				    var id = 'youtube-video-' + videoId;
				    if( $('#' + id).length>0 ) {
				      id += '-';
				      id += $('#' + id).length;
				    }
				    $this.html('<div id="' + id + '"></div>');

				    var height = $this.data('videoHeight') || $this.parent().height() || '390';
				    var width = $this.data('videoWidth') || '640';
				    var player = new YT.Player(id, {
				      height: height,
				      width: width,
				      videoId: videoId,
				      playerVars: {
				        controls: controls,
				        showinfo: showinfo,
				        loop: loop,
				        playlist: playlist,
				        fs: allowfullscreen,
				        autoplay: 1
				      },
				      events: {
				      	onStateChange: function(api) {
				          // Add class, if is playing
				          $this.toggleClass('playing', api.data === 1);
				        }
				      }
				    });
				    $this.data('youtube', player);
				    $this.data('videoStop', function() {
				      player.stopVideo();
				    });
				});
				return this;
			}
		};
	};

	return TH;
})( window.TH || {}, jQuery );