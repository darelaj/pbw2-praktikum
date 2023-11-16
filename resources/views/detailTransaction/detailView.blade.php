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
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                <!-- {{ __('Transaction Detail') }} -->
                            </h2>
                        </header>

                        <form method="POST" action="{{ route('detailUpdate') }}" class="mt-6 space-y-6">
                            @csrf

                            <div>
                                <x-input-label for="id" :value="__('Id Detail Transaksi')" />
                                <x-text-input id="id" name="id" value="{{ $detailTransaction->idDetail }}"
                                    type="text" class="mt-1 block w-full" readonly />
                            </div>

                            <div>
                                <x-input-label for="idTransaksi" :value="__('Id Transaksi')" />
                                <x-text-input id="idTransaksi" name="idTransaksi"
                                    value="{{ $detailTransaction->idTransaksi }}" type="text"
                                    class="mt-1 block w-full" readonly />
                            </div>

                            <div>
                                <x-input-label for="peminjam" :value="__('Peminjam')" />
                                <x-text-input id="peminjam" name="peminjam" value="{{ $detailTransaction->peminjam }}"
                                    type="text" class="mt-1 block w-full" readonly />
                            </div>

                            <div>
                                <x-input-label for="petugas" :value="__('Petugas')" />
                                <x-text-input id="petugas" name="petugas" value="{{ $detailTransaction->petugas }}"
                                    type="text" class="mt-1 block w-full" readonly />
                            </div>

                            <div>
                                <x-input-label for="koleksi" :value="__('Koleksi')" />
                                <x-text-input id="koleksi" name="koleksi" value="{{ $detailTransaction->koleksi }}"
                                    type="text" class="mt-1 block w-full" readonly />
                            </div>

                            <div>
                                <x-input-label for="status" :value="__('Id Transaksi')" />
                                <select name="status" id="status" class="block mt-1 w-full" required
                                    autocomplete="off" placeholder="{{ $detailTransaction->status }}">
                                    <option value="1" @if (old('status', $detailTransaction->status) == 1) selected @endif>Pinjam
                                    </option>
                                    <option value="2" @if (old('status', $detailTransaction->status) == 2) selected @endif>Kembali
                                    </option>
                                    <option value="3" @if (old('status', $detailTransaction->status) == 3) selected @endif>Hilang
                                    </option>
                                </select>
                            </div>

                            <div class="flex items-center gap-4 mt-2">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                <a href="javascript:history.back();">
                                    <x-secondary-button>Kembali</x-secondary-button>
                                </a>
                            </div>

                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
