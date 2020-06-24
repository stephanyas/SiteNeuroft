//Cria a barra azul que fica na Navbar
$(function() {
    var $el,
      leftPos,
      newWidth,
      $mainNav = $(".navbar-nav");
  
    $mainNav.append("<li id='magic-line' class='d-none d-md-block'></li>");
    var $magicLine = $("#magic-line");
  
    $magicLine
      .width($(".active").width())
      .css("left", $(".active a").position().left)
      .data("origLeft", $magicLine.position().left)
      .data("origWidth", $magicLine.width());
  
    $(".navbar-nav li a").hover(
      function() {
        $el = $(this);
        leftPos = $el.position().left;
        newWidth = $el.parent().width();
        $magicLine.stop().animate({
          left: leftPos,
          width: newWidth
        });
      },
      function() {
        $magicLine.stop().animate({
          left: $magicLine.data("origLeft"),
          width: $magicLine.data("origWidth")
        });
      }
    ); 
    
});

//Faz a barra da Navbar ficar parada na Section selecionada  
$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop()+80;
    
		// Assign active class to nav links while scolling
		$('.page-section').each(function(i) {
				if ($(this).position().top <= scrollDistance) {
            
            $('.nav-item').removeClass('active');
            $('.nav-item').eq(i).addClass('active');

            var $magicLine = $("#magic-line");
          
            $magicLine
              .width($(".nav-item.active").width())
              .css("left", $(".nav-item.active").position().left)
              .data("origLeft", $magicLine.position().left)
              .data("origWidth", $magicLine.width());
				}
		});
}).scroll();

$('.navbar-nav>li>a').on('click', function(){
  $('.navbar-collapse').collapse('hide');
});


