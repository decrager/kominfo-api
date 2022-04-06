<div class="row">
    <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#ProfilopdCollapse"
        aria-expanded="false">
        <div class="row">
            <div class="col-6">
                <div class="text-start" style="font-size: 20px">
                    Tabel Profil OPD
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
                        <td id="Profilopd1">https://api-kominfo.kotabogor.my.id/Profilopd</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Profilopd1')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Profilopd2">https://api-kominfo.kotabogor.my.id/Profilopd/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Profilopd2')">Copy</button></td>
                    </tr>
                    @if (Auth::user()->role=='admin')
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-danger pe-none">POST</button></td>
                        <td id="Profilopd3">https://api-kominfo.kotabogor.my.id/ProfilopdCrt</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Profilopd3')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Profilopd4">https://api-kominfo.kotabogor.my.id/ProfilopdUpd/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Profilopd4')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">DELETE</button></td>
                        <td id="Profilopd5">https://api-kominfo.kotabogor.my.id/ProfilopdDest/{id}</td>
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
                            "id": "int(3)", // Request Body
                            "nama_opd": "varchar(50)", // Request Body
                            "foto_kantor": "varchar(255)", // Request Body
                            "nama_kepalaopd": "varchar(50)", // Request Body
                            "foto_kepalaopd": "varchar(255)", // Request Body
                            "alamat": "varchar(100)", // Request Body
                            "telp": "varchar(15)", // Request Body
                            "email": "varchar(50)", // Request Body
                            "website": "varchar(50)", // Request Body
                            "twitter_widget": "text", // Request Body
                            "twitter_link": "varchar(100)", // Request Body
                            "ig_widget": "text", // Request Body
                            "ig_link": "varchar(100)", // Request Body
                            "facebook_widget": "text", // Request Body
                            "facebook_link": "varchar(100)", // Fillabel | Nullabel
                            "created_at": "Timestamp",
                            "updated_at": "Timestamp"
                        }
                        "Path to file": "https://api-kominfo.kotabogor.my.id/storage/images/opd/{file_name}"
                    </code>
                </pre>
            </div>
        </div>
    </div>
</div>