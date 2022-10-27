let ProgressBar = (function (e) {
  var init = function () {
    if (document.readyState == "interactive") {
      var all = $("*");
      for (var i = 0, max = all.length; i < max; i++) {
        set_ele(all[i]);
      }
    }
  };

  function check_element(ele) {
    var all = $("*");
    var totalele = all.length;
    var per_inc = 100 / all.length;

    if ($(ele).on()) {
      var prog_width =
        per_inc + Number(document.getElementById("progress_width").value);
      $("#progress_width").val(prog_width);
      $("#bar1").animate({ width: prog_width + "%" }, 10, function () {
        if ($("bar1").style.width == "100%") {
          $(".progress").fadeOut("slow");
        }
      });
    } else {
      set_ele(ele);
    }
  }

  function set_ele(set_element) {
    check_element(set_element);
  }
  return {init:init}
}());

$(function() {
  ProgressBar.init()
})