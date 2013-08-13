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
                scope.markdown = converter.makeHtml(scope.markdown)

                 //REPLACE THE CODE
                angular.forEach(scope.parent.code, function(value, key) {
                    scope.markdown = scope.markdown.replace('[code '+key+']', '<pre>'+value+'</pre>');
                });
                //REPLACE THE IMAGES
                angular.forEach(scope.parent.images, function(value, key) {
                    scope.markdown = scope.markdown.replace('[image '+key+']', '<img src="'+value.url+'">');
                }); 



            }
        }

    }
})
