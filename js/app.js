
// show/hide toggle for login
$(document).ready(function () {
  $('#Mybtn').click(function () {
    $('#MyForm').show(500);
    $('#Mybtn').hide(500);
  });
});

$('#searchBtn').submit(function (e) {
  $('#searchBtn').parent().parent().parent().prev().addClass("active");
  e.preventDefault();
});
//accordion function for clerk/manager business requirements
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}