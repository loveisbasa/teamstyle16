// common way to initialize jQuery
$(function() {
    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length != 0) {
        $('#javascript-header-demo-box').hide();
        $('#javascript-header-demo-box').text('Hello from JavaScript! This line has been added by public/js/application.js');
        $('#javascript-header-demo-box').css('color', 'green');
        $('#javascript-header-demo-box').fadeIn('slow');
    }
     $("#password").hide();
    $("#account").hide();
    $("[href$=#profile]").click(function(){
    $("#password").hide();
    $("#account").hide();
    $("#profile").toggle(200);
    
  });
    $("[href$=#account]").click(function(){
    	$("#profile").hide();
    	$("#password").hide();
    $("#account").toggle(200);
  });
    $("[href$=#password]").click(function(){
    	$("#profile").hide();
    	$("#account").hide();
    $("#password").toggle(200);
  });
});

// $(document).ready(function$(){
// $("#team-password").leanModal({ top: 100, closeButton: ".modal_close" });
// });
// });