(function() {

	'use strict';

	Number.prototype.formatMoney = function(c, d, t, j){
		var n = this,
			c = isNaN(c = Math.abs(c)) ? 2 : c,
			d = d == undefined ? "." : d,
			t = t == undefined ? "," : t,
			s = n < 0 ? "-" : "",
			i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
			j = (j = i.length) > 3 ? j % 3 : 0;
		return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	};

	angular
		.module('timeTracker')
		.controller('TimeEntry', TimeEntry);

	function TimeEntry(project, time) {


		var vm = this;

		vm.timeentries = [];
		vm.project = {};
		vm.totalTime = {};
		vm.totalEarned = 0;

		vm.clockIn = new Date();
		vm.clockOut = new Date();

		function getProject() {
			project.getProject().then(function(result) {
				vm.project = result;
				getTimeEntries();
			}, function(error) {
				console.log(error);
			});
		}

		function getTimeEntries() {
			time.getTime().then(function(results) {
				vm.timeentries = results;
				updateTotalTime(vm.timeentries);
				updadeTotalEarned();
			}, function(error) {
				console.log(error);
			});
		}


		function updateTotalTime(timeentries) {
			vm.totalTime = time.getTotalTime(timeentries);
		}

		function updadeTotalEarned() {
			vm.totalEarned = ((vm.totalTime.hours*60+vm.totalTime.minutes)*vm.project.rate/60).formatMoney(2, '.', ',');
		}

		getProject();


		vm.logNewTime = function() {

			// Make sure that the clock-in time isn't after
			// the clock-out time!
			if(vm.clockOut < vm.clockIn) {
				swal({
					title: "Select correct time!",
					text: "You can't clock out before you clock in!",
					type: "info",
					timer: 2000,
					showConfirmButton: false
				});
				return;
			}
        
			// Make sure the time entry is greater than zero
			if(vm.clockOut - vm.clockIn === 0) {
				swal({
					title: "Select correct time!",
					text: "Your time entry has to be greater than zero!",
					type: "info",
					timer: 2000,
					showConfirmButton: false
				});
				return;
			}
        
			time.saveTime({
				'start_time': vm.clockIn,
				"end_time":vm.clockOut,
				"comment":vm.comment
			}).then(function(success){
				getTimeEntries();
			}, function(error) {
				console.log(error);
			});

			getTimeEntries();
			updadeTotalEarned();

			// Reset clockIn and clockOut times to the current time
			vm.clockIn = moment();
			vm.clockOut = moment();
        
			// Clear the comment field
			vm.comment = "";
			
		};

		vm.deleteTimeEntry = function(timeentry) {
			var id = timeentry.id;

			time.deleteTime(id).then(function(success) {
				getTimeEntries();
			}, function(error) {
				console.log(error);
			});
		};

	}
})();