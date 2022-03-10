<div class="row">
    <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#HeaderslideCollapse"
        aria-expanded="false">
        <div class="row">
            <div class="col-6">
                <div class="text-start" style="font-size: 20px">
                    Tabel Headerslide
                </div>
            </div>
            <div class="col-6">
                <div class="dropdown-logo float-end">
                    <img src="{{ asset('next.png') }}" width="25px">
                </div>
            </div>
        </div>
    </a>

    <div class="collapse" id="HeaderslideCollapse">
        <div class="card card-body mt-2"> 
            <table class="mb-2">
                <tbody class="mb-2">
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Headerslide1">https://api-kominfo.kotabogor.my.id/Headerslide</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Headerslide1')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Headerslide2">https://api-kominfo.kotabogor.my.id/Headerslide/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Headerslide2')">Copy</button></td>
                    </tr>
                    @if (Auth::user()->role=='admin')
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Headerslide3">https://api-kominfo.kotabogor.my.id/HeaderslideCrt</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Headerslide3')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Headerslide4">https://api-kominfo.kotabogor.my.id/HeaderslideUpd/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Headerslide4')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-danger pe-none">DELETE</button></td>
                        <td id="Headerslide5">https://api-kominfo.kotabogor.my.id/HeaderslideDest/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Headerslide5')">Copy</button></td>
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
                            "file": "varchar(255)",
                            "keterangan": "varchar(100)",
                            "status": "enum('0','1')",
                            "created_at": "Timestamp",
                            "updated_at": "Timestamp"
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
</div>