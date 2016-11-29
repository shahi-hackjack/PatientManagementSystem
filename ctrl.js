var Patient = angular.module('Patient', []);

Patient.controller('mainctrl', ['$scope', '$http', function($scope, $http) {

    console.log(" mainctrl WORKING");


    $scope.submitForm = function(isValid) {
                 if (isValid) {
                console.log("check to make sure the form is completely valid !!!!!!");
                console.log($scope.Patient);
                //$scope.Patient="";

                $http.post('patientinsert.php', $scope.Patient).success(function(res) {
                    console.log(res);
                    $scope.Patient = "";
                    document.getElementById('green').innerHTML = "Successfull Attempt !!";
                    document.getElementById('red').innerHTML = "";
                      }).error(function() {
                    console.log("ERROR IN INSERTION");

                    $('#Gender').val('');
                    document.getElementById('red').innerHTML = "Unsuccessfull Attempt!!";
                    document.getElementById('green').innerHTML = "";
                });

            }
        } //submit form ends here


    $scope.pform = function() {


        $('#directory').hide();
        $("#patient").show();

    }


    $scope.totalCount = 0;

    $scope.directory = function() {

        $('#directory').height($("#patient").height());
        $("#patient").hide();
        $('#directory').show();
        document.getElementById('green').innerHTML = "";

        $http.post('directoryload.php').success(function(res) {
            // console.log(res);

            $scope.totalCount = 0;
            $scope.PatientName = res;

        }).error(function() {

            console.log("error")
        });
    }



   $scope.countInit = function() {
        return $scope.totalCount++;
    }

    $scope.fulldetail = function(id) {
        console.log(id);
        $http.post('patientload.php', {
            'id': id
        }).success(function(res) {

            //console.log(res[0].Fname);
            $scope.PatientP = res;


        }).error(function() {
            console.log("ERROR");

        });
    }

}]);
