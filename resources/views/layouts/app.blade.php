<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TimeTrack</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">TimeTrack</a>
        <ul class="nav navbar-nav navbar-right">
            <li class="active">
                <a href="{{ url('/project/1/edit') }}">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    Project Settings
                </a>
            </li>
        </ul>
    </div>
</nav>

@yield('content');
<br>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p class="pull-right">&copy; TimeTrack</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/js/libs/sweetalert-dev.js"></script>
<script type="text/javascript" src="/js/libs/angular.js"></script>
<script type="text/javascript" src="/js/libs/ui-bootstrap-tpls.js"></script>
<script type="text/javascript" src="/js/libs/angular-resource.js"></script>
<script type="text/javascript" src="/js/libs/moment.js"></script>
<script type="text/javascript" src="/js/scripts/app.js"></script>
<script type="text/javascript" src="/js/scripts/controllers/TimeEntry.js"></script>
<script type="text/javascript" src="/js/scripts/services/project.js"></script>
<script type="text/javascript" src="/js/scripts/services/time.js"></script>
@include('includes.flash')
</body>
</html>
