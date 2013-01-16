jQuery(function ($) {
	function fixThumbnailMargins() {
	    $('.row-fluid .thumbnails').each(function () {
	        var $thumbnails = $(this).children();
	        var previousOffsetLeft = $thumbnails.first().offset().left;

	        $thumbnails.removeClass('first-in-row');
	        $thumbnails.first().addClass('first-in-row');

	        $thumbnails.each(function () {
	            var $thumbnail = $(this);
	            var offsetLeft = $thumbnail.offset().left;

	            if (offsetLeft < previousOffsetLeft) {
	                $thumbnail.addClass('first-in-row');
	            }

	            previousOffsetLeft = offsetLeft;
	        });
	    });
	}

	$(window).resize(fixThumbnailMargins);
	fixThumbnailMargins();
});
