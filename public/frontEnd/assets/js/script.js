'use strict';
$(document).ready(function () {


   $("body").niceScroll({
      cursorcolor: "#FF8080",
      cursorwidth: "10px",
      cursorborder: "1px solid #fff",
      cursorborderradius: "3px",
      // touchbehavior: false,
      // emulatetouch: false,
      // dblclickzoom: true,
      horizrailenabled: false
   });


   $('.select_style').selectpicker();


   $(".preloader").delay(200).fadeOut();

   // Show Mega Menu

   /* $('.drop_mega').on('click', function(e) {
      e.stopPropagation();
      e.preventDefault();
   }); */

   $(".nav-item").hover(function () {
      $(this).children('.mega_menu').stop(true, false, true).fadeToggle();
   });

   $(document).on("click", function (event) {
      var trigger = $(".drop_mega")[0];
      var dropdown = $(".mega_menu");
      if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
         $(".mega_menu").fadeOut();
      }
   });

   // Show Cart
   $('.btn_cart').on('click', function (e) {
      e.preventDefault();
      $(this).parent('.cart').find(".cart_menu").slideToggle();
   });
   $(document).on("click", function (event) {
      var trigger = $(".btn_cart")[0];
      var dropdown = $(".cart");
      if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
         $(".cart_menu").fadeOut();
      }
   });


   $('.modal_search').hide();
   $('#show_search_modal').on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $('.modal_search').fadeIn();
   });
   $('#close_search_modal').on('click', function (e) {
      $('.modal_search').fadeOut();
   });
   $(document).on("click", function (event) {
      var trigger = $("#show_search_modal")[0];
      var dropdown = $(".modal_search");
      if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
         $(".modal_search").fadeOut();
      }
   });


   $('.show_nav').on('click', function (e) {
      $('.nav_links').toggleClass('active');
      e.stopPropagation();
   });
   $('#close_nav').on('click', function (e) {
      e.stopPropagation();
      $('.nav_links').toggleClass('active');
   });
   $('.nav_links').on('click', function (e) {
      e.stopPropagation();
   });

   $(document).click(function (e) {
      e.stopPropagation();
      $(".nav_links").removeClass('active');
   });


   $('.best_diamond').slick({
      dots: false,
      infinite: true,
      speed: 300,
      // autoplay: true,
      // autoplaySpeed: 2000,
      centerMode: true,
      centerPadding: '60px',
      cssEase: 'linear',
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [{
            breakpoint: 1024,
            settings: {
               slidesToShow: 3,
               slidesToScroll: 1,
               infinite: true,
            }
         },
         {
            breakpoint: 600,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }
         },
         {
            breakpoint: 480,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }
         }
         // You can unslick at a given breakpoint now by adding:
         // settings: "unslick"
         // instead of a settings object
      ],
      prevArrow: "<img src='/frontEnd/assets/js/slick/left.png' />",
      nextArrow: "<img src='/frontEnd/assets/js/slick/right.png' />",
   });


   $('.our_gallery').slick({
      dots: false,
      infinite: true,
      speed: 300,
      autoplay: true,
      autoplaySpeed: 2000,
      centerPadding: '60px',
      cssEase: 'linear',
      arrows: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [{
            breakpoint: 1024,
            settings: {
               slidesToShow: 3,
               slidesToScroll: 1,
               infinite: true,
            }
         },
         {
            breakpoint: 600,
            settings: {
               slidesToShow: 2,
               slidesToScroll: 1
            }
         },
         {
            breakpoint: 480,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }
         }

      ]
   });


   $('.slide_partner').slick({
      dots: false,
      infinite: true,
      speed: 300,
      autoplay: true,
      autoplaySpeed: 2000,
      centerPadding: '60px',
      cssEase: 'linear',
      arrows: false,
      slidesToShow: 6,
      slidesToScroll: 2,
      responsive: [{
            breakpoint: 1024,
            settings: {
               slidesToShow: 4,
               slidesToScroll: 1,
               infinite: true,
            }
         },
         {
            breakpoint: 600,
            settings: {
               slidesToShow: 3,
               slidesToScroll: 1
            }
         },
         {
            breakpoint: 480,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }
         }

      ]
   });


   $('.slide_related').slick({
      dots: false,
      infinite: true,
      speed: 300,
      autoplay: false,
      autoplaySpeed: 2000,
      centerPadding: '60px',
      centerMode: false,
      cssEase: 'linear',
      arrows: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [{
            breakpoint: 1024,
            settings: {
               slidesToShow: 2,
               slidesToScroll: 1,
               infinite: true,
            }
         },
         {
            breakpoint: 600,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }
         },
         {
            breakpoint: 480,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }
         }

      ]
   });

   // Style Grid & List
   $(".view_style a").on('click', function () {
      $(this).addClass('active').siblings().removeClass('active');
      $('.items_view').removeClass('grid_view list_view').addClass($(this).data('class'));
   });


   // Range Price
   (function () {

      var parent = document.querySelector(".range-slider");
      if (!parent) return;

      var
         rangeS = parent.querySelectorAll("input[type=range]"),
         numberS = parent.querySelectorAll("input[type=number]");

      rangeS.forEach(function (el) {
         el.oninput = function () {
            var slide1 = parseFloat(rangeS[0].value),
               slide2 = parseFloat(rangeS[1].value);

            if (slide1 > slide2) {
               [slide1, slide2] = [slide2, slide1];
               // var tmp = slide2;
               // slide2 = slide1;
               // slide1 = tmp;
            }

            numberS[0].value = slide1;
            numberS[1].value = slide2;
         }
      });

      numberS.forEach(function (el) {
         el.oninput = function () {
            var number1 = parseFloat(numberS[0].value),
               number2 = parseFloat(numberS[1].value);

            if (number1 > number2) {
               var tmp = number1;
               numberS[0].value = number2;
               numberS[1].value = tmp;
            }

            rangeS[0].value = number1;
            rangeS[1].value = number2;

         }
      });


   })();


   $("#grid").on('click', function () {
      $(this).addClass('active').siblings().removeClass('active');
      $(".this_grid > div").removeClass('col-lg-4 col-md-6 col-sm-6').addClass('col-lg-12 col-md-12 col-sm-12');
   });
   $("#list").on('click', function () {
      $(this).addClass('active').siblings().removeClass('active');
      $(".this_grid > div").removeClass('col-lg-12 col-md-12 col-sm-12').addClass('col-lg-4 col-md-6 col-sm-6')
   });



   /* Product Details Slider */
   $('.slide_big_imgs').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider_thumb'
   });
   $('.slider_thumb').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slide_big_imgs',
      dots: false,
      focusOnSelect: true,
      infinite: true,
      centerMode: false,
      centerPadding: '50s0px',
      prevArrow: "<img src='/frontEnd/assets/js/slick/left.png' class='left_arrow' />",
      nextArrow: "<img src='/frontEnd/assets/js/slick/right.png' class='right_arrow' />",
      responsive: [{
            breakpoint: 768,
            settings: {
               arrows: false,
               centerMode: true,
               slidesToShow: 2
            }
         },
         {
            breakpoint: 480,
            settings: {
               arrows: false,
               centerMode: true,
               slidesToShow: 2
            }
         }
      ]
   });


   // Minus && Plus
   $('.minus').click(function () {
      var $input = $(this).parent().find('input');
      var count = parseInt($input.val()) - 1;
      count = count < 0 ? 0 : count;
      $input.val(count);
      $input.change();
      return false;
   });
   $('.plus').click(function () {
      var $input = $(this).parent().find('input');
      $input.val(parseInt($input.val()) + 1);
      $input.change();
      return false;
   });





   /*
    *If it doesn't count exactly then click on Run button.
    *Special thanks to https://codepen.io/shshaw/pen/gEiDt
    *and https://codepen.io/chriscoyier/pen/AzdcK
    *and Special thanks to @TimPietrusky for count JS...
    *2014 by Kaushalya Mandaliya
    *https://twitter.com/kmandalwala
    */
   (function () {
      var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
         window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
      window.requestAnimationFrame = requestAnimationFrame;
   })();

   var loader = document.querySelector('[data-js="loader--alpha"]'),
      start = null,
      time = 50000,
      max_value = 100;

   /**
    * 
    * Creates a requeastAnimationFrame function to increase
    * the value of a data-attribute to 100%;
    *
    */
   function step(timestamp) {
      // Save the progress
      var progress;

      // Get the start time
      if (start === null) {
         start = timestamp;
      }

      // Calculate the progress
      progress = timestamp - start;

      // If not progressed
      if (progress < time) {
         loader.dataset.value = (progress / time * max_value).toPrecision(2);
         requestAnimationFrame(step);

         // Finished
      } else {
         loader.dataset.value = 100;
         start = null;
         requestAnimationFrame(step);
      }
   }

   // Start animation
   requestAnimationFrame(step);






   // $(window).scroll(function () {
   //    $(".img_jeww").css({
   //       top: "0"
   //    });
   // });

   var lastScrollTop = '-50px';
   $(window).scroll(function (event) {
      var st = $(this).scrollTop();
      if (st > lastScrollTop) {
         $('.img_jeww').animate({
            top: '0',
            'background-position': 'left top -4672px'
         }, 10);
      } else {
         $('.img_jeww').animate({
            top: '-80',
            'background-position': 'left top 0px'
         }, 10);
      }
      lastScrollTop = st;
   });



   $('.parallax-window').parallax({
      speed: .3
   });

   $('.gallery_img').magnificPopup({
      type: 'image',
      gallery:{
         enabled:true
      }
   });


});
