'use strict';

// declare top-level module which depends on filters,and services
var myApp = angular.module('myApp',
    ['myApp.filters',
        'myApp.directives', // custom directives
        'ngGrid', // angular grid
        'ui', // angular ui
        'ngSanitize', // for html-bind in ckeditor
        'ui.bootstrap', // jquery ui bootstrap
        '$strap.directives', // angular strap
        'ui.state', // ui router
    ]);


// bootstrap angular
myApp.config(['$routeProvider', '$locationProvider', '$stateProvider', '$urlRouterProvider', function ($routeProvider, $locationProvider, $stateProvider, $urlRouterProvider) {

 
    $stateProvider
        .state('app', {
            url:'/',
            templateUrl:'app/partials/app.html',
            resolve: {
                data: function($http, $rootScope){
                        return $http.jsonp('http://192.237.165.197/CLG/app/api/?action=getAll&jsonp=true&callback=JSON_CALLBACK').then(function(data){
                            $rootScope.guideData = data.data.guides;
                            console.log('test')
                            return data.data.guides;
                        });
                }
            },
            controller:function(){
                console.log('setting root controller...');
 
            }
        })
            .state('app.guides', {
                url: "guides",
                views: {
                    '': {
                        templateUrl:'app/partials/home.guides.html',
                        controller: function(){
                            console.log('running guides controller');
                        }
                    },
                    'list@app.guides': {
                        templateUrl:'app/partials/views/home.guides.html',
                        controller: function(){
                            console.log('running guides content controller');
                            
                        }
                    }

                }
                

            })
                .state('app.guides.view', {
                    url: "/:guideID",
                    views: {
                        "content@app.guides": {
                            templateUrl:'app/partials/home.guides.view.html',
                            controller: function($scope, $rootScope, $stateParams){
                                console.log('running guides view controller...')
                                console.log($stateParams)
                                _.each($rootScope.guideData, function(value, key, list){
                                    if(value.slug === $stateParams.guideID) {
                                        console.log('setting guide...')
                                        $rootScope.guide = list[key];
                                    }
                                })

                            }
                        }
                    }
                })

                    .state('app.guides.view.book', {
                        url: "/:bookID",
                        views: {

                            "book@app.guides": {
                                templateUrl:'app/partials/home.guides.view.book.html',
                                controller: function($scope, $rootScope, $stateParams){
                                    console.log('running guides book controller...')
                                    _.each($rootScope.guide.children, function(value, key, list){
                                    if(value.slug === $stateParams.bookID) {
                                        console.log('setting book...')
                                        $scope.book = list[key];
                                    }
                                })
                            }
                        }
                    }

                    })

}]);



// this is run after angular is instantiated and bootstrapped
myApp.run(function ($q, $rootScope, $location, $routeParams, $state, $stateParams, $http, $timeout, AuthService, RESTService) {

    // *****
    // Eager load some data using simple REST client
    // *****

    $rootScope.restService = RESTService;
    $rootScope.state = $state;
    $rootScope.location = $location;


    // async load constants
    $rootScope.constants = [];
    // $rootScope.restService.get('data/constants.json', function (data) {
    //         $rootScope.constants = data[0];
    //     }
    // );

    // async load data do be used in table (playgound grid widget)
    $rootScope.listData = [];
    // $rootScope.restService.get('data/generic-list.json', function (data) {
    //         $rootScope.listData = data;
    //     }
    // );

        // async load data do be used in table (playgound grid widget)
    // $rootScope.guideData = [];
    // $rootScope.restService.get('http://projects.mongo/app/api/?action=getAll', function (data) {
    //         $rootScope.guideData = data.guides;

    //     }
    // );
    


    // var defer = $q.defer();
    // $http.jsonp('http://projects.mongo/app/api/?action=getAll&jsonp=true&callback=JSON_CALLBACK').then(function(data){
    //     console.log(data.guides)
    //     return defer.resolve(data.data.guides);
    // });
    // $rootScope.guideData = defer.promise;

    



    // *****
    // Initialize authentication
    // *****
    $rootScope.authService = AuthService;

    // text input for login/password (only)
    $rootScope.loginInput = 'git@github.com';
    $rootScope.passwordInput = 'git';

    $rootScope.$watch('authService.authorized()', function () {

        // // if never logged in, do nothing (otherwise bookmarks fail)
        // if ($rootScope.authService.initialState()) {
        //     // we are public browsing
        //     return;
        // }

        // // when user logs in, redirect to home
        // if ($rootScope.authService.authorized()) {
        //     $location.path("/");
        // }

        // // when user logs out, redirect to home
        // if (!$rootScope.authService.authorized()) {
        //     $location.path("/");
        // }

    }, true);

});




