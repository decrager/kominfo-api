<div class="row">
    <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#ProfilopdCollapse"
        aria-expanded="false">
        <div class="row">
            <div class="col-6">
                <div class="text-start" style="font-size: 20px">
                    Tabel Profilopd
                </div>
            </div>
            <div class="col-6">
                <div class="dropdown-logo float-end">
                    <img src="{{ asset('next.png') }}" width="25px">
                </div>
            </div>
        </div>
    </a>

    <div class="collapse" id="ProfilopdCollapse">
        <div class="card card-body mt-2">
            <table class="mb-2">
                <tbody class="mb-2">
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Profilopd1">https://kominfo.kotabogor-api.my.id/Profilopd</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Profilopd1')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Profilopd2">https://kominfo.kotabogor-api.my.id/Profilopd/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Profilopd2')">Copy</button></td>
                    </tr>
                    @if (Auth::user()->role=='admin')
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-danger pe-none">POST</button></td>
                        <td id="Profilopd3">https://kominfo.kotabogor-api.my.id/ProfilopdCrt</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Profilopd3')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-primary pe-none">PUT</button></td>
                        <td id="Profilopd4">https://kominfo.kotabogor-api.my.id/ProfilopdUpd/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Profilopd4')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">DELETE</button></td>
                        <td id="Profilopd5">https://kominfo.kotabogor-api.my.id/ProfilopdDest/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Profilopd5')">Copy</button></td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="hljs-code">
                <pre>
                    <code class="language-json text-left pt-3">
                        {
                            "id": "int(3)",
                            "nama_opd": "varchar(50)",
                            "foto_kantor": "varchar(50)",
                            "nama_kepalaopd": "varchar(50)",
                            "foto_kepalaopd": "varchar(50)",
                            "alamat": "varchar(100)",
                            "telp": varchar(15),
                            "email": "varchar(50)",
                            "website": "varchar(50)",
                            "twitter_alamat": "varchar(50)",
                            "twitter_link": "varchar(100)",
                            "ig_alamat": "varchar(50)",
                            "ig_link": "varchar(100)",
                            "facebook_alamat": "varchar(50)",
                            "facebook_link": "varchar(100)",
                            "created_at": "Timestamp",
                            "updated_at": "Timestamp"
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
</div>