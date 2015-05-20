$(document).ready(function(){

	$('.main').onepage_scroll({
		sectionContainer: "section",
		responsiveFallback: 600,
		loop: false,
		beforeMove: function(index) {
			$('#fix-nav-full a[data-index]').removeClass('active');
			$('#fix-nav-full a[data-index]:eq('+(index-1)+')').addClass('active');
			$('#menu-list li a').removeClass('active');
			$('#menu-list li:eq('+(index-1)+') a').addClass('active');

			if(index > 1)
			{
				$('#logo').addClass('fix');
			}
			else if(index == 1)
			{
				$('#logo').removeClass('fix');
			}

			//window.history.pushState({},'',$('section:eq('+(index-1)+')').attr('data-id'));
		},
		afterMove: function(index) {

		}
	});


	var section = $('body').attr('data-section');
	var index = $('section').index($('section[data-id="'+section+'"]')) + 1;
	$('.main').moveTo(index);

	$('#fix-nav a[data-index]').click(function(){
		$('.main').moveTo($(this).attr('data-index'));
		return false;
	});

	$('#move-down').click(function(){
		$('.main').moveTo(2);
		return false;
	});

	$('a #logo').click(function(){
		$('.main').moveTo(1);
		return false;
	});
	

	//Scrollbar
	$('#description').perfectScrollbar({
          wheelSpeed: 10,
          wheelPropagation: false
    });


	//Slider
	var hwSlideSpeed = 700;
	var hwTimeOut = 6000;
	var hwNeedLinks = true;
	 
	$('.slide').css({
    	"position" : "absolute",
        "top":'0', "left": '0'
	}).hide().eq(0).show();

	var slideNum = 0;
	var slideTime;
	slideCount = $("#slider .slide").size();
	var animSlide = function(arrow){
		clearTimeout(slideTime);
		$('.slide').eq(slideNum).fadeOut(hwSlideSpeed);
		if(arrow == "next"){
			if(slideNum == (slideCount-1)){slideNum=0;}
			else{slideNum++}
		}
		else if(arrow == "prew")
		{
			if(slideNum == 0){slideNum=slideCount-1;}
			else{slideNum-=1}
		}
		else {
			slideNum = arrow;
		}

		$('.project-desc').hide();
		$('.project-desc:eq('+slideNum+')').fadeIn('normal');


		$('.slide').eq(slideNum).fadeIn(hwSlideSpeed, rotator);
		$(".control-slide.active").removeClass("active");
		$('.control-slide').eq(slideNum).addClass('active');
	}

	if(hwNeedLinks)
	{
		$('#nextButton').click(function(){
			animSlide("next");
			return false;
		});
		$('#prewButton').click(function(){
			animSlide("prew");
			return false;
		})
	}
	var $adderSpan = '';
	$('.slide').each(function(index) {
		$adderSpan += '<span class = "control-slide">' + index + '</span>';
	});
	$('<div class ="sli-links">' + $adderSpan +'</div>').appendTo('#slider');
	$(".control-slide:first").addClass("active");

	$('.control-slide').click(function(){
		var goToNum = parseFloat($(this).text());
		animSlide(goToNum);
	});
	var pause = false;
	var rotator = function(){
		if(!pause){slideTime = setTimeout(function(){animSlide('next')}, hwTimeOut);}
	}
	rotator();

	//Fix nav
	var fixNav = $('#fix-nav');

	fixNav.hover(
		function(){
			$('#fix-nav, #fix-nav-full, .copy').addClass('active');
		},
		function(){
			$('#fix-nav, #fix-nav-full, .copy').removeClass('active');
	});


	$('#fix-nav-full li a').click(function(){
		$('#fix-nav, #fix-nav-full, .copy').toggleClass('active');
	});

	//Vacancy PopUp
	var body = $('body');
	var logo = $('#logo');
	
	$('#vc li').click(function(event){

		event.stopPropagation();
		$('.vc-container').addClass('open');
		body.addClass('no-scroll');
		fixNav.addClass('disabled');
		logo.fadeOut(400);

		var rand_bg_1 = Math.floor(Math.random() * 10 + 1);
		var rand_bg_2 = Math.floor(Math.random() * 10 + 1);

		$('#btn-job-vc').attr('data-bg',rand_bg_1);
		$('#submit').attr('data-bg',rand_bg_2);

		// Load job info
		var job_id = $(this).attr('data-job');
		$('#job-content').load('/job/'+job_id, function(){
			$('#job-form input[name="job_id"]').val(job_id);
			$('#job-box').fadeIn('fast');
		});
	});

	$('#btn-job-vc, #submit')
		.mousemove(function(event){
			$('#vc-content').css('background-position-x', event.pageX);
			$('#vc-content').css('background-position-y', event.pageY);
		})
		.hover(
			function(){
				for(var i = 1; i <= 10; i++)
				{
					$('#vc-content').removeClass('bg-'+i);
				}
				$('#vc-content').addClass('bg-'+(Math.floor(Math.random() * 10 + 1)));
			},
			function(){
				for(var i = 1; i <= 10; i++)
				{
					$('#vc-content').removeClass('bg-'+i);
				}
			}
		);

	$('#vc h4')
		.hover(
			function(){
				for(var i = 1; i <= 10; i++)
				{
					$('#vc-slide').removeClass('bg-'+i);
				}
				$('#vc-slide').addClass('bg-'+(Math.floor(Math.random() * 10 + 1)));
			},
			function(){
				for(var i = 1; i <= 10; i++)
				{
					$('#vc-slide').removeClass('bg-'+i);
				}
			}
		)
		.mousemove(function(event){
			$('#vc-slide').css('background-position-x', event.pageX);
			$('#vc-slide').css('background-position-y', event.pageY);
		});

	$('.vc-container .closeBtn, #vc-slide').click(function(){
		$('.vc-container').removeClass('open');
		body.removeClass('no-scroll');
		fixNav.removeClass('disabled');
		logo.delay(200).fadeIn(400);
	});
	$(document).bind('keyup', function(e){
		if(e.keyCode==27) {
			$('.vc-container').removeClass('open');
			body.removeClass('no-scroll');
			fixNav.removeClass('disabled');
			logo.delay(200).fadeIn(400);
		}
	});

	$('#vc-form input[type="text"]')
		.focus(function(){
			$(this).css('padding-left', $(this).parent().find('label').width() + 30 + 'px');
			$(this).parent().find('label').animate({
				width: 0
			}, 150);
			$(this).animate({
				paddingLeft: 30
			}, 150);
		}).blur(function(){
			if($(this).val() == '')
			{
				$(this).parent().find('label').css({ width: 'auto' });
			}
		});

	$('#vc-form label').click(function(){
		$(this).next().css('padding-left', $(this).parent().find('label').width() + 30 + 'px');
		$(this).animate({
			width: 0
		}, 150);
		$(this).next().focus().animate({
			paddingLeft: 30
		}, 150);
	});

	// VC upload
	$('#vc-file').fileupload({
		dataType: 'json',
		url: '/job/upload',
		add: function(e, data){
			$('#btn-fill').hide();
			$('#btn-frame').addClass('uploading');
			data.submit();
		},
		progressall: function (e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#btn-frame i').css('width', progress + '%');
		},
		done: function (e, data) {
			$('#btn-fill').show();
			$('#btn-frame').removeClass('uploading');
			$('#btn-frame i').css('width','0');
			$('#vc-file-name').empty().append('<a href="/assets/upload/vc/'+data.result.file+'" target="_blank">'+data.result.raw_name+'</a> ('+Math.round((data.result.size/1024))+' КБ)<input type="hidden" name="vc[file]" value="'+data.result.file+'"><input type="hidden" name="vc[ext]" value="'+data.result.ext+'"><input type="hidden" name="vc[name]" value="'+data.result.name+'"><input type="hidden" name="vc[raw_name]" value="'+data.result.raw_name+'"><input type="hidden" name="vc[size]" value="'+data.result.size+'"><input type="hidden" name="vc[type]" value="'+data.result.type+'">');
		}
	});

	// Apply job
	$('#job-form').submit(function(){
		var self = this;
		$(self).find('.error').removeClass('error');
		$.post($(this).attr('action'), $(this).serialize(), function(data){
			var response = $.parseJSON(data);

			if(response.errors)
			{
				for(var n in response.errors)
				{
					$(self).find('*[name="'+n+'"]').addClass('error');
				}
			}

			if(response.status == '1')
			{
				$('#job-form input[type="text"]').val('');
				$('#job-form textarea').val('');
				$('#vc-file-name').empty();
				$('.input-wrap label').css({ width: 'auto' });;
				$('#vc-success').fadeIn('fast');
			}
		});

		return false;
	});

	// Center
	$(window).resize(function(){
		$('aside').css({
			'position':'absolute',
			'top': ($(document).height() - $('aside').height())/2 + 'px'
		});
		$('#slider-wrap').css({
			'position':'absolute',
			'top': ($(document).height() - $('#slider-wrap').height())/2 + 'px',
			'left': ($(document).width() - $('#slider-wrap').width())/2 + 'px'
		});
		$('#vc').css({
			'position':'absolute',
			'top': ($(document).height() - $('#vc').height())/2 - 35 + 'px'
		});
		$('#about').css({
			'position':'absolute',
			'top': ($(document).height() - $('#about li').outerHeight())/2 + 'px'
		});
		$('#fix-nav ul').css({
			'position':'absolute',
			'top': ($(document).height() - $('#fix-nav ul').outerHeight())/2 + 'px'
		});
		$('.move-link').css({
			'top': ($(document).height() - $('.move-link').outerHeight())/2 + 'px'
		});
		$('.modalWin').css({
			'position':'absolute',
			'top': ($(document).height() - $('.modalWin').outerHeight())/2 + 'px',
			'left': ($(document).width() - $('.modalWin').width())/2 + 'px'
		});
	});
	$(window).resize();


	//Body hidden
    $('body').on({
		'mousewheel': function(e) {
			if($('body').hasClass('no-scroll'))
			{
				e.preventDefault();
				e.stopPropagation();
			}
		}
	}).keydown(function(e){
        var key = e.keyCode;
        if($('body').hasClass('no-scroll')){
        	if((key == "37")||(key == "38")||(key == "39")||(key == "40"))
            e.preventDefault();
        	e.stopPropagation();
        }
    });

    $('#vc-content').click(function(event){
    	event.stopPropagation();
    })

});