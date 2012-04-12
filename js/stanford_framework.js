// Sticky Footer
function positionFooter() {
  var Footer = $("#sticky-footer");
  if ((($(document.body).height() + Footer.height()) < $(window).height() && Footer.css("position") == "fixed") || ($(document.body).height() < $(window).height() && Footer.css("position") != "fixed")) {
	Footer.css({ position: "fixed", bottom: "120px" });
  }
  else {
	Footer.css({ position: "static" });
  }
}

// Sticky Global Footer
function positionGlobalfooter() {
  var Globalfooter = $("#global-footer");
  if ((($(document.body).height() + Globalfooter.height()) < $(window).height() && Globalfooter.css("position") == "fixed") || ($(document.body).height() < $(window).height() && Globalfooter.css("position") != "fixed")) {
	Globalfooter.css({ position: "fixed", bottom: "0px" });
  }
  else {
	Globalfooter.css({ position: "static" });
  }
}

$(document).ready(function () {
  positionFooter();
  $(window).scroll(positionFooter);
  $(window).resize(positionFooter);
  $(window).load(positionFooter);
  positionGlobalfooter();
  $(window).scroll(positionGlobalfooter);
  $(window).resize(positionGlobalfooter);
  $(window).load(positionGlobalfooter);
});