<!doctype html>
<html>
<head>
    <title>Help Paste | Laravel.io</title>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="http://yandex.st/highlightjs/7.4/styles/monokai_sublime.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/2.1.3/normalize.min.css" />
    <link rel="stylesheet" href="/stylesheets/app.css" />
</head>

<body>
    @include('_header')
    <header class="page-header">
        <h1>Laravel.io Help Paste</h1>
        <nav>
            <a class="button new-paste" href="{{ URL::route('create') }}">Create a New Paste</a>
        </nav>
    </header>

    <main>
        {{ $content }}
    </main>

    <footer class="page-footer">
        A Laravel.io Application
        Developed by <a href="http://matthewmachuga.com">Matthew Machuga</a>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/7.4/highlight.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.1.01/ace.js"></script>
    @yield('javascripts')
</body>
</html>
