/* globals $:false */
var width = $(window).width(),
    height = $(window).height(),
    idle,
    $slider = [],
    scrollingSpeed = 1200,
    isMobile = false,
    $root = '/moostang/';
$(function() {
    var app = {
        init: function() {
            $(window).resize(function(event) {});
            $(document).ready(function($) {
                $body = $('body');
                $container = $('#container');
                $bottombar = $('#bottom-bar');
                $image_hover = $('#image-hover');
                app.sizeSet();
                // History.Adapter.bind(window, 'statechange', function() {
                //     var State = History.getState();
                //     console.log(State);
                //     var content = State.data;
                //     // if (content.type == 'index') {
                //     //     app.loadContent(State.url, $container);
                //     // }
                //     app.loadContent(State.url, $container);
                // });
                app.fullPager();
                window.viewportUnitsBuggyfill.init();
                $body.on('click', '[data-target]', function(e) {
                    $el = $(this);
                    target = $el.attr('data-target');
                    if (target == 'project') {
                        slide = $el.attr('data-slide');
                        url = window.location.origin + $root + '#' + $el.attr('data-anchor');
                        if (slide !== '') {
                            url += '&slide=' + slide;
                        }
                    } else if (window.history && history.length > 0 && target == 'index') {
                        $body.addClass('loading');
                        setTimeout(function() {
                            window.history.go(-1);
                        }, 500);
                    } else {
                        url = $el.attr('href');
                    }
                    e.preventDefault();
                    $body.addClass('loading');
                    setTimeout(function() {
                        window.location = url;
                    }, 500);
                });
                $body.on({
                    mouseenter: function() {
                        if (!isMobile) {
                            var img = $(this).data('hover');
                            var el = $(this);
                            if (img) {
                                $image_hover.attr('src', img);
                                $image_hover.load(function() {
                                    $image_hover.show();
                                });
                            }
                        }
                    },
                    mouseleave: function() {
                        if (!isMobile) {
                            $image_hover.hide().attr('src', '');
                        }
                    }
                }, '#index-content.list [data-hover]');
                // $('body').on('click', '[data-target]', function(e) {
                //     $el = $(this);
                //     target = $el.data('target');
                //     e.preventDefault();
                //     if (target == "page") {
                //         History.pushState({
                //             type: 'page'
                //         }, $el.data('title') + " | " + $sitetitle, $el.attr('href'));
                //     } else if (target == "project") {
                //         History.pushState({
                //             type: 'project'
                //         }, $el.data('title') + " | " + $sitetitle, $el.attr('href'));
                //     } else {
                //         e.preventDefault();
                //         app.goIndex();
                //     }
                // });
                var bottombar = false;
                $(window).mousemove(function(event) {
                    if (!bottombar && event.pageY > height - height / 3) {
                        app.showBar();
                        window.clearTimeout(idle);
                        idle = setTimeout(function() {
                            app.hideBar();
                        }, 1500);
                    } else if (bottombar && event.pageY <= height - height / 3) {
                        app.hideBar();
                    }
                    // if (!bottombar) {
                    //     app.showBar();
                    //     window.clearTimeout(idle);
                    //     idle = setTimeout(function() {
                    //         app.hideBar();
                    //     }, 1500);
                    // }
                });
                $body.on('click', '[event-target="list-toggle"]', function(event) {
                    event.preventDefault();
                    $(this).toggleClass('list');
                    $('#index-content').toggleClass('list');
                });
                //esc
                $(document).keyup(function(e) {
                    if (e.keyCode === 27) app.goIndex();
                });
                $(window).load(function() {
                    $body.addClass('loaded');
                    if ($('#intro').length > 0 && !isMobile) {
                        $('#intro').click(function(event) {
                            var el = $(this);
                            el.addClass('hidden');
                            setTimeout(function() {
                                
                                    el.remove();
                    
                            }, 1300);
                        });
                    }
                });
            });
        },
        sizeSet: function() {
            width = $(window).width();
            height = $(window).height();
            // $('.index-serie h2').each(function(index, el) {
            //   $(el).css('top', $(el).parent().parent().offset().top);
            // });
            if (width <= 770) isMobile = true;
            if (isMobile) {
                scrollingSpeed = 800;
                if (width >= 770) {
                    scrollingSpeed = 1200;
                    isMobile = false;
                }
            }
        },
        hideBar: function() {
            $bottombar.removeClass('visible');
            bottombar = false;
        },
        showBar: function() {
            $bottombar.addClass('visible');
            bottombar = true;
        },
        fullPager: function() {
            $serieN = $('#serie-number span');
            $serieT = $('#serie-infos');
            $prevA = $('[event-target="prev"]');
            $nextA = $('[event-target="next"]');
            $series = $('#elevator .serie');
            hash = app.parseHash();
            app.loadSlider();
            $('#elevator').fullpage({
                //Navigation
                navigation: false,
                showActiveTooltip: false,
                slidesNavigation: false,
                //Scrolling
                scrollingSpeed: scrollingSpeed,
                autoScrolling: true,
                scrollBar: false,
                css3: true,
                easing: 'easeInOutCubic',
                easingcss3: 'cubic-bezier(0.77, 0, 0.175, 1)',
                loopHorizontal: true,
                continuousVertical: true,
                continuousHorizontal: false,
                scrollHorizontally: false,
                normalScrollElements: '',
                scrollOverflow: false,
                scrollOverflowReset: false,
                scrollOverflowOptions: null,
                //Accessibility
                keyboardScrolling: true,
                animateAnchor: false,
                recordHistory: true,
                touchSensitivity: 10,
                //Design
                controlArrows: false,
                responsiveWidth: 0,
                responsiveHeight: 0,
                responsiveSlides: false,
                //Custom selectors
                sectionSelector: '.serie',
                slideSelector: 'none',
                lazyLoading: false,
                //events
                onLeave: function(index, nextIndex, direction) {
                    $next = $series.eq(nextIndex - 1);
                    $serieN.text(nextIndex);
                    $serieT.html($next.attr('data-title') + '<br>' + $next.attr('data-subtitle'));
                },
                afterLoad: function(anchorLink, index) {
                    if ($slider.length > 0) {
                        $slider[index - 1].focus();
                        $slider[index - 1].flickity('resize');
                    }
                    if (hash) {
                        console.log(hash);
                        $.fn.fullpage.silentMoveTo(Object.keys(hash)[0]);
                        if (hash.slide) {
                            $slider[index - 1].flickity('select', hash.slide - 1, true, true);
                        }
                        hash = false;
                    }
                },
                afterRender: function() {},
                // afterResize: function() {},
                // afterResponsive: function(isResponsive) {},
                // afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex) {
                //     var nextLoad = $('#overview .slide').eq(slideIndex + 1).find('img');
                //     nextLoad.addClass('lazyload');
                // },
                // onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex) {}
            });
            $prevA.click(function(event) {
                event.preventDefault();
                $.fn.fullpage.moveSectionUp();
            });
            $nextA.click(function(event) {
                event.preventDefault();
                $.fn.fullpage.moveSectionDown();
            });
        },
        loadSlider: function() {
            $imgN = $('#image-number span');
            $('.slider').each(function(index, el) {
                $slider[index] = $(el).flickity({
                    cellSelector: '.slide',
                    imagesLoaded: false,
                    setGallerySize: false,
                    accessibility: true,
                    wrapAround: true,
                    prevNextButtons: true,
                    pageDots: false,
                    draggable: true,
                    dragThreshold: 20
                });
                $slider[index].flkty = $slider[index].data('flickity');
                $slider[index].count = $slider[index].flkty.slides.length;
                $slider[index].first('.slide').find('.lazyimg:not(".lazyloaded")').addClass('lazyload');
                $slider[index].on('select.flickity', function() {
                    if ($slider[index].flkty) {
                        $selected = $($slider[index].flkty.selectedElement);
                        $slider[index].idx = $slider[index].flkty.selectedIndex + 1;
                        $imgN.text($slider[index].idx + '/' + $slider[index].count);
                        var adjCellElems = $slider[index].flickity('getAdjacentCellElements', 2);
                        $(adjCellElems).find('.lazyimg:not(".lazyloaded")').addClass('lazyload');
                    }
                });
                $slider[index].on('staticClick.flickity', function(event, pointer, cellElement, cellIndex) {
                    if (!cellElement || !isMobile) {
                        return;
                    }
                    //app.goNext($slider[index]);
                });
            });
            // $slider.click(function(event) {
            //     if (!isMobile) {
            //         event.preventDefault();
            //         if ($body.hasClass('hover-left')) {
            //             app.goPrev($slider);
            //         } else if ($body.hasClass('hover-right')) {
            //             app.goNext($slider);
            //         }
            //     }
            // });
        },
        goNext: function($slider) {
            $slider.flickity('next', false);
        },
        goPrev: function($slider) {
            $slider.flickity('previous', false);
        },
        goIndex: function() {
            History.pushState({
                type: 'index'
            }, $sitetitle, window.location.origin + $root);
        },
        loadContent: function(url, target) {
            $body.addClass('loading');
            setTimeout(function() {
                $(window).scrollTop(0);
                $(target).load(url + ' #container .inner', function(response) {
                    setTimeout(function() {
                        if ($('#container .inner').hasClass('project')) {
                            app.loadSlider();
                        }
                        $body.removeClass('loading').addClass('loaded');
                    }, 100);
                });
            }, 1000);
        },
        parseHash: function() {
            // Remove the first character (i.e. the prepended "#").
            hash = window.location.hash;
            hash = hash.substring(1, hash.length); //remove first character (#)
            var obj = {}; //create the output
            var qa = hash.split('&'); //split all parameters in an array
            for (var i = 0; i < qa.length; i++) {
                var fra1 = qa[i].split('='); //split every parameter into [parameter, value]
                var prop = fra1[0];
                var value = fra1[1];
                if (/[0-9]/.test(value) && !isNaN(value)) { //check if is a number
                    value = parseInt(value);
                }
                obj[prop] = value; //add the parameter to the value
            }
            return obj;
        }
    };
    app.init();
});