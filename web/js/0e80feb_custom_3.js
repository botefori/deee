$(function(){
 
  "use strict"
  var topoffset=50; // Variable for menu height
  var slideqty=$('#featured .item').length;
  var wheight=$(window).height(); //get the height of the window
  
  $('.fullheight').css('height', wheight);
  
  // Replace IMG inside the caresoul with background image
  
  $('#featured .item img').each(function(){
    var imgSrc=$(this).attr('src');
	$(this).parent().css({'background-image': 'url('+imgSrc+')'});
	$(this).remove();
  });
  
  
  
  //adjust height of .fullheight element on window resize
  
  $(window).resize(function(){
   wheight=$(window).height();
   $('.fullheight').css('height', wheight);
  });
  
  
  //activate scrollspy
  
  $('body').scrollspy({
    target:'header .navbar',
	offset:topoffset
  });
  
  // add inbody class
      var hash=$(this).find('li.active a').attr('href');
      var wrp=$('#wrapper').height(); 
      
	  if(hash!=='#featured' && wrp!==null){
	    $('header nav').addClass('inbody');
	  }else{
	    $('header nav').removeClass('inbody');
	  }
  
  // Add an inbody class to nav when scrollspy event fires
  
  $('.navbar-fixed-top').on('activate.bs.scrollspy', function(){
      var hash=$(this).find('li.active a').attr('href');
	  if(hash!=='#featured'){
	     $('header nav').addClass('inbody');
	  }else{
		$('header nav').removeClass('inbody');
	  }
  });
  
  
  //Use smooth scrolling when clicking on navigation
  $('.navbar a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') === 
      this.pathname.replace(/^\//,'') && 
      location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top-topoffset+2
        }, 500);
        return false;
      } //target.length
    } //click function
  }); //smooth scrolling
  
  //Automatically generate carousel indicator
  for(var i=0; i<slideqty; i++){
   var insertText='<li data-target="#featured" data-slide-to="'+i+'"></li>';
   $('#featured ol').append(insertText);
  }

  $('.carousel').carousel({
    interval:1000 * 10
  });
  
  //Get the height of nav tag and set header tag height
 var navHeight=$('#menu-container').height();
 navHeight+=10;
  if(wrp!==null)
  $('#wrapper').css('margin-top', navHeight+'px');

});