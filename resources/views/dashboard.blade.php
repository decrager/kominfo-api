<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('REST API Web Kominfo Kota Bogor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 style="font-size: 20px" class="mb-1">Tabel Agenda</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="agenda1" style="display: none">https://kominfo.kotabogor-api.my.id/Agenda</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/Agenda |
                            <button onclick="copy('agenda1')">Copy</button>
                        </p>
                        <p>
                            <p id="agenda2" style="display: none">https://kominfo.kotabogor-api.my.id/Agenda/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/Agenda/{id} |
                            <button onclick="copy('agenda2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="agenda3" style="display: none">https://kominfo.kotabogor-api.my.id/AgendaCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/AgendaCrt |
                                <button onclick="copy('agenda3')">Copy</button>
                            </p>
                            <p>
                                <p id="agenda4" style="display: none">https://kominfo.kotabogor-api.my.id/AgendaUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/AgendaUpd/{id} |
                                <button onclick="copy('agenda4')">Copy</button>
                            </p>
                            <p>
                                <p id="agenda5" style="display: none">https://kominfo.kotabogor-api.my.id/AgendaDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/AgendaDest/{id} |
                                <button onclick="copy('agenda5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel Album</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="album1" style="display: none">https://kominfo.kotabogor-api.my.id/Album</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/Album |
                            <button onclick="copy('album1')">Copy</button>
                        </p>
                        <p>
                            <p id="album2" style="display: none">https://kominfo.kotabogor-api.my.id/Album/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/Album/{id} |
                            <button onclick="copy('album2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="album3" style="display: none">https://kominfo.kotabogor-api.my.id/AlbumCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/AlbumCrt |
                                <button onclick="copy('album3')">Copy</button>
                            </p>
                            <p>
                                <p id="album4" style="display: none">https://kominfo.kotabogor-api.my.id/AlbumUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/AlbumUpd/{id} |
                                <button onclick="copy('album4')">Copy</button>
                            </p>
                            <p>
                                <p id="album5" style="display: none">https://kominfo.kotabogor-api.my.id/AlbumDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/AlbumDest/{id} |
                                <button onclick="copy('album5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel Banner</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="Banner1" style="display: none">https://kominfo.kotabogor-api.my.id/Banner</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/Banner |
                            <button onclick="copy('Banner1')">Copy</button>
                        </p>
                        <p>
                            <p id="Banner2" style="display: none">https://kominfo.kotabogor-api.my.id/Banner/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/Banner/{id} |
                            <button onclick="copy('Banner2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="Banner3" style="display: none">https://kominfo.kotabogor-api.my.id/BannerCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/BannerCrt |
                                <button onclick="copy('Banner3')">Copy</button>
                            </p>
                            <p>
                                <p id="Banner4" style="display: none">https://kominfo.kotabogor-api.my.id/BannerUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/BannerUpd/{id} |
                                <button onclick="copy('Banner4')">Copy</button>
                            </p>
                            <p>
                                <p id="Banner5" style="display: none">https://kominfo.kotabogor-api.my.id/BannerDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/BannerDest/{id} |
                                <button onclick="copy('Banner5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel Berita</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="Berita1" style="display: none">https://kominfo.kotabogor-api.my.id/Berita</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/Berita |
                            <button onclick="copy('Berita1')">Copy</button>
                        </p>
                        <p>
                            <p id="Berita2" style="display: none">https://kominfo.kotabogor-api.my.id/Berita/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/Berita/{id} |
                            <button onclick="copy('Berita2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="Berita3" style="display: none">https://kominfo.kotabogor-api.my.id/BeritaCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/BeritaCrt |
                                <button onclick="copy('Berita3')">Copy</button>
                            </p>
                            <p>
                                <p id="Berita4" style="display: none">https://kominfo.kotabogor-api.my.id/BeritaUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/BeritaUpd/{id} |
                                <button onclick="copy('Berita4')">Copy</button>
                            </p>
                            <p>
                                <p id="Berita5" style="display: none">https://kominfo.kotabogor-api.my.id/BeritaDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/BeritaDest/{id} |
                                <button onclick="copy('Berita5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel Galerifoto</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="Galerifoto1" style="display: none">https://kominfo.kotabogor-api.my.id/Galerifoto</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/Galerifoto |
                            <button onclick="copy('Galerifoto1')">Copy</button>
                        </p>
                        <p>
                            <p id="Galerifoto2" style="display: none">https://kominfo.kotabogor-api.my.id/Galerifoto/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/Galerifoto/{id} |
                            <button onclick="copy('Galerifoto2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="Galerifoto3" style="display: none">https://kominfo.kotabogor-api.my.id/GalerifotoCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/GalerifotoCrt |
                                <button onclick="copy('Galerifoto3')">Copy</button>
                            </p>
                            <p>
                                <p id="Galerifoto4" style="display: none">https://kominfo.kotabogor-api.my.id/GalerifotoUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/GalerifotoUpd/{id}
                                |
                                <button onclick="copy('Galerifoto4')">Copy</button>
                            </p>
                            <p>
                                <p id="Galerifoto5" style="display: none">https://kominfo.kotabogor-api.my.id/GalerifotoDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/GalerifotoDest/{id}
                                |
                                <button onclick="copy('Galerifoto5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel Galerivideo</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="Galerivideo1" style="display: none">https://kominfo.kotabogor-api.my.id/Galerivideo</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/Galerivideo |
                            <button onclick="copy('Galerivideo1')">Copy</button>
                        </p>
                        <p>
                            <p id="Galerivideo2" style="display: none">https://kominfo.kotabogor-api.my.id/Galerivideo/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/Galerivideo/{id} |
                            <button onclick="copy('Galerivideo2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="Galerivideo3" style="display: none">https://kominfo.kotabogor-api.my.id/GalerivideoCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/GalerivideoCrt |
                                <button onclick="copy('Galerivideo3')">Copy</button>
                            </p>
                            <p>
                                <p id="Galerivideo4" style="display: none">https://kominfo.kotabogor-api.my.id/GalerivideoUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/GalerivideoUpd/{id}
                                |
                                <button onclick="copy('Galerivideo4')">Copy</button>
                            </p>
                            <p>
                                <p id="Galerivideo5" style="display: none">https://kominfo.kotabogor-api.my.id/GalerivideoDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/GalerivideoDest/{id}
                                |
                                <button onclick="copy('Galerivideo5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel Halstatis</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="Halstatis1" style="display: none">https://kominfo.kotabogor-api.my.id/Halstatis</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/Halstatis |
                            <button onclick="copy('Halstatis1')">Copy</button>
                        </p>
                        <p>
                            <p id="Halstatis2" style="display: none">https://kominfo.kotabogor-api.my.id/Halstatis/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/Halstatis/{id} |
                            <button onclick="copy('Halstatis2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="Halstatis3" style="display: none">https://kominfo.kotabogor-api.my.id/HalstatisCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/HalstatisCrt |
                                <button onclick="copy('Halstatis3')">Copy</button>
                            </p>
                            <p>
                                <p id="Halstatis4" style="display: none">https://kominfo.kotabogor-api.my.id/HalstatisUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/HalstatisUpd/{id} |
                                <button onclick="copy('Halstatis4')">Copy</button>
                            </p>
                            <p>
                                <p id="Halstatis5" style="display: none">https://kominfo.kotabogor-api.my.id/HalstatisDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/HalstatisDest/{id} |
                                <button onclick="copy('Halstatis5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel Headerslide</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="Headerslide1" style="display: none">https://kominfo.kotabogor-api.my.id/Headerslide</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/Headerslide |
                            <button onclick="copy('Headerslide1')">Copy</button>
                        </p>
                        <p>
                            <p id="Headerslide2" style="display: none">https://kominfo.kotabogor-api.my.id/Headerslide/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/Headerslide/{id} |
                            <button onclick="copy('Headerslide2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="Headerslide3" style="display: none">https://kominfo.kotabogor-api.my.id/HeaderslideCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/HeaderslideCrt |
                                <button onclick="copy('Headerslide3')">Copy</button>
                            </p>
                            <p>
                                <p id="Headerslide4" style="display: none">https://kominfo.kotabogor-api.my.id/HeaderslideUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/HeaderslideUpd/{id}
                                |
                                <button onclick="copy('Headerslide4')">Copy</button>
                            </p>
                            <p>
                                <p id="Headerslide5" style="display: none">https://kominfo.kotabogor-api.my.id/HeaderslideDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/HeaderslideDest/{id}
                                |
                                <button onclick="copy('Headerslide5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel KatBerita</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="KatBerita1" style="display: none">https://kominfo.kotabogor-api.my.id/KatBerita</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/KatBerita |
                            <button onclick="copy('KatBerita1')">Copy</button>
                        </p>
                        <p>
                            <p id="KatBerita2" style="display: none">https://kominfo.kotabogor-api.my.id/KatBerita/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/KatBerita/{id} |
                            <button onclick="copy('KatBerita2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="KatBerita3" style="display: none">https://kominfo.kotabogor-api.my.id/KatBeritaCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/KatBeritaCrt |
                                <button onclick="copy('KatBerita3')">Copy</button>
                            </p>
                            <p>
                                <p id="KatBerita4" style="display: none">https://kominfo.kotabogor-api.my.id/KatBeritaUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/KatBeritaUpd/{id} |
                                <button onclick="copy('KatBerita4')">Copy</button>
                            </p>
                            <p>
                                <p id="KatBerita5" style="display: none">https://kominfo.kotabogor-api.my.id/KatBeritaDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/KatBeritaDest/{id} |
                                <button onclick="copy('KatBerita5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel Kat_halstatis</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="Kat_halstatis1" style="display: none">https://kominfo.kotabogor-api.my.id/Kat_halstatis</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/Kat_halstatis |
                            <button onclick="copy('Kat_halstatis1')">Copy</button>
                        </p>
                        <p>
                            <p id="Kat_halstatis2" style="display: none">https://kominfo.kotabogor-api.my.id/Kat_halstatis/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/Kat_halstatis/{id}
                            |
                            <button onclick="copy('Kat_halstatis2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="Kat_halstatis3" style="display: none">https://kominfo.kotabogor-api.my.id/Kat_halstatisCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/Kat_halstatisCrt |
                                <button onclick="copy('Kat_halstatis3')">Copy</button>
                            </p>
                            <p>
                                <p id="Kat_halstatis4" style="display: none">https://kominfo.kotabogor-api.my.id/Kat_halstatisUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/Kat_halstatisUpd/{id} |
                                <button onclick="copy('Kat_halstatis4')">Copy</button>
                            </p>
                            <p>
                                <p id="Kat_halstatis5" style="display: none">https://kominfo.kotabogor-api.my.id/Kat_halstatisDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/Kat_halstatisDest/{id} |
                                <button onclick="copy('Kat_halstatis5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel Pengguna</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="Pengguna1" style="display: none">https://kominfo.kotabogor-api.my.id/Pengguna</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/Pengguna |
                            <button onclick="copy('Pengguna1')">Copy</button>
                        </p>
                        <p>
                            <p id="Pengguna2" style="display: none">https://kominfo.kotabogor-api.my.id/Pengguna/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/Pengguna/{id} |
                            <button onclick="copy('Pengguna2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="Pengguna3" style="display: none">https://kominfo.kotabogor-api.my.id/PenggunaCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/PenggunaCrt |
                                <button onclick="copy('Pengguna3')">Copy</button>
                            </p>
                            <p>
                                <p id="Pengguna4" style="display: none">https://kominfo.kotabogor-api.my.id/PenggunaUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/PenggunaUpd/{id} |
                                <button onclick="copy('Pengguna4')">Copy</button>
                            </p>
                            <p>
                                <p id="Pengguna5" style="display: none">https://kominfo.kotabogor-api.my.id/PenggunaDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/PenggunaDest/{id} |
                                <button onclick="copy('Pengguna5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel Profilopd</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="Profilopd1" style="display: none">https://kominfo.kotabogor-api.my.id/Profilopd</p>
                            <font color="green">GET</font> https://kominfo.kotabogor-api.my.id/Profilopd |
                            <button onclick="copy('Profilopd1')">Copy</button>
                        </p>
                        <p>
                            <p id="Profilopd2" style="display: none">https://kominfo.kotabogor-api.my.id/Profilopd/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/Profilopd/{id} |
                            <button onclick="copy('Profilopd2')">Copy</button>
                        </p>
                        @if (Auth::user()->role == 'admin')
                            <p>
                                <p id="Profilopd3" style="display: none">https://kominfo.kotabogor-api.my.id/ProfilopdCrt</p>
                                <font color="#F59946">POST</font> https://kominfo.kotabogor-api.my.id/ProfilopdCrt |
                                <button onclick="copy('Profilopd3')">Copy</button>
                            </p>
                            <p>
                                <p id="Profilopd4" style="display: none">https://kominfo.kotabogor-api.my.id/ProfilopdUpd/{id}</p>
                                <font color="#406BF5">PUT</font> https://kominfo.kotabogor-api.my.id/ProfilopdUpd/{id} |
                                <button onclick="copy('Profilopd4')">Copy</button>
                            </p>
                            <p>
                                <p id="Profilopd5" style="display: none">https://kominfo.kotabogor-api.my.id/ProfilopdDest/{id}</p>
                                <font color="red">DELETE</font> https://kominfo.kotabogor-api.my.id/ProfilopdDest/{id} |
                                <button onclick="copy('Profilopd5')">Copy</button>
                            </p>
                        @endif
                    </div>

                    <h1 style="font-size: 20px" class="mb-1 mt-4">Tabel Relasi</h1>
                    <div class="p-2 bg-gray border-l-4 border-gray-200">
                        <p>
                            <p id="relasi1" style="display: none">https://kominfo.kotabogor-api.my.id/agenda</p>
                            <font color="green">GET</font> &emsp;&emsp;&ensp; https://kominfo.kotabogor-api.my.id/agenda |
                            <button onclick="copy('relasi1')">Copy</button>
                        </p>
                        <p>
                            <p id="relasi2" style="display: none">https://kominfo.kotabogor-api.my.id/agenda/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/agenda/{id} |
                            <button onclick="copy('relasi2')">Copy</button>
                        </p>
                        <p>
                            <p id="relasi3" style="display: none">https://kominfo.kotabogor-api.my.id/berita</p>
                            <font color="green">GET</font> &emsp;&emsp;&ensp; https://kominfo.kotabogor-api.my.id/berita |
                            <button onclick="copy('relasi3')">Copy</button>
                        </p>
                        <p>
                            <p id="relasi4" style="display: none">https://kominfo.kotabogor-api.my.id/berita/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/berita/{id} |
                            <button onclick="copy('relasi4')">Copy</button>
                        </p>
                        <p>
                            <p id="relasi5" style="display: none">https://kominfo.kotabogor-api.my.id/album</p>
                            <font color="green">GET</font> &emsp;&emsp;&ensp; https://kominfo.kotabogor-api.my.id/album |
                            <button onclick="copy('relasi5')">Copy</button>
                        </p>
                        <p>
                            <p id="relasi6" style="display: none">https://kominfo.kotabogor-api.my.id/album/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/album/{id} |
                            <button onclick="copy('relasi6')">Copy</button>
                        </p>
                        <p>
                            <p id="relasi7" style="display: none">https://kominfo.kotabogor-api.my.id/halstatis</p>
                            <font color="green">GET</font> &emsp;&emsp;&ensp; https://kominfo.kotabogor-api.my.id/halstatis |
                            <button onclick="copy('relasi7')">Copy</button>
                        </p>
                        <p>
                            <p id="relasi8" style="display: none">https://kominfo.kotabogor-api.my.id/halstatis/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/halstatis/{id} |
                            <button onclick="copy('relasi8')">Copy</button>
                        </p>
                        <p>
                            <p id="relasi9" style="display: none">https://kominfo.kotabogor-api.my.id/galerifoto</p>
                            <font color="green">GET</font> &emsp;&emsp;&ensp; https://kominfo.kotabogor-api.my.id/galerifoto |
                            <button onclick="copy('relasi9')">Copy</button>
                        </p>
                        <p>
                            <p id="relasi10" style="display: none">https://kominfo.kotabogor-api.my.id/galerifoto/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/galerifoto/{id} |
                            <button onclick="copy('relasi10')">Copy</button>
                        </p>
                        <p>
                            <p id="relasi11" style="display: none">https://kominfo.kotabogor-api.my.id/galerivideo</p>
                            <font color="green">GET</font> &emsp;&emsp;&ensp; https://kominfo.kotabogor-api.my.id/galerivideo |
                            <button onclick="copy('relasi11')">Copy</button>
                        </p>
                        <p>
                            <p id="relasi12" style="display: none">https://kominfo.kotabogor-api.my.id/galerivideo/{id}</p>
                            <font color="green">GET</font> by ID https://kominfo.kotabogor-api.my.id/galerivideo/{id} |
                            <button onclick="copy('relasi12')">Copy</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
