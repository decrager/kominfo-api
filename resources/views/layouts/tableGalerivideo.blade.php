<div class="row">
    <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#GalerivideoCollapse"
        aria-expanded="false">
        <div class="row">
            <div class="col-6">
                <div class="text-start" style="font-size: 20px">
                    Tabel Galerivideo
                </div>
            </div>
            <div class="col-6">
                <div class="dropdown-logo float-end">
                    <img src="{{ asset('next.png') }}" width="25px">
                </div>
            </div>
        </div>
    </a>

    <div class="collapse" id="GalerivideoCollapse">
        <div class="card card-body mt-2"> 
            <table class="mb-2">
                <tbody class="mb-2">
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Galerivideo1">https://kominfo.kotabogor-api.my.id/Galerivideo</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerivideo1')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Galerivideo2">https://kominfo.kotabogor-api.my.id/Galerivideo/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerivideo2')">Copy</button></td>
                    </tr>
                    @if (Auth::user()->role=='admin')
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Galerivideo3">https://kominfo.kotabogor-api.my.id/GalerivideoCrt</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerivideo3')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-primary pe-none">PUT</button></td>
                        <td id="Galerivideo4">https://kominfo.kotabogor-api.my.id/GalerivideoUpd/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerivideo4')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-danger pe-none">DELETE</button></td>
                        <td id="Galerivideo5">https://kominfo.kotabogor-api.my.id/GalerivideoDest/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Galerivideo5')">Copy</button></td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="hljs-code">
                <pre>
                    <code class="language-json text-left pt-3">
                        {
                            "id": "int(11)",
                            "judul": "varchar(85)",
                            "cover": "varchar(50)",
                            "embed": "varchar(50)",
                            "keterangan": "varchar(100)",
                            "user_id": "int(11)",
                            "created_at": "Timestamp",
                            "updated_at": "Timestamp"
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
</div>