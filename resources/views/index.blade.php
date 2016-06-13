@extends('layouts.app')
@section('content')
<div class="container"  ng-app="timeTracker" ng-controller="TimeEntry as vm">
    <div class="row">
        <div class="col-xs-8">
            <div class="row">
                <div class="timepicker col-xs-3">
                    <span class="timepicker-title label label-primary">Clock In</span>
                    <uib-timepicker ng-model="vm.clockIn" hour-step="1" minute-step="1" show-meridian="true">
                    </uib-timepicker>
                </div>
                <div class="timepicker  col-xs-3">
                    <span class="timepicker-title label label-primary">Clock Out</span>
                    <uib-timepicker ng-model="vm.clockOut" hour-step="1" minute-step="1" show-meridian="true">
                    </uib-timepicker>
                </div>
                <div class="time-entry-comment  col-xs-5">
                    <form class="navbar-form">
                        <input class="form-control comment-field" ng-model="vm.comment" placeholder="Enter a comment">
                        </input>
                        <button class="btn btn-primary" ng-click="vm.logNewTime()">Log Time</button>
                    </form>
                </div>
            </div>
            <br>
            <h1>Log History</h1><hr>
            <div ng-if="vm.timeentries.length < 1">
                <h2 class="text-center">History is empty log some time!</h2>
            </div>
            <div ng-repeat="time in vm.timeentries" ng-if="vm.timeentries.length > 0">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-sm-8">
                                <h2>
                                    @{{time.comment}}
                                </h2>
                                <button class="btn btn-danger btn-xs" ng-click="vm.deleteTimeEntry(time)">Delete</button>
                            </div>
                            <div class="col-sm-4 time-numbers">
                                <h2>
                                    <span class="label label-primary"  ng-show="time.loggedTime.duration._data.hours > 0">
                                        @{{time.loggedTime.duration._data.hours}} hour<span ng-show="time.loggedTime.duration._data.hours > 1">s</span>
                                    </span>&nbsp;
                                </h2>
                                <h4>
                                    <span class="label label-info">@{{time.loggedTime.duration._data.minutes}} minutes</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>@{{vm.project.title}}</h2>Rate: @{{vm.project.rate}} $/h</div>
                <div class="panel-body">
                    <div>
                        <h4><i class="fa fa-clock-o" aria-hidden="true"></i> Total time:
                            <span class="label label-primary">@{{vm.totalTime.hours}} hours</span>
                            <span class="label label-info">@{{vm.totalTime.minutes}} minutes</span>
                        </h4>
                    </div>
                    <div><h4><i class="fa fa-money" aria-hidden="true"></i> Total earned: <span class="label label-warning">@{{vm.totalEarned}} $</span></h4></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection