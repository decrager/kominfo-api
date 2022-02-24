<div class="row">
    <a class="d-inline-block bg-white btn py-2" data-bs-toggle="collapse" data-bs-target="#BannerCollapse"
        aria-expanded="false">
        <div class="row">
            <div class="col-6">
                <div class="text-start" style="font-size: 20px">
                    Tabel Banner
                </div>
            </div>
            <div class="col-6">
                <div class="dropdown-logo float-end">
                    <img src="{{ asset('next.png') }}" width="25px">
                </div>
            </div>
        </div>
    </a>

    <div class="collapse" id="BannerCollapse">
        <div class="card card-body mt-2"> 
            <table class="mb-2">
                <tbody class="mb-2">
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Banner1">https://kominfo.kotabogor-api.my.id/Banner</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Banner1')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-success pe-none">GET</button></td>
                        <td id="Banner2">https://kominfo.kotabogor-api.my.id/Banner/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Banner2')">Copy</button></td>
                    </tr>
                    @if (Auth::user()->role=='admin')
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Banner3">https://kominfo.kotabogor-api.my.id/BannerCrt</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Banner3')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-warning pe-none">POST</button></td>
                        <td id="Banner4">https://kominfo.kotabogor-api.my.id/BannerUpd/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Banner4')">Copy</button></td>
                    </tr>
                    <tr>
                        <td class="col-1" scope="row"><button
                                class="btn btn-outline-danger pe-none">DELETE</button></td>
                        <td id="Banner5">https://kominfo.kotabogor-api.my.id/BannerDest/{id}</td>
                        <td><button class="btn btn-success float-end"
                                onclick="copy('Banner5')">Copy</button></td>
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
                            "kategori": "enum('0','1')",
                            "file": "varchar(255)",
                            "link": "varchar(100)",
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