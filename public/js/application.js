// common way to initialize jQuery
$(function() {
    // simple demo to show create something via javascript on the page
     $("#password").hide();
    $("#nickname").hide();
    $("#email").hide();
    $("[href$=#profile]").click(function(){
    $("#password").hide();
    $("#nickname").hide();
    $("#email").hide();
    $("#profile").show(100);
    
  });
    $("[href$=#nickname]").click(function(){
    	$("#profile").hide();
    	$("#password").hide();
            $("#email").show(100);
    $("#nickname").show(100);
  });
    $("[href$=#password]").click(function(){
    	$("#profile").hide();
    	$("#nickname").hide();
            $("#email").hide();
    $("#password").show(100);
  });
});

// $(document).ready(function$(){
// $("#team-password").leanModal({ top: 100, closeButton: ".modal_close" });
// });
// });