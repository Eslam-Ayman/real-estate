(function () {
    var app = angular.module('tasks', ['ngRoute', 'ngStorage']);

    app.config(['$locationProvider', '$routeProvider', '$localStorageProvider', function ($locationProvider, $routeProvider, $localStorageProvider) {
        /*$locationProvider.html5Mode({
            enabled: true,
            requireBase: true
          });*/
        // $locationProvider.html5Mode(true);
        if ($localStorageProvider.get('data') == undefined)
            $localStorageProvider.set('data', { state: false });

        $routeProvider.when("/home", {
            resolve:
            {
                "check": function ($location, $rootScope, $localStorage) {
                    $rootScope.asideState = false;
                }
            },
            templateUrl: "assets/home.php"
        })
                      .when("/signin", {
                          resolve:
                          {
                              "check": function ($location, $rootScope, $localStorage) {
                                  // $localStorageProvider.set('data',{id: false});
                                  // alert($localStorageProvider.get('data').state);
                                  // $localStorageProvider.setKeyPrefix('NewPrefix');
                                  // $rootScope.asideState = false;
                                  // $localStorage.$default({data: {state:false}});
                                  if ($localStorageProvider.get('data').state) $location.path('/profile');
                              }
                          },
                          controller: 'sign',
                          templateUrl: "assets/signin.php"
                      })
                      .when("/signup", {
                          resolve:
                          {
                              "check": function ($location, $rootScope, $localStorage) {
                                  $localStorage.$default({ data: { state: false } });
                                  if ($localStorageProvider.get('data').state) $location.path('/profile');
                              }
                          },
                          controller: 'sign',
                          templateUrl: "assets/signup.php"
                      })
                      .when("/profile", {
                          resolve:
                          {
                              "check": function ($location, $rootScope, $localStorage) {
                                  $rootScope.asideState = false;
                                  if (!$localStorageProvider.get('data').state) $location.path('/signin');
                              }
                          },
                          templateUrl: "assets/profile.php"
                      })
                      .when("/mustDo", {
                          resolve:
                          {
                              "check": function ($location, $rootScope, $localStorage) {
                                  $rootScope.asideState = true;
                                  // if(!$rootScope.state) $location.path('/signin'); 
                              }
                          },
                          templateUrl: "/Templates/must.html"
                      })
                      .when("/done", {
                          resolve:
                          {
                              "check": function ($location, $rootScope, $localStorage) {
                                  $rootScope.asideState = true;
                                  // if(!$localStorageProvider.get('data').state) $location.path('/signin'); 
                              }
                          },
                          templateUrl: "/Templates/done.html"
                      })
                      .when("/trash", {
                          resolve:
                          {
                              "check": function ($location, $rootScope, $localStorage) {
                                  $rootScope.asideState = true;
                                  // if(!$localStorageProvider.get('data').state) $location.path('/signin'); 
                              }
                          },
                          templateUrl: "/Templates/trash.html"
                      })
                      .when("/members", {
                          resolve:
                          {
                              "check": function ($location, $rootScope, $localStorage) {
                                  $rootScope.asideState = true;
                                  // if(!$localStorageProvider.get('data').state) $location.path('/signin'); 
                              }
                          },
                          templateUrl: "/Templates/members.html"
                      })
                      .when("/comments", {
                          resolve:
                          {
                              "check": function ($location, $rootScope, $localStorage) {
                                  $rootScope.asideState = true;
                                  // if(!$localStorageProvider.get('data').state) $location.path('/signin'); 
                              }
                          },
                          templateUrl: "/Templates/comments.html"
                      })
                      .when("/chat", {
                          resolve:
                          {
                              "check": function ($location, $rootScope, $localStorage) {
                                  $rootScope.asideState = true;
                                  // if(!$localStorageProvider.get('data').state) $location.path('/signin'); 
                              }
                          },
                          templateUrl: "/Templates/chat.html"
                      })
                      .otherwise({
                          resolve:
                          {
                              "check": function ($location, $rootScope, $localStorage) {
                                  $rootScope.asideState = false;
                              }
                          },
                          templateUrl: "/Templates/error.html"
                      });
        //$locationProvider.html5mode(true);
    }]);
    /*
      app.controller("pathCtrl",function($rootScope,$localStorage) {
        $rootScope.session = false;
        $localStorage.$default({data: {state:false}});
        });*/
    /*app.controller("pathCtrl",function($scope,$location) {
     switch($location.path())
     {
       case "/profile": $location.path('/signin'); break;
       case "/signin": $location.path('/profile'); break;
       case "/signup": $location.path('/profile'); break;
       default: $location.path('/home');
     }
     
    });*/

    app.controller("sign", function ($rootScope, $scope, $http, $window, $location, $localStorage, $sessionStorage) {
        // $localStorage.$default({data: {state:false}});
        $rootScope.$storage = $localStorage;
        $rootScope.state = $localStorage.data.state;
        $scope.signup = function ()//name,email,password,confirmPassword
        {
            $http({
                method: "POST",
                url: "controller/registerCtrl.php",
                data: { submit: 'signup', username: $scope.username, email: $scope.email, password: $scope.password, password_confirmation: $scope.confirmPassword, birthDate: $scope.birthDate, phone: $scope.phone, country: $scope.country, privecy: $scope.privecy }
            }).then(function mySucces(response) {
                // alert(response.data.message+response.data.registerState);
                $rootScope.registerState = response.data.registerState;
                $rootScope.message = response.data.message;
                if ($scope.registerState) { $location.path('/signin'); }
                else { $rootScope.registerState = !response.data.registerState; }

                //   $location.path("/projects/api/public/contents/chat.html");
            }, function myError(response) {
                alert(response.data + response.statusText);
                // alert(response.statusText);
                // $scope.myWelcome = response.statusText;
            });
        }

        //$scope.nav = false;
        $scope.signin = function (email, password) {
            $http({
                method: "POST",
                url: "controller/loginCtrl.php",//,api/auth/login
                data: { email: email, password: password }
            }).then(function mySucces(response) {
                if (!response.data.state) {
                    // alert("Sorry : yor cerdentials are wrong :(");
                    $scope.wrong = "Sorry : yor cerdentials are wrong :(";
                    $scope.state = !response.data.state;
                } else {
                    // alert(response.data.state);
                    $rootScope.$storage = $localStorage;
                    $rootScope.$storage.data = { state: response.data.state, username: response.data.username, email: response.data.email, password: response.data.password, birthDate: response.data.birthDate, phone: response.data.phone, country: response.data.country };
                    // $localStorage.data = {state: response.data.state, email: response.data.email, phone: response.data.phone};
                    $rootScope.asideState = true;
                    $rootScope.state = response.data.state;
                    $location.path('/mustDo');
                    // $rootScope.session = true;
                    // delete $localStorage.data;
                    // $rootScope.user = true;
                    // $scope.nav = true;
                    // console.log($scope.nav);
                    // $window.location.href = 'inner.html#/mustDo';
                    //$window.location.href = 'app#/home';
                }

            });
        }
        $scope.logout = function () {
            $localStorage.data = { state: false };
            $rootScope.state = false;
            $location.path('/home');
            /*$http({
               method:"POST",
               url:"api/auth/login",
               data: {email: $scope.email, password: $scope.password}
            }).then(function mySucces(response) {
             if(!response.data.id){
                 alert(":( Sorry your data is wrong");
             }else{
                  
                 $window.location.href = 'localhost/projects/api/public/inner.html#/mustDo';
             }
           
            });  */
        }

    });




    app.controller('side-tabs', function () {
        this.noTab = 1;
        this.setTab = function (no) {
            this.noTab = no;
        };
        this.checkTab = function (no) {
            return this.noTab === no;
        };
    });
    app.controller('inner-content', function () {
        this.doContents =
        [
            {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            },
            {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            },
            {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }
        ];
        this.doneContents =
        [
            {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }
        ];
        this.trashContents =
        [
            {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }, {
                img: "/Images/logo.jpg",
                title: 'Thumbnail label',
                paragraph: "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."
            }
        ];

        this.memberContents =
        [
            {
                name: "Ahmed Ashraf",
                location: 'egypt-giza',
                phone: "+02-0114970"
            }, {
                name: "Ahmed Ashraf",
                location: 'egypt-giza',
                phone: "+02-0114970"
            }, {
                name: "Ahmed Ashraf",
                location: 'egypt-giza',
                phone: "+02-0114970"
            }, {
                name: "Ahmed Ashraf",
                location: 'egypt-giza',
                phone: "+02-0114970"
            }, {
                name: "Ahmed Ashraf",
                location: 'egypt-giza',
                phone: "+02-0114970"
            }, {
                name: "Ahmed Ashraf",
                location: 'egypt-giza',
                phone: "+02-0114970"
            }, {
                name: "Ahmed Ashraf",
                location: 'egypt-giza',
                phone: "+02-0114970"
            }, {
                name: "Ahmed Ashraf",
                location: 'egypt-giza',
                phone: "+02-0114970"
            }, {
                name: "Ahmed Ashraf",
                location: 'egypt-giza',
                phone: "+02-0114970"
            }
        ];
    });
})();