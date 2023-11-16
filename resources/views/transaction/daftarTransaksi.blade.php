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
                                    No
                                </th>
                                <th
                                    class="p-2 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Nama Peminjam
                                </th>
                                <th
                                    class="p-2 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Nama Petugas
                                </th>
                                <th
                                    class="p-2 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Tanggal Pinjam
                                </th>
                                <th
                                    class="p-2 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Tanggal Selesai
                                </th>
                                <th
                                    class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ $transaction->id }}
                                    </td>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ $transaction->peminjam }}
                                    </td>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ $transaction->petugas }}
                                    </td>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ $transaction->tanggalPinjam }}
                                    </td>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ $transaction->tanggalSelesai }}
                                    </td>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        <a
                                            href="{{ route('transaksiTampil', $transaction->id) }}"><x-primary-button>Detail</x-primary-button></a>
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
