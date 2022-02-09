<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Tabel Agenda</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Agenda">http://192.168.0.107:8080/kominfo-api/public/get/Agenda</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Agenda/{id}">http://192.168.0.107:8080/kominfo-api/public/get/Agenda/{id}</a>
                    </div>
                    <br>
                    <h1>Tabel Album</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Album">http://192.168.0.107:8080/kominfo-api/public/get/Album</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Album/{id}">http://192.168.0.107:8080/kominfo-api/public/get/Album/{id}</a>
                    </div> 
                    <br>
                    <h1>Tabel Banner</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Banner">http://192.168.0.107:8080/kominfo-api/public/get/Banner</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Banner/{id}">http://192.168.0.107:8080/kominfo-api/public/get/Banner/{id}</a>
                    </div> 
                    <br>
                    <h1>Tabel Berita</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Berita">http://192.168.0.107:8080/kominfo-api/public/get/Berita</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Berita/{id}">http://192.168.0.107:8080/kominfo-api/public/get/Berita/{id}</a>
                    </div> 
                    <br>
                    <h1>Tabel GaleriFoto</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Galerifoto">http://192.168.0.107:8080/kominfo-api/public/get/Galerifoto</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Galerifoto/{id}">http://192.168.0.107:8080/kominfo-api/public/get/Galerifoto/{id}</a>
                    </div> 
                    <br>
                    <h1>Tabel GaleriVideo</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Galerivideo">http://192.168.0.107:8080/kominfo-api/public/get/Galerivideo</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Galerivideo/{id}">http://192.168.0.107:8080/kominfo-api/public/get/Galerivideo/{id}</a>
                    </div>
                    <br>
                    <h1>Tabel HalStatis</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Halstatis">http://192.168.0.107:8080/kominfo-api/public/get/Halstatis</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Halstatis/{id}">http://192.168.0.107:8080/kominfo-api/public/get/Halstatis/{id}</a>
                    </div> 
                    <br>
                    <h1>Tabel HeaderSlide</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Headerslide">http://192.168.0.107:8080/kominfo-api/public/get/Headerslide</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Headerslide/{id}">http://192.168.0.107:8080/kominfo-api/public/get/Headerslide/{id}</a>
                    </div> 
                    <br>
                    <h1>Tabel Kat_berita</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/KatBerita">http://192.168.0.107:8080/kominfo-api/public/get/KatBerita</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/KatBerita/{id}">http://192.168.0.107:8080/kominfo-api/public/get/KatBerita/{id}</a>
                    </div>
                    <br>
                    <h1>Tabel Kat_halstatis/h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Kat_halstatis">http://192.168.0.107:8080/kominfo-api/public/get/Kat_halstatis</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Kat_halstatis/{id}">http://192.168.0.107:8080/kominfo-api/public/get/Kat_halstatis/{id}</a>
                    </div> 
                    <br>
                    <h1>Tabel Pengguna</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Pengguna">http://192.168.0.107:8080/kominfo-api/public/get/Pengguna</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Pengguna/{id}">http://192.168.0.107:8080/kominfo-api/public/get/Pengguna/{id}</a>
                    </div> 
                    <br>
                    <h1>Tabel Profilopd</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Profilopd">http://192.168.0.107:8080/kominfo-api/public/get/Profilopd</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/get/Profilopd/{id}">http://192.168.0.107:8080/kominfo-api/public/get/Profilopd/{id}</a>
                    </div>
                    <br>
                    <h1>Tabel Relasi</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <a href="http://192.168.0.107:8080/kominfo-api/public/berita">http://192.168.0.107:8080/kominfo-api/public/berita</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/berita/{id}">http://192.168.0.107:8080/kominfo-api/public/berita/{id}</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/agenda">http://192.168.0.107:8080/kominfo-api/public/agenda</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/agenda/{id}">http://192.168.0.107:8080/kominfo-api/public/agenda/{id}</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/album">http://192.168.0.107:8080/kominfo-api/public/album</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/album/{id}">http://192.168.0.107:8080/kominfo-api/public/album/{id}</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/halstatis">http://192.168.0.107:8080/kominfo-api/public/halstatis</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/halstatis/{id}">http://192.168.0.107:8080/kominfo-api/public/halstatis/{id}</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/galerifoto">http://192.168.0.107:8080/kominfo-api/public/galerifoto</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/galerifoto/{id}">http://192.168.0.107:8080/kominfo-api/public/galerifoto/{id}</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/galerivideo">http://192.168.0.107:8080/kominfo-api/public/galerivideo</a>
                        <br>
                        <a href="http://192.168.0.107:8080/kominfo-api/public/galerivideo/{id}">http://192.168.0.107:8080/kominfo-api/public/galerivideo/{id}</a>
                        <br>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
