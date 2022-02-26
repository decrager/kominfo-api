<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('REST API Website Kominfo Kota Bogor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('tables.tableLogin')
                    @include('tables.tableAgenda')
                    @include('tables.tableAlbum')
                    @include('tables.tableBanner')
                    @include('tables.tableBerita')
                    @include('tables.tableDokumen')
                    @include('tables.tableFaq')
                    @include('tables.tableGalerifoto')
                    @include('tables.tableGalerivideo')
                    @include('tables.tableHalstatis')
                    @include('tables.tableHeaderslide')
                    @include('tables.tableKatBerita')
                    @include('tables.tableKatHalstatis')
                    @include('tables.tablePengguna')
                    @include('tables.tableProfilopd')
                    @include('tables.tableVisitor')
                    @include('tables.tableRelasi')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
