/*
 * Copyright (c) 2011 Diego Dorado
 */


	// Menus

$(function(){


  $('.menu > li > .submenu').each( function(i,el){
    $(el).find('.submenu').css('left',$(el).width()+'px');
  });

	$('.menu li').hover(
		function(){
			$(this).find('> .submenu').show();
		},
		function(){
			$(this).find('.submenu').hide();
		}
	);

});


(function($){

	$.fn.countdown = function (options) {
		var nowTime = new Date();
		var diffSecs = options.targetTime - Math.floor(nowTime.getTime()/1000);
		$.data($(this)[0], 'callback', options.callback);
		$(this).doCountDown($(this).attr('id'), diffSecs);
		return this;
	};

	$.fn.doCountDown = function (id, diffSecs) {
		$this = $('#' + id);
	  if (diffSecs <= 0) {
  		$.data($this[0], 'callback')();
  		return;
	  }
	  secs = diffSecs % 60;
	  secs = (secs < 10) ? '0'+secs:secs;
	  mins = Math.floor(diffSecs/60)%60;
	  mins = (mins < 10) ? '0'+mins:mins;
	  hours = Math.floor(diffSecs/60/60)%24;
	  days = Math.floor(diffSecs/60/60/24);
	  $this.html(days + 'd ' + hours + 'h ' + mins + 'm ' + secs + 's');

		t = setTimeout(function() { $this.doCountDown(id, diffSecs-1) } , 1000);

	};

})(jQuery);
