$(document).ready(function () {
	// number of items to display on scroll
	var limit = 10;
	var start = 0;
	var action = 'inactive';

	function load_display_data(limit, start) {
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {
				"scroll": 1,
				limit: limit,
				start: start
			},
			cache: false,
			success: function (data) {
				$('#load_data').append(data);
				if (data == '') {
					// alert("no data");
					$('#load_data_message').html("<lable class='btn'>End of results.</lable>");
					action = 'active';
				} else {
					// alert("data");
					$('#load_data_message').html("<img src ='loader.gif' style='width:80px;height:80px;'>");
					action = 'inactive';
				}
			}
		});
	}

	if (action == 'inactive') {
		action = 'active';
		load_display_data(limit, start);
	}
	$(window).scroll(function () {
		if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
			action = 'active';
			start = start + limit;
			setTimeout(function () {
				load_display_data(limit, start);
			}, 800);
		}
	});

	// image hover

	$("#front").hover(function () {
		$("#imgfront").show();
		$("#imgback").hide();
		$("#imgside").hide();
		$("#img").hide();

	});
	$("#full").hover(function () {
		$("#imgfront").hide();
		$("#imgback").hide();
		$("#imgside").hide();
		$("#img").show();

	});
	$("#back").hover(function () {
		$("#imgfront").hide();
		$("#imgback").show();
		$("#imgside").hide();
		$("#img").hide();

	});
	$("#side").hover(function () {
		$("#imgfront").hide();
		$("#imgback").hide();
		$("#imgside").show();
		$("#img").hide();

	});


                  // rating
          $('.controls.rating')
            .addClass('starRating') //in case js is turned off, it fals back to standard radio button
            .on('mouseenter', 'label', function () {
              DisplayRating($(this)); // when we hover into a label, show the ratings
            })
            .on('mouseleave', function () {
              // when we leave the rating div, figure out which one is selected and show the correct rating level
              var $this = $(this),
                $selectedRating = $this.find('input:checked');
              if ($selectedRating.length == 1) {
                DisplayRating($selectedRating); // a rating has been selected, show the stars
              } else {
                $this.find('label').removeClass('on'); // nothing clicked, remove the stars
              };
            });

          var DisplayRating = function ($el) {
            // for the passed in element, add the 'on' class to this and all prev labels
            // and remove the 'on' class from all next labels. 
            $el.addClass('on');
            $el.parent('label').addClass('on');
            $el.closest('td').prevAll().find('label').addClass('on');
            $el.closest('td').nextAll().find('label').removeClass('on');
  };


});