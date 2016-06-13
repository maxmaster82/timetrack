(function() {

    'use strict';

    angular
        .module('timeTracker')
        .factory('project', project);

    function project($resource) {

        var Project = $resource('project/:id', {id: 1}, {
            update: {
                method: 'PUT'
            },
            query: {
                method:'GET',
                isArray:false
            }
        });
        
        function getProject() {
            return Project.query().$promise.then(function(results) {
                return results;
            }, function(error) { 
                console.log(error);
            });
        }

        return {
            getProject: getProject
        }

    }
})();