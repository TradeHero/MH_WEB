/**
 * @file templateExtends.js
 */
var TH = (function( TH, $ ) {
	TH.templateExtends = function() {
		template.helper('dateFormat', function (date, format) {
			var t = new Date( date.replace(/t/i, ' ').replace(/\-/g, '/').replace(/\+\d*$/, '') );
			var formated = format;
			var year = t.getFullYear(),
				month = t.getMonth() + 1,
				day = t.getDate(),
				hour = t.getHours(),
				minute = t.getMinutes(),
				second = t.getSeconds();

			function checkDigits(str, digit) {
				var len, left;
				str = str.toString();
				len = str.length;
				left = digit - len;
				if( left > 0 ) {
					var helper = new Array( left + 1 );
					return helper.join('0') + str;
				} else if ( left < 0 ) {
					return str.substring( Math.abs(left) );
				}
				return str;
			}
			function getMonthName() {
				switch( month ) {
					case 1: return 'January';
					case 2: return 'February';
					case 3: return 'March';
					case 4: return 'April';
					case 5: return 'May';
					case 6: return 'June';
					case 7: return 'July';
					case 8: return 'August';
					case 9: return 'September';
					case 10: return 'October';
					case 11: return 'November';
					case 12: return 'December';
					default: return '';
				}
			}

			formated = formated.replace(/yyyy/g, year);
			formated = formated.replace(/MMMM/g, getMonthName(),3 );
			formated = formated.replace(/MMM/g, getMonthName().substring(0,3) );

			formated = formated.replace(/MM/g, checkDigits(month,2) );
			formated = formated.replace(/dd/g, checkDigits(day,2) );
			formated = formated.replace(/hh/g, checkDigits(hour,2) );
			formated = formated.replace(/mm/g, checkDigits(minute,2) );
			formated = formated.replace(/ss/g, checkDigits(second,2) );

			formated = formated.replace(/M/g, month );
			formated = formated.replace(/d/g, day );
			formated = formated.replace(/h/g, hour );
			formated = formated.replace(/m/g, minute );
			formated = formated.replace(/s/g, second );

			return formated;
		});
		template.helper('autolink', function(input) {
			return Autolinker.link(input);
		});
		template.helper('number', function(input, decimal) {
			var str = input.toString();
			var regDecimal = new RegExp('\\.\\d{' + ( decimal || 0 ) + '}');
			var decimalPart = str.match(regDecimal);
			decimalPart = decimalPart ? decimalPart[0] : '';

			if( decimal>0 && decimalPart.length < decimal + 1 ) {
				str = str + '.' + ( new Array( decimal - decimalPart.length + ( decimalPart.length>0 ? 2 : 1 ) ) ).join('0');
			} else {
				str = str.replace(/\.\d*$/, decimalPart);
			}
			return str;
		});
		template.helper('randomNumber', function(input) {
			var num = parseInt(input);
			if( typeof(num) === 'number' ) {
				return Math.round( Math.random() * num );
			} else {
				return input;
			}
		});
		return this;
	};

	return TH;
})( window.TH || {}, jQuery );