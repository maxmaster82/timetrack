(function() {

	'use strict';

	angular
		.module('timeTracker')
		.factory('time', time);

	function time($resource) {

		var Time = $resource('project/:projectId/time/:id', {projectId: 1}, {
			update: {
				method: 'PUT'
			}
		});

		function getTime() {

			return Time.query().$promise.then(function (results) {
				angular.forEach(results, function(result){
					result.loggedTime = getTimeDiff(result.start_time, result.end_time);
				});
				return results;
			}, function (error) {
				console.log(error);
			});
		}

		function saveTime(data) {
			return Time.save(data).$promise.then(function(success) {
				console.log(success);
			}, function(error) {
				console.log(error);
			});
		}

		function getTimeDiff(start, end) {
			var diff = moment(end).diff(moment(start));
			var duration = moment.duration(diff);

			return{
				duration: duration
			};
		}

		function getTotalTime(timeentries) {
			var totalMilliseconds = 0;

			angular.forEach(timeentries, function(key) {
				totalMilliseconds += key.loggedTime.duration._milliseconds;
			});

			return {
				hours: Math.floor(moment.duration(totalMilliseconds).asHours()),
				minutes: moment.duration(totalMilliseconds).minutes()
			};
		}

		function deleteTime(id) {
			return Time.delete({id:id}).$promise.then(function(success) {
				console.log(success);
			}, function(error) {
				console.log(error);
			});
		}

		return {
			getTime: getTime,
			saveTime: saveTime,
			getTimeDiff: getTimeDiff,
			getTotalTime: getTotalTime,
			deleteTime: deleteTime
		}

	}
})();