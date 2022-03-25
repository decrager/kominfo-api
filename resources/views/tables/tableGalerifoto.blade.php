<div class="row">
    <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#GalerifotoCollapse"
        aria-expanded="false">
        <div class="row">
            <div class="col-6">
                <div class="text-start" style="font-size: 20px">
                    Tabel Galeri Foto
                </div>
            </div>
            <div class="col-6">
                <div class="dropdown-logo float-end">
                    <img src="{{ asset('next.png') }}" width="25px">
                </div>
            </div>
        </div>
    </a>

    <div class="collapse" id="GalerifotoCollapse">
        <div class="card card-body mt-2"> 
            <table class="mb-2">
                <tbody class="mb-2">
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Galerifoto1">https://api-kominfo.kotabogor.my.id/Galerifoto</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerifoto1')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Galerifoto2">https://api-kominfo.kotabogor.my.id/Galerifoto/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerifoto2')">Copy</button></td>
                    </tr>
                    @if (Auth::user()->role=='admin')
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Galerifoto3">https://api-kominfo.kotabogor.my.id/GalerifotoCrt</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerifoto3')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Galerifoto4">https://api-kominfo.kotabogor.my.id/GalerifotoUpd/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerifoto4')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-danger pe-none">DELETE</button></td>
                        <td id="Galerifoto5">https://api-kominfo.kotabogor.my.id/GalerifotoDest/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerifoto5')">Copy</button></td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="hljs-code">
                <pre>
                    <code class="language-json text-left pt-3">
                        {
                            "id": "int(11)",
                            "album_id": "int(11)", // Fillabel | Required
                            "judul": "varchar", // Fillabel | Required
                            "foto": "varchar(255)", // Fillabel | Required
                            "keterangan": "varchar(100)", // Fillabel | Required
                            "created_at": "Timestamp",
                            "updated_at": "Timestamp"
                        }
                        "Path to file": "https://api-kominfo.kotabogor.my.id/storage/images/foto/{file_name}"
                    </code>
                </pre>
            </div>
        </div>
    </div>
</div>