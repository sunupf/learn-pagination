  angular.module('UsersApp',[])
    .controller('userController',['$scope','$http',function($scope,$http){
      $scope.currentPage = 1;
      $scope.pagination = [];
      $scope.users = [];
      
      $http.get('getTotalPage.php').
      success(function(data) {
        $scope.totalPage = data.page;
        console.log(data.page);
        
        for(var i=1;i<=data.page;i++){
          $scope.pagination.push(i);
        }
      }).
      error(function(data) {
        console.log('error');
      });
      
      var getData = function getData(pageNumber){
        $http.get('getData.php?page='+pageNumber).
        success(function(data) {
          console.log(data);
          $scope.users = data;
          $scope.currentPage = pageNumber;
        }).
        error(function(data) {
          console.log('error');
        });
      }
      
      $scope.page = function(i){
        getData(i);
      }
      
      getData($scope.currentPage);
      
    }])