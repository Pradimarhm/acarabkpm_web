@include('layout.header')
<body>
    <div class="h-screen w-full flex justify-center items-center bg-[url('https://images.unsplash.com/photo-1658937364065-60f3f6818724?q=80&w=2093&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover bg-center">
        <div>
            @yield('content')
        </div>
    </div>
</body>
</html>