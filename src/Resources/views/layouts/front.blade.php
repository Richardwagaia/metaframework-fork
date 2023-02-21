<!doctype html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    @yield('meta')
    <meta name='robots' content='max-image-preview:large'/>
    <meta name="googlebot" content="noodp"/>
    <meta name="robots" content="index, follow"/>
    <link rel='dns-prefetch' href='//s.w.org'/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @stack('css')
</head>

<body class="body @yield('class_body')" style="background: #1A1A1A">
            @if (isset($slot))
                {{ $slot }}
            @else
                @yield('slot')
            @endif

@stack('js')

</body>
</html>
