$(window).on('load', function () {
    init();
});
var timerSFN, timerSC, timerPC;
var menuState = false;
var $mainContent, $el;
var nbCaptions = 0;
var archiveBool = false;

function init() {
    var wh = $(window).height();
    var wv = $(window).width();
    var docScroll = 0;
    var nbImgs = $('.article-content-image').length;

    function buildDataN() {
        for (i = 0; i < nbImgs; i++) {
            $('.article-content-image').eq(i).attr('data-n', i);
        }
        nbCaptions = $('a.footnote-ref').length;
        for (i = 0; i < nbCaptions; i++) {
            $('a.footnote-ref').eq(i).attr('data-n', i);
            $('.footnote-content p').eq(i).before('<div class="footnote-number tab" >' + (i + 1) + '</div>');
        }
    }

    function checkMenuState() {
        if (menuState) {
            $('.nav-icon').trigger('click');
        }
    }

    $('.nav-icon').on('click', function () {
        $('.nav-wrapper').toggleClass("nav-is-active");
        if (!menuState) {
            menuState = true;
        } else {
            menuState = false;
        }
    });

    function flickity() {
        var $gallery = $('.home-slideshow').flickity({
            cellSelector: '.home-slide',
            contain: true,
            wrapAround: true,
            setGallerySize: false,
            percentPosition: false,
            pageDots: false,
            lazyLoad: true
        });
        var $caption = $('.article-footer-caption');
        var flkty = $gallery.data('flickity');
        $gallery.on('select.flickity', function () {
            var flkty = $(this).data('flickity');
            var element = flkty.selectedElement;
            var captionText = $(element).find('.home-caption').html();
            $caption.html(captionText);
        });
    }

    function titleScrolled() {
        $(document).on('scroll', function () {
            var scrollTop = $(this).scrollTop();
            $('.content').each(function () {
                var topDistance = $(this).offset().top;
                if ((topDistance) < scrollTop) {
                    $('.nav-center').addClass('is-scrolled');
                } else {
                    $('.nav-center').removeClass('is-scrolled');
                }
            });
        });
    }

    function endScrolled() {
        $(document).on('scroll', function () {
            var scrollTop = $(this).scrollTop();
            $('.article-infos, .footnotes').each(function () {
                var topDistance = $(this).offset().top;
                if ($(this).visible(true)) {
                    $('.article-footer').addClass('is-scrolled');
                } else {
                    $('.article-footer').removeClass('is-scrolled');
                }
            });
        });
    }

    function goToTop() {
        $('.article-end-top').on('click', function () {
            $('body, html').animate({
                scrollTop: 0
            }, 600);
        });
    }

    function buildCaption() {
        $('.article-content-image').each(function (e) {
            var myN = $(this).attr('data-n');
            var caption = $(this).find('figcaption').html();
            if (typeof caption === 'undefined') {
                caption = '';
            }
            $('.article-footer-wrapper').html($('.article-footer-wrapper').html() + '<div class="article-footer-item" id="caption-' + myN + '" >' + caption + '</div>');
        });
    }

    function showCaption() {
        $(document).on('scroll',function() {
          docScroll = $(document).scrollTop();
          $('.article-content-image').each(function (e) {
              var myN = $(this).attr('data-n');
              var myOffset = Math.round($(this).offset().top + ($(this).outerHeight(true) / 2));
              if ($(this).visible(true) && parseInt(docScroll + (9 / 10 * wh)) >= myOffset && parseInt(docScroll + (1 / 10 * wh)) <= myOffset) {
                  $('#caption-' + myN).addClass('is-active');
              } else {
                  $('#caption-' + myN).removeClass('is-active');
              }
          });
        })

    }
    //timerSC = setInterval(showCaption, 500);


    function homeCaption() {
        if ($("#archive").length) {

            $(document).on('scroll', function () {
                docScroll = $(document).scrollTop();
                archiveY = $("#archive").offset().top - (1/2 * wh);
                if(docScroll < archiveY){
                    $('.home-single-wrapper').each(function () {
                        //console.log(archiveY);
                        var myN = $(this).attr('data-n');
                        var topDistance = $(this).offset().top - (1 / 2 * wh);
                        //var scrollTop = $(this).scrollTop();
                        //console.log(docScroll);
                        if (topDistance < docScroll) {
                            //console.log(myN);
                            $('.home-caption-item').removeClass('is-active');
                            $('#caption-' + myN).addClass('is-active');
                        } else {
                            $('#caption-' + myN).removeClass('is-active');
                        }
                    });
                }else{
                  var archiveScroll = $("#archive").scrollLeft();
                  $('.home-multi-wrapper').each(function () {
                      var myN = $(this).attr('data-n');
                      var leftDistance = $(this).get(0).offsetLeft;
                      //console.log(leftDistance);
                      if(archiveScroll > leftDistance-200 && archiveScroll < leftDistance +100) {
                          //console.log(myN);
                          $('.home-caption-item').removeClass('is-active');
                          $('#caption-' + myN).addClass('is-active');
                      }
                  });
                }
            });
        }

        $('.home-multi-wrapper').on('mouseover', function () {
            $('.home-caption-item').removeClass('is-active');
            var myN = $(this).attr('data-n');
            $(this).addClass('is-active');
            $('#caption-' + myN).addClass('is-active');
            //console.log($(this).offsetLeft);
        });

        $('#archive').on('scroll', function () {
            //archiveWidth = $(this).offset().width;
            archiveScroll = $(this).scrollLeft();
            //homeOffset = $('#home').offset().left;
            //console.log(archiveScroll);
            //console.log($('.home-multi-wrapper')[0].offsetLeft);
            $('.home-multi-wrapper').each(function () {
                var myN = $(this).attr('data-n');
                var leftDistance = $(this).get(0).offsetLeft;
                //console.log(leftDistance);
                if(archiveScroll > leftDistance-200 && archiveScroll < leftDistance +100) {
                    $('.home-caption-item').removeClass('is-active');
                    $('#caption-' + myN).addClass('is-active');
                }
            });
        });
    }

    function buildFootnote() {
        $('a.footnote-ref').each(function () {
            var myhref = $(this).attr('href');
            var myN = $(this).attr('data-n');
            var myid = $('li' + myhref + '');
            var fncontent = $('.article-content-text .footnotes').find(myid).html();
            $('.article-footer-wrapper').html($('.article-footer-wrapper').html() + '<div class="article-footer-item" id="footnote-' + myN + '" >' + fncontent + '</div>');
        });
    }

    function showFootnote() {
        $(document).on('scroll',function (){
            docScroll = $(document).scrollTop();
            $('.footnote-ref').each(function (e) {
                var myN = $(this).attr('data-n');
                var myOffset = Math.round($(this).offset().top);
                if ($(this).visible(true) && parseInt(docScroll + (3 / 4 * wh)) >= myOffset && parseInt(docScroll + (1 / 4 * wh)) < myOffset) {
                    $('#footnote-' + myN).addClass('is-active');
                } else {
                    $('#footnote-' + myN).removeClass('is-active');
                }
            });
        });
    }
    //timerSFN = setInterval(showFootnote, 500);

    function showFootnoteOnclick() {
        $('a.footnote-ref').on('click', function () {
            clearInterval(timerSFN);
            timerSFN = 0;
            var myN = $(this).attr('data-n');
            $('.article-footer-item').removeClass('is-active');
            $('#footnote-' + myN).addClass('is-active');
            $(document).on('scroll', function () {
                if (timerSFN == 0) {
                    timerSFN = setInterval(showFootnote, 500);
                    $('#viewport').off('scroll');
                }
            });
            return false;
        });
    }

    function backToRef() {
        $('a.footnote-backref').on('click', function (e) {
            e.preventDefault();
            var navheight = $('.nav-bar').height();
            var fontsize = $('.article-content-text p').css('font-size');
            var position = $($(this).attr("href")).offset().top;
            var speed = 600;
            var finalpos = position - (wh / 2);
            $('body, html').animate({
                scrollTop: finalpos
            }, speed);
            return false;
        });
    }

    function mobileFootnote() {
        $('a.footnote-ref, a.footnote-backref').click(function () {
            var navheight = $('.nav-bar').outerHeight();
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - navheight
                    }, 600);
                    return false;
                }
            }
        });
    }

    function pageCounter() {
        var _currentScroll;
        var $text = $('.article');
        var $console = $('.pagin');
        var h = $text.height();
        var pages = Math.round(h / wh);

        function counter() {
            var h = $text.height();
            var pages = Math.round(h / wh);
            var cs = $(document).scrollTop() + wh / 2;
            var currentpage = Math.round(cs / wh);
            $console.html('<p>' + currentpage + '/' + pages + '</p>');
        }
        timerPC = setInterval(counter, 100);
    }

    function subMenu() {
        $(document).on("scroll", onScroll);
        $('a.secondary-nav').on('click', function (e) {
            e.preventDefault();
            $(document).off("scroll");
            $('a.secondary-nav').each(function () {
                $(this).removeClass('active');
            })
            $(this).addClass('active');
            var target = this.hash,
                menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top + 2
            }, 500, 'swing', function () {
                history.pushState({}, "page", target);
                $(document).on("scroll", onScroll);
            });
        });
    }

    function onScroll(event) {
        var scrollPos = $(document).scrollTop();
        $('a.secondary-nav').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            var ht = refElement.height() + parseInt(refElement.css('padding-top')) + parseInt(refElement.css('padding-bottom'));
            if (refElement.position().top <= scrollPos && refElement.position().top + ht > scrollPos) {
                $('a.secondary-nav').removeClass("active");
                currLink.addClass("active");
            } else {
                currLink.removeClass("active");
            }
        });
    }

    function galleryBuilder(event) {
        var $imgsInPage = $('.article img');
        var nImgs = $imgsInPage.length;
        var tabSrc = Array();
        var myGallery = '';
        for (i = 0; i < nImgs; i++) {
            var src = $($imgsInPage[i]).attr('data-src');
            var imgCaption = $($imgsInPage[i]).parent().find('figcaption').html();
            if (typeof imgCaption === 'undefined') {
                imgCaption = '';
            }
            tabSrc[i] = src;
            myGallery += '<div class="article-gallery-slide"><img class="article-gallery-img" data-src="' + src + '" data-n="' + i + '" /><div class="article-gallery-slide-caption">' + imgCaption + '</div>';
        }
        $('.article-gallery-slideshow').append(myGallery);
        $('.article-content-image').on('click', function (e) {
            var myN = $(this).attr('data-n');
            flkty.selectedIndex = parseInt(myN);
            loadPicToGallery();
            $('.article-gallery').addClass('is-active');
            updateStatus();
        });

        function loadPicToGallery() {
            for (a = 0; a < $imgsInPage.length; a++) {
                var myN = $($imgsInPage[a]).parent().attr('data-n');
                var mySrc = $($imgsInPage[a]).attr('data-src');
                var imgHd = mySrc.replace('-1200', '-2000');
                $('img.article-gallery-img[data-n=' + myN + ']').attr('src', imgHd);
            }
        }

        if ($('.article-gallery-slideshow').length > 0) {
            var flkty = new Flickity('.article-gallery-slideshow', {
                cellSelector: '.article-gallery-slide',
                contain: true,
                wrapAround: true,
                setGallerySize: false,
                percentPosition: false,
                pageDots: false
            });
            var carouselStatus = document.querySelector('.article-gallery-counter');
            flkty.on('select', updateStatus);
        }


        function updateStatus() {
            var slideNumber = flkty.selectedIndex;
            $('.article-gallery-slide').removeClass('is-selected');
            $('.article-gallery-slide').eq(slideNumber).addClass('is-selected');
            carouselStatus.textContent = parseInt(slideNumber + 1) + '/' + flkty.slides.length;
        }
    }

    function closeGallery() {
        $('button.article-gallery-close').on('click', function () {
            $('.article-gallery').removeClass('is-active');
            $('.article-gallery-slide').removeClass('is-selected');
        });
    }

    function tableToggle() {
        $('.equipes-content-year').on('click', function () {
            $(this).next('.equipes-content-hidden').toggle();
        });
    }

    function lazyLoad() {
        var myLazyLoad = new LazyLoad({
            elements_selector: ".lazy",
            load_delay: 150
        });
        if ($('#archive').length){

            var secondLazyLoad = new LazyLoad({
                elements_selector: ".lazy",
                container: document.getElementById('archive'),
                callback_loaded: function(el){
                    if (el.classList.contains("home-multi-image")){
                        el.parentNode.parentNode.style.width = el.width + "px"
                    }
                }
            });
        }
    }

    function indexSort() {
        $('a.sort').on('click', function (e) {
            e.preventDefault();
            $('#button-next-issues').addClass("sorting");
            var thislink = $(this);
            sortTable(thislink);
        });
    }

    function sortTable(thislink) {
        var sb = thislink.data("sortby");
        var desc = thislink.data("sortdir");
        var theselinks = $(".sort[data-sortby='" + sb + "']")
        var othersort = $(".sort").not(theselinks);
        var newdesc = (desc == "DESC") ? "ASC" : "DESC";
        thislink.data("sortdir", newdesc);
        thislink.attr("data-sortdir", newdesc);
        theselinks.addClass("selected");
        othersort.removeClass("selected");
        $('.entry-item').sortElements(function (a, b) {
            if (desc == "DESC") {
                return $(a).data(sb) < $(b).data(sb) ? 1 : -1;
            } else {
                return $(a).data(sb) > $(b).data(sb) ? 1 : -1;
            }
        });
    }

    function archiveToggle(){
      $('.archive').addClass("hidden-archive");
      $("#button-next-issues").on('click',function(e){
        archiveBool = !archiveBool;
        if (archiveBool){
          $("#button-next-issues").addClass("button-activate");
          $('.archive').removeClass("hidden-archive");
        }else{
          $("#button-next-issues").removeClass("button-activate");
          $('.archive').addClass("hidden-archive");
        }
      })
    }

    function search() {
        $('input#search').on('keyup', function () {
            var searchTerm = $(this).val().toLowerCase();
            $('.entry, .entry-available').each(function () {
                var lineStr = $(this).text().toLowerCase();
                if (lineStr.indexOf(searchTerm) === -1) {
                    $(this).hide();
                } else {
                    if($(this).hasClass("archive")){
                      $(this).css("display","flex");
                    }else{
                      $(this).show();
                    }
                }
            });
        });
    }

    function escape(e) {
        $(document).keyup(function (e) {
            if (e.keyCode == 27) {
                $('.article-gallery').removeClass('is-active');
                $('.nav-wrapper').removeClass('nav-is-active');
                menuState = false;
            }
        });
    }

    function newTab() {
        $('.a-propos a[href^="http://"], .footnotes a[href^="http://"], .article-footer a[href^="http://"]').attr('target', '_blank')
        $('.a-propos a[href^="https://"], .footnotes a[href^="https://"], .article-footer a[href^="https://"]').attr('target', '_blank')
    }

    function emptySearch() {
        $('#search').val('');
    }

    function load() {
        $('a.item').on('click', function (e) {
            if ( e.ctrlKey || e.metaKey ) {
               return;
            }
            else {
                e.preventDefault();
                var i = $(this);
                var href = $(i).attr("href");
                var index = $(i).attr('data-page');
                var pageactive = $('.load').attr('data-page');

                if (index != pageactive) {
                    NProgress.start();
                    history.pushState(null, null, href);
                    loadContent(href);
                    NProgress.done();
                }
            }

        });
    }

    function hackFirefoxWidthBug() {
        $(window).on('resize', function () {
          imageWidth = $(".home-multi-image").first().width()
          containerWidth = $(".home-multi").first().width()
          if (containerWidth != imageWidth){
              $(".home-multi").each(function(){
                  $(this).width(imageWidth);
              });
          }
        });
    }

    buildDataN();
    checkMenuState();
    flickity();
    goToTop();
    buildCaption();
    buildFootnote();
    galleryBuilder();
    closeGallery();
    tableToggle();
    lazyLoad();
    indexSort();
    archiveToggle();
    search();
    newTab();
    emptySearch();
    load();
    $mainContent = $(".site");

    if (wv > 768) {
        showFootnoteOnclick();
        titleScrolled();
        endScrolled();
        showCaption();
        homeCaption();
        showFootnote();
        pageCounter();
        subMenu();
        escape();
        backToRef();
        hackFirefoxWidthBug();
    } else {
        mobileFootnote();
    }
};

function loadContent(href) {
    $mainContent.hide();
    $('.nav-left').load(href + ' .ajax-nav-left');
    $mainContent.load(href + ' .load', function () {
        if ($('#temp').length == 0) {
            $('body').append('<div id="temp"></div>');
        }
        $('#temp').load(href + ' title', function () {
            var cleanTitle = $('#temp').text();
            document.title = cleanTitle;
            $(this).remove();
        });
        updateMenu();
        endEvents();
        init();
        $('.nav-left').show();
        $mainContent.show();
    });
}

$(window).on("popstate", function () {
    link = location.pathname.replace(/^.*[\\/]/, "");
    NProgress.start();
    loadContent(link);
    NProgress.done();
});

function updateMenu() {
    var active = $('.load').attr('data-page');
    $('.menu-items').removeClass('active');
    $('.menu-item-' + active).addClass('active');
}

$(window).on('resize', function (e) {
    wh = $(window).height();
    wv = $(window).width();
});

function endEvents() {
    clearInterval(timerSFN);
    clearInterval(timerSC);
    clearInterval(timerPC);
    $(window).off('scroll, resize');
    $('body').off('click');
    $('*').off('click');
    $(document).off("scroll");
    $('body, html').off("scroll");
    $('*').off('keyup');
}
