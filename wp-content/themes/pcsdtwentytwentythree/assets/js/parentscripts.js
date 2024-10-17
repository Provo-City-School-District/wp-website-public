/*
=============================================================================================================
Slider controls
=============================================================================================================
*/
jQuery(document).ready(function () {
  jQuery(".departmentNews").slick({
    autoplay: true,
    arrows: false,
    mobileFirst: true,
    autoplaySpeed: 10000,
  });
});
jQuery(document).ready(function () {
  jQuery("#announcments .slick-wrapper").slick({
    autoplay: true,
    autoplaySpeed: 10000,
  });
});
/*
=============================================================================================================
Post Featured Gallery Slider controls
=============================================================================================================
*/
jQuery(".featured-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: ".featured-nav",
  adaptiveHeight: true,
});
jQuery(".featured-nav").slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  asNavFor: ".featured-for",
  centerMode: true,
  focusOnSelect: true,
});
/*
=============================================================================================================
accordion
=============================================================================================================
*/
jQuery(".accordion li").click(function () {
  jQuery(this).toggleClass("active");
});
/*
==========================================================
accordion using a header 3 as the control and a div beneath as the panel
==========================================================
*/
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
/*
=============================================================================================================
Directory Live Page Search
=============================================================================================================
*/
jQuery(document).ready(function () {
  jQuery("#filter").keyup(function () {
    // Retrieve the input field text and reset the count to zero
    var filter = jQuery(this).val(),
      count = 0;

    // Loop through the post list
    jQuery(".postgrid .post").each(function () {
      // If the list item does not contain the text phrase fade it out
      if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
        //jQuery(this).addClass('hide');
        jQuery(this).fadeOut();

        // Show the list item if the phrase matches and increase the count by 1
      } else {
        jQuery(this).show();
        count++;
      }
    });
  });
});
jQuery(document).ready(function () {
  jQuery("#sidebar-filter").keyup(function () {
    // Retrieve the input field text and reset the count to zero
    var filter = jQuery(this).val(),
      count = 0;

    // Loop through the post list
    jQuery(".directory .post").each(function () {
      // If the list item does not contain the text phrase fade it out
      if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
        //jQuery(this).addClass('hide');
        jQuery(this).fadeOut();

        // Show the list item if the phrase matches and increase the count by 1
      } else {
        jQuery(this).show();
        count++;
      }
    });
  });
});

/*
=============================================================================================================
sort list alpha by giving it the class sortList
=============================================================================================================
*/
jQuery(window).on("load", function () {
  var elem = jQuery(".sortList"); //replace this with your list selector
  sortList(elem);
  function sortList($elem) {
    var $li = $elem.find("li"),
      $listLi = jQuery($li, $elem).get();
    $listLi.sort(function (a, b) {
      var keyA = jQuery(a).text().toUpperCase();
      var keyB = jQuery(b).text().toUpperCase();
      return keyA < keyB ? -1 : 1;
      //uncomment below and comment above if you want descending order
      //return (keyA > keyB) ? -1 : 1;
    });
    jQuery.each($listLi, function (index, row) {
      $elem.append(row);
    });
  }
});

//Clicking the X on the alert will close the alert section. it will also set a cookie with the name "alert"
jQuery(".closeAlert").click(function () {
  jQuery(".alerts").css("display", "none");
  setcookie("alert");
});
//function used to read cookies in browser
function getCookie(cName) {
  const name = cName + "=";
  const cDecoded = decodeURIComponent(document.cookie); //to be careful
  const cArr = cDecoded.split("; ");
  let res;
  cArr.forEach((val) => {
    if (val.indexOf(name) === 0) res = val.substring(name.length);
  });
  return res;
}
//if a cookie named "alert" exists the alert box will automatically close
if (getCookie("alert")) {
  // Re-direct to this page
  jQuery(".alerts").css("display", "none");
}

/*
=============================================================================================================
Set cookie that expires at the end of the day
=============================================================================================================
*/
function setcookie(cname, cvalue) {
  var now = new Date();
  var expire = new Date();

  expire.setFullYear(now.getFullYear());
  expire.setMonth(now.getMonth());
  expire.setDate(now.getDate() + 1);
  expire.setHours(0);
  expire.setMinutes(0);
  expire.setSeconds(0);

  var expires = "expires=" + expire.toString();
  document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}

/*
=============================================================================================================
If cookie alertcookie is found strip active tag from active alerts
=============================================================================================================
*/
jQuery(document).ready(function () {
  if (Cookies.get("alertcookie") == "yes") {
    jQuery("#distAlerts .theAlerts").removeClass("active");
  }
});
