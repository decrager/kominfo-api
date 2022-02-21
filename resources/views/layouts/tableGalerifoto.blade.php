<div class="row">
    <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#GalerifotoCollapse"
        aria-expanded="false">
        <div class="row">
            <div class="col-6">
                <div class="text-start" style="font-size: 20px">
                    Tabel Galerifoto
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
                        <td id="Galerifoto1">https://kominfo.kotabogor-api.my.id/Galerifoto</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerifoto1')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Galerifoto2">https://kominfo.kotabogor-api.my.id/Galerifoto/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerifoto2')">Copy</button></td>
                    </tr>
                    @if (Auth::user()->role=='admin')
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Galerifoto3">https://kominfo.kotabogor-api.my.id/GalerifotoCrt</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerifoto3')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Galerifoto4">https://kominfo.kotabogor-api.my.id/GalerifotoUpd/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerifoto4')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-danger pe-none">DELETE</button></td>
                        <td id="Galerifoto5">https://kominfo.kotabogor-api.my.id/GalerifotoDest/{id}</td>
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
                            "album_id": "int(11)",
                            "judul": "varchar",
                            "foto": "varchar(50)",
                            "keterangan": "varchar(100)",
                            "created_at": "Timestamp",
                            "updated_at": "Timestamp"
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
</div>