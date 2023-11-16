<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <!-- {{ __('Profile') }} -->
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>

                        <input type="hidden" name="id" value="{{ $transactions->id }}">

                        <div>
                            <x-input-label for="userIdPeminjam" :value="__('Peminjam')" />
                            <x-text-input id="userIdPeminjam" name="userIdPeminjam"
                                value="{{ $transactions->peminjam }}" type="text" class="mt-1 block w-full"
                                readonly />
                        </div>

                        <div>
                            <x-input-label for="userIdPetugas" :value="__('Petugas')" />
                            <x-text-input id="userIdPetugas" name="userIdPetugas" value="{{ $transactions->petugas }}"
                                type="text" class="mt-1 block w-full" readonly />
                        </div>

                        <br>

                    </section>

                </div>
                <div>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th
                                        class="p-2 dark:text-white bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        No
                                    </th>
                                    <th
                                        class="p-2 dark:text-white bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Koleksi
                                    </th>
                                    <th
                                        class="p-2 dark:text-white bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Tanggal Pinjam
                                    </th>
                                    <th
                                        class="p-2 dark:text-white bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Tanggal Selesai
                                    </th>
                                    <th
                                        class="p-2 dark:text-white bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Status
                                    </th>
                                    <th
                                        class="p-4 dark:text-white bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detailTransactions as $detailTransaction)
                                    <tr>
                                        <th
                                            class="dark:text-white p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            {{ $detailTransaction->id }}
                                        </th>
                                        <th
                                            class="dark:text-white p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            {{ $detailTransaction->koleksi }}
                                        </th>
                                        <th
                                            class="dark:text-white p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            {{ $detailTransaction->tanggalPinjam }}
                                        </th>
                                        <th
                                            class="dark:text-white p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            {{ $detailTransaction->tanggalKembali }}
                                        </th>
                                        <th
                                            class="dark:text-white p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            @if ($detailTransaction->status === 1)
                                                Pinjam
                                            @elseif ($detailTransaction->status === 2)
                                                Kembali
                                            @elseif ($detailTransaction->status === 3)
                                                Hilang
                                            @else
                                                Unknown Type
                                            @endif
                                        </th>
                                        <th
                                            class="dark:text-white p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            <a
                                                href="{{ route('detailKembali', $detailTransaction->id) }}"><x-primary-button>Edit</x-primary-button></a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <br>
                    <div class="flex items-center gap-4 mt-2">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                        <a href="javascript:history.back();">
                            <x-secondary-button>Kembali</x-secondary-button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
