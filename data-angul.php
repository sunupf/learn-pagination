<!DOCTYPE html>
<html lang="en" ng-app="UsersApp">
<head>
  <meta charset="UTF-8">
  <title>Data Users</title>
  <link rel="stylesheet" href="bower_components/uikit/css/uikit.gradient.min.css">
</head>
<body ng-controller='userController'>
  <table class="uk-table" id="users-table">
    <caption>Users Table</caption>
    <thead>
      <tr>
        <th>Email</th>
        <th>Nama</th>
        <th>Password</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="user in users">
        <td>{{ user.email }}</td>
        <td>{{ user.nama }}</td>
        <td>{{ user.password }}</td>
      </tr>
    </tbody>
  </table>
    <ul class="uk-pagination">
    <li><span>First</span></li>
    <li ng-class="(currentPage==i)?'uk-active':''"ng-repeat="i in pagination" ><span ng-click=page(i)>{{ i }}</span></li>
    <li><span>Last</span></li>
 </ul>
  <script src="bower_components/angular/angular.min.js"></script>
  <script src="userController.js"></script>
</body>
</html>