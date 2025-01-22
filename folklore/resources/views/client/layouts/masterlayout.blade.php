<h1>test</h1>

<main>
        @hasSection('content')
        @yield('content')

        @else
        <h2>No content fount</h2>
        @endif
    </main>
