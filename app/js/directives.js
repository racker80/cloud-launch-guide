'use strict';

/* Directives */

var directives = angular.module('myApp.directives', []);

// simple fade in animation for a touch of class...
directives.directive('fadeIn', function () {
    return {
        compile:function (elm) {
            // $(elm).css('opacity', 0.0);
            return function (scope, elm, attrs) {
                // $(elm).animate({ opacity:1.0 }, 1500);
            };
        }
    };
});

// this is the angular way to stop even propagation 
directives.directive('stopEvent', function () {
    return {
        restrict:'A',
        link:function (scope, element, attr) {
            element.bind(attr.stopEvent, function (e) {
                e.stopPropagation();
            });
        }
    }
});


directives.directive('toggleNav', function(){
    return {
        restrict:'A',
        link: function(scope, element, attr) {

            element.bind('click', function(){
                var nav = scope.navState;

                if (nav == 'open') {
                    $('#nav-index-wrapper').show();
                    // angular.element(element.children('img').addClass('close'));
                    $('#toggle-nav img').addClass('close');
                }
                $('#nav-index-wrapper').slideToggle('fast', function(){
                    if ($('#nav-index-wrapper').is(':visible')) {
                        $('#toggle-nav img').addClass('close');
                        scope.navState = 'open';
                    } else { 
                        $('#toggle-nav img').removeClass('close');
                        delete scope.navState;
                    }       
                });
            });
            // element.click();
        }
    }
});
directives.directive('navIndex', function(){
    return {
        restrict:'A',
        
        link: function(scope, elm, attr) {
            
            var w = elm.parent().width();
            var n = elm.parent().children('.nav-thing');
            console.log(n)

        }
    }
});


myApp.directive('markdown', function(){
    return {
        restrict:'A',
        scope: {
            markdown:'=',
            parent:'='
        },
        compile:function($scope, $element, $attr) {
            
            return function link(scope, element, attr) {

                var converter = new Showdown.converter();
                if(scope.markdown) {
                    scope.markdown = converter.makeHtml(scope.markdown)



                     //REPLACE THE CODE
                     if(scope.parent.code) {
                        angular.forEach(scope.parent.code, function(value, key) {
                            scope.markdown = scope.markdown.replace('[code '+key+']', '<p class="block-quote-terminal">'+value.text+'</p>');
                        });
                    }

                    //REPLACE THE IMAGES
                    if(scope.parent.images) {
                        angular.forEach(scope.parent.images, function(value, key) {
                            scope.markdown = scope.markdown.replace('[image '+key+']', '<img src="'+value.url+'">');
                        }); 
                    }
                }




            }
        }

    }
})
