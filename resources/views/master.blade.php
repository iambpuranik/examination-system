<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


</head>
<body>
@section('sidebar')
    {{--{!! auth()->user() !!}--}}

    @if(Auth::check())
        @if((auth()->user()->user_role) == 'admin')
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="/admin">Admin</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="/admin/create-user">Create User</a></li>
                            <li><a href="/admin/create-exam">Exam</a></li>
                            <li><a href="/admin/create-question">Question</a></li>
                            <li><a href="/admin/assign-exam">Assign</a></li>
                            <li><a href="/admin/user-response">User Response</a></li>
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        @endif

        @if((auth()->user()->user_role) == 'user')
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Hello {!! ucfirst(auth()->user()->user_name) !!}</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        @endif
    @endif
@show

<div class="container">
    @yield('content')
</div>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
</body>

</html>