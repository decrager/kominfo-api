<div class="row">
    <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#HalstatisCollapse"
        aria-expanded="false">
        <div class="row">
            <div class="col-6">
                <div class="text-start" style="font-size: 20px">
                    Tabel Halstatis
                </div>
            </div>
            <div class="col-6">
                <div class="dropdown-logo float-end">
                    <img src="{{ asset('next.png') }}" width="25px">
                </div>
            </div>
        </div>
    </a>

    <div class="collapse" id="HalstatisCollapse">
        <div class="card card-body mt-2"> 
            <table class="mb-2">
                <tbody class="mb-2">
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Halstatis1">https://kominfo.kotabogor-api.my.id/Halstatis</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Halstatis1')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Halstatis2">https://kominfo.kotabogor-api.my.id/Halstatis/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Halstatis2')">Copy</button></td>
                    </tr>
                    @if (Auth::user()->role=='admin')
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Halstatis3">https://kominfo.kotabogor-api.my.id/HalstatisCrt</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Halstatis3')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Halstatis4">https://kominfo.kotabogor-api.my.id/HalstatisUpd/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Halstatis4')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-danger pe-none">DELETE</button></td>
                        <td id="Halstatis5">https://kominfo.kotabogor-api.my.id/HalstatisDest/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Halstatis5')">Copy</button></td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="hljs-code">
                <pre>
                    <code class="language-json text-left pt-3">
                        {
                            "id": "int(11)",
                            "judul": "varchar(100)",
                            "kategori_id": "int(11)",
                            "isi": "text",
                            "file": "varchar(255)",
                            "tgl": "date(yyyy-mm-dd)",
                            "status": "enum('0','1')",
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