var app = angular.module('app', ['ngRoute'])

    .config(function ($routeProvider, $locationProvider) {
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        });
        $locationProvider.hashPrefix('!');

        $routeProvider
            .when('/', {
                templateUrl: './templates/message.html'
            })
            .when('/users', {
                templateUrl: './templates/users.html'
            })
            .otherwise({
                templateUrl: './templates/message.html'
            });
    })
    .controller('mainController', ['$scope', '$location', function ($scope, $location) {

    }])
    .controller('messageController', ['$scope', function ($scope) {
        pinned()
    }])
    .controller('usersController', ['$scope', function ($scope) {
        pinned()
    }])
    .controller('navController', ['$scope', '$location', function ($scope, $location) {

        var body_el = angular.element('body');
        angular.element('#toggleNav').click(function () {
            body_el.addClass('mask');
        })
        angular.element('.mask-bg').click(function () {
            body_el.removeClass('mask');
        });

        angular.element('.list-item').click(function () {
            $('.list-item .active').removeClass('active');
            $(this).find('a').addClass('active');

            body_el.removeClass('mask');
        });

        //
        var path = $location.url();
        if (path == "/" || path == "/message") {
            $('[href="/message"]').addClass('active');
        } else if (path == "/users") {
            $('[href="/users"]').addClass('active');
        }
    }]);


    function pinned(){
        $('.pinned').pin();
        $(".pinned").headroom({
            "tolerance": 5,
            "offset": $('.pinned').offset().top,
            "classes": {
                "initial": "animated",
                "pinned": "slideDown",
                "unpinned": "slideUp"
            }
        });
    }
