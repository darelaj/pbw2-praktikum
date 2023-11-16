<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead>
                            <tr>
                                <th
                                    class="p-2 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    ID Koleksi
                                </th>
                                <th
                                    class="p-2 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Nama Koleksi
                                </th>
                                <th
                                    class="p-2 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Jenis Koleksi
                                </th>
                                <th
                                    class="p-2 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Jumlah Koleksi
                                </th>
                                <th
                                    class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($collections as $collection)
                                <tr>
                                    <th
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ $collection->id }}
                                    </th>
                                    <th
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ $collection->namaKoleksi }}
                                    </th>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        @if ($collection->jenisKoleksi === 1)
                                            Buku
                                        @elseif ($collection->jenisKoleksi === 2)
                                            Majalah
                                        @elseif ($collection->jenisKoleksi === 3)
                                            Cakram Digital
                                        @else
                                            Unknown Type
                                        @endif
                                    </td>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        <i class="fas fa-arrow-up text-emerald-500 mr-4"></i>
                                        {{ $collection->jumlahKoleksi }}
                                    </td>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        <a
                                            href="{{ route('koleksi.infoKoleksi', $collection->id) }}"><x-primary-button>Edit</x-primary-button></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
