<div class="row">
    <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#RelasiCollapse"
        aria-expanded="false">
        <div class="row">
            <div class="col-6">
                <div class="text-start" style="font-size: 20px">
                    Tabel Relasi
                </div>
            </div>
            <div class="col-6">
                <div class="dropdown-logo float-end">
                    <img src="{{ asset('next.png') }}" width="25px">
                </div>
            </div>
        </div>
    </a>

    <div class="collapse" id="RelasiCollapse">
        <div class="card card-body mt-2">

            <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#relasi1Collapse"
                aria-expanded="false">
                <div class="row">
                    <div class="col-6">
                        <div class="text-start" style="font-size: 18px">
                            Tabel Agenda dengan Pengguna
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="dropdown-logo float-end">
                            <img src="{{ asset('next.png') }}" width="20px">
                        </div>
                    </div>
                </div>
            </a>

            <div class="collapse" id="relasi1Collapse">
                <div class="card card-body mt-2">
                    <table class="mb-2">
                        <tbody class="mb-2">
                            <tr>
                                <td class="col-1" scope="row"><button
                                        class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="agenda01">https://api-kominfo.kotabogor.my.id/agenda</td>
                                <td><button class="btn btn-success float-end" onclick="copy('agenda01')">Copy</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-1" scope="row"><button
                                        class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="agenda02">https://api-kominfo.kotabogor.my.id/agenda/{id}</td>
                                <td><button class="btn btn-success float-end" onclick="copy('agenda02')">Copy</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="hljs-code">
                        <pre>
                            <code class="language-json pt-3" style="margin-left: -270px;">
                                {
                                    "id": "int(11)",
                                    "hari": "varchar(10)",
                                    "tgl": "date(yyyy-mm-dd)",
                                    "waktu": "time(minute:second)",
                                    "lokasi": "varchar(100)",
                                    "kegiatan": "varchar(250)",
                                    "user_id": "int(11)",
                                    "pengguna": {
                                        "id": "int(3)",
                                        "nama": "varchar(50)",
                                        "email": "varchar(50)",
                                        "telp": "varchar(15)",
                                        "username": "varchar(25)",
                                        "role": "varchar(25)",
                                        "foto": "varchar(255)",
                                        "level": "int(2)"
                                    }
                                }
                            </code>
                        </pre>
                    </div>
                </div>
            </div>

            <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#relasi2Collapse"
                aria-expanded="false">
                <div class="row">
                    <div class="col-6">
                        <div class="text-start" style="font-size: 18px">
                            Tabel Album dengan Pengguna
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="dropdown-logo float-end">
                            <img src="{{ asset('next.png') }}" width="20px">
                        </div>
                    </div>
                </div>
            </a>

            <div class="collapse" id="relasi2Collapse">
                <div class="card card-body mt-2">
                    <table class="mb-2">
                        <tbody class="mb-2">
                            <tr>
                                <td class="col-1" scope="row"><button
                                        class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="album01">https://api-kominfo.kotabogor.my.id/album</td>
                                <td><button class="btn btn-success float-end" onclick="copy('album01')">Copy</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-1" scope="row"><button
                                        class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="album02">https://api-kominfo.kotabogor.my.id/album/{id}</td>
                                <td><button class="btn btn-success float-end" onclick="copy('album02')">Copy</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="hljs-code">
                        <pre>
                            <code class="language-json pt-3" style="margin-left: -270px;">
                                {
                                    "id": "int(11)",
                                        "judul": "varchar(100)",
                                        "tgl": "date(yyyy-mm-dd)",
                                        "cover": "varchar(255)",
                                        "user_id": "int(11)",
                                    "pengguna": {
                                        "id": "int(3)",
                                        "nama": "varchar(50)",
                                        "email": "varchar(50)",
                                        "telp": "varchar(15)",
                                        "username": "varchar(25)",
                                        "role": "varchar(25)",
                                        "foto": "varchar(255)",
                                        "level": "int(2)"
                                    }
                                }
                            </code>
                        </pre>
                    </div>
                </div>
            </div>

            <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#relasi3Collapse"
                aria-expanded="false">
                <div class="row">
                    <div class="col-6">
                        <div class="text-start" style="font-size: 18px">
                            Tabel Berita dengan Kat_berita & Pengguna
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="dropdown-logo float-end">
                            <img src="{{ asset('next.png') }}" width="20px">
                        </div>
                    </div>
                </div>
            </a>

            <div class="collapse" id="relasi3Collapse">
                <div class="card card-body mt-2">
                    <table class="mb-2">
                        <tbody class="mb-2">
                            <tr>
                                <td class="col-1" scope="row"><button class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="berita01">https://api-kominfo.kotabogor.my.id/berita</td>
                                <td><button class="btn btn-success float-end" onclick="copy('berita01')">Copy</button></td>
                            </tr>
                            <tr>
                                <td class="col-1" scope="row"><button
                                        class="btn btn-outline-success pe-none">GET</button></td>
                                <td>https://api-kominfo.kotabogor.my.id/beritaPublic <font style="opacity: 60%"> (Search & Pagination Ready)</font></td>
                                <p hidden id="Berita02">https://api-kominfo.kotabogor.my.id/beritaPublic</p>
                                <td><button class="btn btn-success float-end"
                                        onclick="copy('Berita02')">Copy</button></td>
                            </tr>
                            <tr>
                                <td class="col-1" scope="row"><button class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="berita03">https://api-kominfo.kotabogor.my.id/berita/{id}</td>
                                <td><button class="btn btn-success float-end" onclick="copy('berita03')">Copy</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="hljs-code">
                        <pre>
                            <code class="language-json pt-3" style="margin-left: -270px;">
                                {
                                    "id": "int(11)",
                                    "judul": "varchar(100)",
                                    "kategori_id": "int(11)",
                                    "isi": "text",
                                    "gambar": "varchar(255)",
                                    "tgl" : "date(yyyy-mm-dd)",
                                    "status": "enum('0','1')",
                                    "Kat_berita": {
                                        "id": "int(11)",
                                        "kategori": "varchar(50)",
                                        "keterangan": "varchar(50)"
                                    }
                                    "pengguna": {
                                        "id": "int(3)",
                                        "nama": "varchar(50)",
                                        "email": "varchar(50)",
                                        "telp": "varchar(15)",
                                        "username": "varchar(25)",
                                        "role": "varchar(25)",
                                        "foto": "varchar(255)",
                                        "level": "int(2)"
                                    }
                                }
                            </code>
                        </pre>
                    </div>
                </div>
            </div>

            <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#relasi4Collapse"
                aria-expanded="false">
                <div class="row">
                    <div class="col-6">
                        <div class="text-start" style="font-size: 18px">
                            Tabel Halstatis dengan Kat_halstatis & Pengguna
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="dropdown-logo float-end">
                            <img src="{{ asset('next.png') }}" width="20px">
                        </div>
                    </div>
                </div>
            </a>

            <div class="collapse" id="relasi4Collapse">
                <div class="card card-body mt-2">
                    <table class="mb-2">
                        <tbody class="mb-2">
                            <tr>
                                <td class="col-1" scope="row"><button class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="halstatis01">https://api-kominfo.kotabogor.my.id/halstatis</td>
                                <td><button class="btn btn-success float-end" onclick="copy('halstatis01')">Copy</button></td>
                            </tr>
                            <tr>
                                <td class="col-1" scope="row"><button class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="halstatis02">https://api-kominfo.kotabogor.my.id/halstatis/{id}</td>
                                <td><button class="btn btn-success float-end" onclick="copy('halstatis02')">Copy</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="hljs-code">
                        <pre>
                            <code class="language-json pt-3" style="margin-left: -270px;">
                                {
                                    "id": "int(11)",
                                    "judul": "varchar(100)",
                                    "kategori_id": "int(11)",
                                    "isi": "text",
                                    "file": "varchar(255)",
                                    "tgl": "date(yyyy-mm-dd)",
                                    "status": "enum('0','1')",
                                    "user_id": "int(11)",
                                    "Kat_halstatis": {
                                        "id": "int(11)",
                                        "kategori": "varchar(50)",
                                        "keterangan": "varchar(50)"
                                    }
                                    "pengguna": {
                                        "id": "int(3)",
                                        "nama": "varchar(50)",
                                        "email": "varchar(50)",
                                        "telp": "varchar(15)",
                                        "username": "varchar(25)",
                                        "role": "varchar(25)",
                                        "foto": "varchar(255)",
                                        "level": "int(2)"
                                    }
                                }
                            </code>
                        </pre>
                    </div>
                </div>
            </div>

            <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#relasi5Collapse"
                aria-expanded="false">
                <div class="row">
                    <div class="col-6">
                        <div class="text-start" style="font-size: 18px">
                            Tabel Galerifoto dengan Album
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="dropdown-logo float-end">
                            <img src="{{ asset('next.png') }}" width="20px">
                        </div>
                    </div>
                </div>
            </a>

            <div class="collapse" id="relasi5Collapse">
                <div class="card card-body mt-2">
                    <table class="mb-2">
                        <tbody class="mb-2">
                            <tr>
                                <td class="col-1" scope="row"><button class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="galerifoto01">https://api-kominfo.kotabogor.my.id/galerifoto</td>
                                <td><button class="btn btn-success float-end" onclick="copy('galerifoto01')">Copy</button></td>
                            </tr>
                            <tr>
                                <td class="col-1" scope="row"><button class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="galerifoto02">https://api-kominfo.kotabogor.my.id/galerifoto/{id}</td>
                                <td><button class="btn btn-success float-end" onclick="copy('galerifoto02')">Copy</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="hljs-code">
                        <pre>
                            <code class="language-json pt-3" style="margin-left: -270px;">
                                {
                                    "id": "int(11)",
                                    "album_id": "int(11)",
                                    "judul": "varchar",
                                    "foto": "varchar(255)",
                                    "keterangan": "varchar(100)",
                                    "album": {
                                        "id": "int(11)",
                                        "judul": "varchar(100)",
                                        "tgl": "date(yyyy-mm-dd)",
                                        "cover": "varchar(255)",
                                        "user_id": "int(11)",
                                    }
                                }
                            </code>
                        </pre>
                    </div>
                </div>
            </div>

            <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#relasi6Collapse"
                aria-expanded="false">
                <div class="row">
                    <div class="col-6">
                        <div class="text-start" style="font-size: 18px">
                            Tabel Galerivideo dengan Pengguna
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="dropdown-logo float-end">
                            <img src="{{ asset('next.png') }}" width="20px">
                        </div>
                    </div>
                </div>
            </a>

            <div class="collapse" id="relasi6Collapse">
                <div class="card card-body mt-2">
                    <table class="mb-2">
                        <tbody class="mb-2">
                            <tr>
                                <td class="col-1" scope="row"><button class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="galerivideo01">https://api-kominfo.kotabogor.my.id/galerivideo</td>
                                <td><button class="btn btn-success float-end" onclick="copy('galerivideo01')">Copy</button></td>
                            </tr>
                            <tr>
                                <td class="col-1" scope="row"><button class="btn btn-outline-success pe-none">GET</button></td>
                                <td id="galerivideo02">https://api-kominfo.kotabogor.my.id/galerivideo/{id}</td>
                                <td><button class="btn btn-success float-end" onclick="copy('galerivideo02')">Copy</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="hljs-code">
                        <pre>
                            <code class="language-json pt-3" style="margin-left: -270px;">
                                {
                                    "id": "int(11)",
                                    "judul": "varchar(85)",
                                    "cover": "varchar(255)",
                                    "embed": "varchar(50)",
                                    "keterangan": "varchar(100)",
                                    "user_id": "int(11)",
                                    "pengguna": {
                                        "id": "int(3)",
                                        "nama": "varchar(50)",
                                        "email": "varchar(50)",
                                        "telp": "varchar(15)",
                                        "username": "varchar(25)",
                                        "role": "varchar(25)",
                                        "foto": "varchar(255)",
                                        "level": "int(2)"
                                    }
                                }
                            </code>
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
