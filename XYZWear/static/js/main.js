'use strict'
var navOpenBtn = document.getElementById("navOpenBtn");
var navCloseBtn = document.getElementById("navCloseBtn");
var mainNavUl = document.getElementById("mainNavUl");
var overlay = document.getElementById("overlay");

var mainNav = document.getElementById("mainNav");
navOpenBtn.onclick = function () {
  mainNav.classList.add("mainNavShow");
  overlay.style.display = "block";
}
navCloseBtn.onclick = function () {
  mainNav.classList.remove("mainNavShow");
  overlay.style.display = "none";
}

//---------------- subNav
var openSubNavBtns = document.getElementsByClassName("openSubNavBtn");
var hasChilds = document.getElementsByClassName("hasChild");
function openSubNav(ele) {
  var thisSubNavUl = ele.previousElementSibling;
  var i;
  for (i=0;i<=openSubNavBtns.length-1;i++) {
    if (openSubNavBtns[i] != ele) {
      openSubNavBtns[i].previousElementSibling.classList.remove("subNavUlShow");
    }
  }
  thisSubNavUl.classList.toggle("subNavUlShow");
}

//---------------- subCategory
var openSubCategoryBtns = document.getElementsByClassName("openSubCategoryBtn");
var hasChildCategories = document.getElementsByClassName("hasChildCategory");
function openSubCategory(ele) {
  var thisSubCategory = ele.previousElementSibling;
  var i;
  for (i=0;i<=openSubCategoryBtns.length-1;i++) {
    if (openSubCategoryBtns[i] != ele) {
      openSubCategoryBtns[i].previousElementSibling.classList.remove("subCategoryShow");
    }
  }
  thisSubCategory.classList.toggle("subCategoryShow");
}


// ----------------------------- marquee
(function($) {
  $.fn.textWidth = function(){
    var calc = '<span style="display:none">' + $(this).text() + '</span>';
    $('body').append(calc);
    var width = $('body').find('span:last').width();
    $('body').find('span:last').remove();
    return width;
  };

  $.fn.marquee = function(args) {
    var that = $(this);
    var textWidth = that.textWidth(),
        offset = that.width(),
        width = offset,
        css = {
          'text-indent' : that.css('text-indent'),
          'overflow' : that.css('overflow'),
          'white-space' : that.css('white-space')
        },
        marqueeCss = {
          'text-indent' : width,
          'overflow' : 'hidden',
          'white-space' : 'nowrap'
        },
        args = $.extend(true, { count: -1, speed: 1e1, leftToRight: false }, args),
        i = 0,
        stop = textWidth*-1,
        dfd = $.Deferred();

    function go() {
      if(!that.length) return dfd.reject();
      if(width == stop) {
        i++;
        if(i == args.count) {
          that.css(css);
          return dfd.resolve();
        }
        if(args.leftToRight) {
          width = textWidth*-1;
        } else {
          width = offset;
        }
      }
      that.css('text-indent', width + 'px');
      if(args.leftToRight) {
        width++;
      } else {
        width--;
      }
      setTimeout(go, args.speed);
    };
    if(args.leftToRight) {
      width = textWidth*-1;
      width++;
      stop = offset;
    } else {
      width--;            
    }
    that.css(marqueeCss);
    go();
    return dfd.promise();
  };
})(jQuery);