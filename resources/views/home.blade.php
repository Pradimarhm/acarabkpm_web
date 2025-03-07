{{-- @include('layout.header') --}}
@extends('layout.app')
@section('content')
    <div class="w-[32rem] h-auto bg-purple-600/30 rounded-3xl shadow-2xl backdrop-blur-sm border border-purple-700/10 text-center p-12">
        <h1 class="font-bold text-5xl font-sans text-white mb-8">Halaman Home</h1>
        <p class="font-normal font-sans text-lg mb-16 text-white"> Halaman ini merupakan halaman home</p>

        <form class="flex flex-col items-start" action="">
            <p class="font-semibold font-sans text-white ml-3 mb-1">Nama </p>
            <input class="w-full h-[44px] bg-white/80 rounded-full backdrop-blur-lg mb-4 pl-4 pr-4 text-sm"  type="text" value="{{$nama}}">
            <p class="font-semibold font-sans text-white ml-3 mb-1">Mata Kuliah</p>
            <ul class="list-decimal font-normal font-sans text-white ml-8 mb-4 text-start" >
                @foreach ($pelajaran as $p)
                <li >{{$p}}</li>
                @endforeach
            </ul>
            <p class="font-semibold font-sans text-white ml-3 mb-1">Masukan</p>
            <input class="w-full h-[44px] bg-white/80 rounded-full backdrop-blur-lg mb-4 pl-4 pr-4 text-sm"  type="text" >
            <button class="flex bg-purple-600 py-2 px-4 rounded-full mt-8 w-full justify-center hover:bg-purple-800 active:bg-purple-950"><p class="text-center text-white">Kirim</p></button>
        </form>
    </div>
@endsection

{{-- <body>
    <div class="h-screen w-full flex justify-center items-center bg-[url('https://images.unsplash.com/photo-1658937364065-60f3f6818724?q=80&w=2093&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover bg-center">
        <div class="w-[32rem] h-auto bg-purple-600/30 rounded-3xl shadow-2xl backdrop-blur-sm border border-purple-700/10 text-center p-12">
            <h1 class="font-bold text-5xl font-sans text-white mb-8">Halaman Home</h1>
            <p class="font-normal font-sans text-lg mb-16 text-white"> Halaman ini merupakan halaman home</p>

            <form class="flex flex-col items-start" action="">
                <p class="font-semibold font-sans text-white ml-3 mb-1">Keluh Kesah Kuliah</p>
                <input class="w-full h-[44px] bg-white/80 rounded-full backdrop-blur-lg mb-4 pl-4 pr-4 text-sm"  type="text">
                <p class="font-semibold font-sans text-white ml-3 mb-1">Namamu</p>
                <input class="w-full h-[44px] bg-white/80 rounded-full backdrop-blur-lg mb-4 pl-4 pr-4 text-sm"  type="text">
                <button class="flex bg-purple-600 py-2 px-4 rounded-full mt-8 w-full justify-center hover:bg-purple-800 active:bg-purple-950"><p class="text-center text-white">Kirim</p></button>
            </form>
        </div>
    </div>
</body>
</html> --}}