$(document).ready(function(){
	$domain = 'http://sustainwv.org';
	queryURL = $domain+'/wp-content/themes/SustainabilityInstitute/templates/resourcesFilter.php';
	queryURL_I = $domain+'/wp-content/themes/SustainabilityInstitute/templates/impactFilter.php';
	queryURL_O = $domain+'/wp-content/themes/SustainabilityInstitute/templates/networkFilter.php';

	//Sustainability Is
	// $("#scrollable").scrollable({circular: true, vertical:true,mousewheel:false}).autoscroll({ autoplay: true });

	// $('.hex').addClass('three columns');

	//$('.hex-rowodd .hex:last-child').prev('.hex').andSelf()('<div class="lasttwo"></div>');

	// $('.hex-rowodd').each(function(){
	// 	$('.hex:eq(3)').next('.hex').andSelf().wrapAll('<div class="lasttwo"></div>');
	// });

	var $set = $('.hex-rowodd:eq(1)').children();
	var $len = $set.length();
	console.log($len);
	colsole.log($set);

	//Menu caret
	$('section#content .topNav ul.sub-menu').each(function(){
		$('<div class="menuCaret"></div>').insertBefore(this);
	});

	//Footer col-heights
	// var footerArray = [];
	// $('footer > .container > .gutter > *').each(function(){
	//     colHeight = $(this).height();
	//     footerArray.push(colHeight);
	// });
	// var maxHeight = Math.max.apply(Math, footerArray);
	// $('footer > .container > .gutter > *').height(maxHeight);

	//Hash filtering
	if(window.location.hash){

		var hash = window.location.hash.substring(1);
	}else{

	}

	//Email placeholder
	$('input#cc_email').attr('placeholder','Email Address');

	//Search
	$('#headerTrim .search').click(function(){
		$('#headerSearch').toggleClass('open');
		$(this).children('a').toggleClass('active');
	});
	$('footer .search').click(function(){
		$('#footerSearch').toggleClass('open');
		$(this).children('a').toggleClass('active');
	});

	//Home Randomization
	function shuffle(array) {
	  var currentIndex = array.length
	    , temporaryValue
	    , randomIndex
	    ;

	  // While there remain elements to shuffle...
	  while (0 !== currentIndex) {

	    // Pick a remaining element...
	    randomIndex = Math.floor(Math.random() * currentIndex);
	    currentIndex -= 1;

	    // And swap it with the current element.
	    temporaryValue = array[currentIndex];
	    array[currentIndex] = array[randomIndex];
	    array[randomIndex] = temporaryValue;
	  }

	  return array;
	}
	$('.home .hex-rowodd').each(function(i){
	    $cont = $(this);
	    ids = [];
	    var counter = $(this).children('.hex').length;
	    $(this).children('.hex').each(function(i){
	        iterate = i+1;
	        elem = $(this);
	        ids.push(elem);
	        if(iterate == counter){
	            ids.push('<div class="hex"></div>');
	        }
	    });
	    $(this).empty();
	    shuffle(ids);
	    $.each( ids, function( i, l ){
	        $cont.append(l);
	    });
	});
	$('.home .hex-roweven:not(.last)').each(function(i){
	    $cont = $(this);
	    ids = [];
	    var counter = $(this).children('.hex').length;
	    $(this).children('.hex').each(function(i){
	        iterate = i+1;
	        elem = $(this);
	        ids.push(elem);
	        if(iterate == counter){
	            ids.push('<div class="hex"></div>');
	        }
	    });
	    $(this).empty();
	    shuffle(ids);
	    $.each( ids, function( i, l ){
	        $cont.append(l);
	    });
	});
	$('.home .hex-roweven.last').each(function(i){
	    $cont = $(this);
	    ids = [];
	    var counter = $(this).children('.hex').length;
	    $(this).children('.hex').each(function(i){
	        iterate = i+1;
	        elem = $(this);
	        ids.push(elem);
	        if(iterate == counter){
	            ids.push('<div class="hex"></div>');
	            ids.push('<div class="hex"></div>');
	            ids.push('<div class="hex"></div>');
	        }
	    });
	    $(this).empty();
	    shuffle(ids);
	    $.each( ids, function( i, l ){
	        $cont.append(l);
	    });
	});

	//Home Hover
	$('.home .hex').hover(function(){
	    elemIndex = $(this).index();
	    elemImage = $(this).attr('data-rollover');
	    elemA	  = $(this).find('a').attr('href');
	    if($(this).hasClass('checker')){
			checker = true;
	    }else{
		    checker = false;
	    }

	    if(elemIndex == 3 && elemImage != '' && checker == true){
	        $('<div class="hexabsolute"><div class="featuredimg" style="background:url('+elemImage+')center center no-repeat;background-size:contain;"><a href="'+elemA+'"></a></div>').prependTo(this);
	    }else if(elemIndex != 3 && elemImage != '' && checker == true){
	        $('<div class="hexabsolute"><div class="featuredimg" style="background:url('+elemImage+')center center no-repeat;background-size:contain;"><a href="'+elemA+'"></a></div>').prependTo(this);
	    }
	},function(){
	    $(this).children('.hexabsolute').remove();
	});

	//Resources Hash
	if(window.location.hash) {
	  var filterArr = [];
      var hash = window.location.hash.substring(1);
      $('ul#filters li a').each(function(){
		    var dataFilter = $(this).attr('data-filter');
		    filterArr.push(dataFilter);
		});
      if ($.inArray(hash, filterArr) !== -1){
			$('#hexWrap').css('display','none');
			request(queryURL,hash,'#hexWrap');
	  } else {

	  }
	}

	//Resources AJAX
	$('ul#filters.resources li a').click(function(){
		if(!$(this).hasClass('active')){
			var dataFilter = $(this).attr('data-filter');
			var topicFilter = $('#topicsList #topics').val();
			var cptFilter = $('#filters').attr('data-cpt');
			$('#hexWrap').fadeOut( 200, function() {
				request(queryURL,dataFilter, topicFilter, cptFilter, '#hexWrap');
			});
			$('ul#filters li a').removeClass('active');
			$(this).addClass('active');
		}
	});
	$('#topicsList select#topics.resources').change(function(){
		var dataFilter = $('ul#filters.impact li a.active').attr('data-filter');
		var topicFilter = $('#topicsList #topics').val();
		var cptFilter = $('#filters').attr('data-cpt');
		$('#hexWrap').fadeOut( 200, function() {
			request(queryURL_I,dataFilter, topicFilter, cptFilter, '#hexWrap');
		});
	});

	//Impact AJAX
	$('ul#filters.impact li a').click(function(){
		if(!$(this).hasClass('active')){
			var dataFilter = $(this).attr('data-filter');
			var topicFilter = $('#topicsList #topics').val();
			var cptFilter = $('#filters').attr('data-cpt');
			$('#hexWrap').fadeOut( 200, function() {
				request(queryURL_I,dataFilter, topicFilter, cptFilter, '#hexWrap');
			});
			$('ul#filters li a').removeClass('active');
			$(this).addClass('active');
		}
	});
	$('#topicsList select#topics.project').change(function(){
		var dataFilter = $('ul#filters.impact li a.active').attr('data-filter');
		var topicFilter = $('#topicsList #topics').val();
		var cptFilter = $('#filters').attr('data-cpt');
		$('#hexWrap').fadeOut( 200, function() {
			request(queryURL_I,dataFilter, topicFilter, cptFilter, '#hexWrap');
		});
	});



	//Network AJAX
	$('#topicsList select#topics.organization').change(function(){
		$cpt = $(this).attr('data-cpt');
		if($cpt == 'organization'){
			var dataFilter = '';
			var topicFilter = $('#topicsList #topics').val();
			var cptFilter = $cpt;
		}
		$('#hexWrap').fadeOut( 200, function() {
			request(queryURL_O,dataFilter, topicFilter, cptFilter, '#hexWrap');
		});
		$('ul#filters li a').removeClass('active');
		$(this).addClass('active');
	});



	function request(queryURL, dataFilter, topicFilter, cptFilter, targetDiv){
	    $.ajax({
	        type: 'POST',
	        url: queryURL,
	        data: {ajaxFilter : dataFilter, topicFilter : topicFilter, cptFilter : cptFilter},
	        success: function(msg) {
	            console.log(msg);
			    $(targetDiv).html(msg).fadeIn(200);
	        }
	    });
	}

	//Hex Title height trim
	$('.hex').each(function(){
	    $hideme = $(this).find('p');
	    $len = $(this).find('h4').text().length;
	    if($len > 45){
	        $hideme.remove();
	    }
	});

	// New tabs

  /* ==========
     Variables
   ========== */
   var url = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');

  /* ==========
      Utilities
    ========== */
   function beginsWith(needle, haystack){
     return (haystack.substr(0, needle.length) == needle);
   };


  /* ==========
     Anchors open in new tab/window
   ========== */
   $('a').each(function(){

     if(typeof $(this).attr('href') != "undefined") {
      var test = beginsWith( url, $(this).attr('href') );
      //if it's an external link then open in a new tab
      if( test == false && $(this).attr('href').indexOf('#') == -1){
        $(this).attr('target','_blank');
      }
     }
   });

	//Landing template 3 column height balancing
	$arr = [];
	$('.landing .entry .panel').each(function(){
		$arr.push($(this).height());
	});
	$('.landing .entry .panel').height(Math.max.apply(Math,$arr));

});
