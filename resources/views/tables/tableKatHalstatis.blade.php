<div class="row">
    <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#Kat_halstatisCollapse"
        aria-expanded="false">
        <div class="row">
            <div class="col-6">
                <div class="text-start" style="font-size: 20px">
                    Tabel Kategori Hal Statis
                </div>
            </div>
            <div class="col-6">
                <div class="dropdown-logo float-end">
                    <img src="{{ asset('next.png') }}" width="25px">
                </div>
            </div>
        </div>
    </a>

    <div class="collapse" id="Kat_halstatisCollapse">
        <div class="card card-body mt-2">
            <table class="mb-2">
                <tbody class="mb-2">
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Kat_halstatis1">https://api-kominfo.kotabogor.my.id/Kat_halstatis</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Kat_halstatis1')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Kat_halstatis2">https://api-kominfo.kotabogor.my.id/Kat_halstatis/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Kat_halstatis2')">Copy</button></td>
                    </tr>
                    @if (Auth::user()->role=='admin')
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Kat_halstatis3">https://api-kominfo.kotabogor.my.id/Kat_halstatisCrt</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Kat_halstatis3')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-primary pe-none">PUT</button></td>
                        <td id="Kat_halstatis4">https://api-kominfo.kotabogor.my.id/Kat_halstatisUpd/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Kat_halstatis4')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-danger pe-none">DELETE</button></td>
                        <td id="Kat_halstatis5">https://api-kominfo.kotabogor.my.id/Kat_halstatisDest/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Kat_halstatis5')">Copy</button></td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="hljs-code">
                <pre>
                    <code class="language-json text-left pt-3">
                        {
                            "id": "int(11)",
                            "kategori": "varchar(50)", // Request Body
                            "keterangan": "varchar(50)", // Request Body
                            "created_at": "Timestamp",
                            "updated_at": "Timestamp"
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
</div>