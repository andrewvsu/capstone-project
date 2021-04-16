
// show/hide toggle for login
$(document).ready(function () {
  $('#Mybtn').click(function () {
    $('#MyForm').show(500);
    $('#Mybtn').hide(500);
  });
  //accordion function for clerk/manager business requirements
  $('#searchBtn').submit(function (e) {
    $('#searchBtn').parent().parent().parent().prev().addClass("active");
    e.preventDefault();
  });


});

function delPrompt() {
  var response = confirm("Deletion cannont be undone. Press OK to confirm.");

  if (response == true) {
    document.querySelector("#delProduct").value = '1';
  }
}

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