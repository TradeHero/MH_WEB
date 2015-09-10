/**
 * @file leaderboard.js
 */

var TH = (function( TH, $ ) {
	TH.leaderboard = function( ) {
		return {
			init: function() {
				var that = this;
				var $leaderboard = $('section.heroes');
				var $ajax = $leaderboard.find('.ajax-get-helper').data('promise');
				var init = function() {
					TH.toggle().group('section.heroes .tabs-title', 'a');
					if ( $('body').width() < 1024 ) {
						$leaderboard.onScreen({
							doIn: function() {
								that.chart( $leaderboard.find('.leaderboard-chart') );
							}
						});
					} else {
						that.chart( $leaderboard.find('.leaderboard-chart') );
					}
				}
				if ( $ajax ) {
					$ajax.done(function() {
						init();
					});
				} else {
					init();
				}
				return this;
			},
			chart: function( selector ) {
				var $chart = $(selector || '.leaderboard-chart'),
			        $chartNr = $chart.find('.chart-content'),
			        $chartParent = $chart.parent();

			    function centerChartsNr() {

			        $chartNr.css({
			            top: ($chart.height() - $chartNr.outerHeight()) / 2
			        });

			    }

			    if ($chart.length < 1) { return this; }

		        centerChartsNr();
		        $(window).resize(centerChartsNr);

	            $chart.each(function() {
	            	var $this = $(this);
	            	var lineWidth = 8,
	            		indicatorHeight = 11,
	            		scaleLength = indicatorHeight - lineWidth;
	            	var canvasWidth = $this.width();
	            	var rOutter = canvasWidth / 2 - scaleLength,
	            		rInner = rOutter - lineWidth - 3;
	            	var rotate = -90;

	            	$this.easyPieChart({
	                    trackColor: '#eee',
	                    lineWidth: lineWidth,
	                    scaleColor: 'transparent',
	                    scaleLength: scaleLength,
	                    size: canvasWidth,
	                    lineCap: 'square',
	                    animate: 2000,
	                    rotate: rotate,
	                    onStep: function (from, to, percent) {
	                        $(this.el).find('.percent').text(Math.round(percent*2));
	                        var ctx = this.renderer.getCtx();
						    var canvas = this.renderer.getCanvas();

						    // Remove the extra half track
						    ctx.fillStyle = '#fff';
						    ctx.fillRect(-canvasWidth/2, 0, canvasWidth, -canvasWidth/2);

						    // Draw indicator
						    var angleTopPoint = (1 - (percent + 1) / 50) * Math.PI,
						    	angleBottomPoint1 = angleTopPoint - Math.PI / 36,
						    	angleBottomPoint2 = angleTopPoint + Math.PI / 36;
						    var calculate = function(radius, radian) {
						    	var rotatedRadian = radian + rotate/180 * Math.PI;
						    	var result = [radius * Math.sin( rotatedRadian ), radius * Math.cos( rotatedRadian )];
						    	return result;
						    };
						    ctx.fillStyle = '#333';
						    ctx.beginPath();
						    ctx.moveTo.apply( ctx, calculate(rOutter + scaleLength, angleTopPoint) );
						    ctx.lineTo.apply( ctx, calculate(rInner, angleBottomPoint1) );
						    ctx.lineTo.apply( ctx, calculate(rInner, angleBottomPoint2) );
						    ctx.closePath();
						    ctx.fill();
	                    },
	                    barColor: function(percent) {
						    var ctx = this.renderer.getCtx();
						    var canvas = this.renderer.getCanvas();
						    var gradient = ctx.createLinearGradient(canvasWidth/2, 0, -canvasWidth/2,0);
						    gradient.addColorStop(0, 'red');
							gradient.addColorStop(1 / 3, 'orange');
							gradient.addColorStop(2 / 3, 'yellow');
							gradient.addColorStop(1, 'green');
						    return gradient;
					  	}
	                });
	            });

	            return this;
			}
		};
	};

	return TH;
})( window.TH || {}, jQuery );