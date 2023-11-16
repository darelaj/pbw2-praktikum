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
                                <!-- {{ __('Profile Information') }} -->
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                <!-- {{ __("Update your account's profile information and email address.") }} -->
                            </p>
                        </header>

                        <form method="POST" action="{{ route('koleksi.updateKoleksi') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $collection->id }}">

                            <div>
                                <x-input-label for="namaKoleksi" :value="__('Nama Koleksi')" />
                                <x-text-input id="namaKoleksi" name="namaKoleksi" value="{{ $collection->namaKoleksi }}"
                                    type="text" class="mt-1 block w-full" />
                            </div>

                            <div>
                                <x-input-label for="jumlahKoleksi" :value="__('Jumlah Koleksi')" />
                                <x-text-input id="jumlahKoleksi" name="jumlahKoleksi"
                                    value="{{ $collection->jumlahKoleksi }}" type="text" class="mt-1 block w-full" />
                            </div>

                            <div>
                                <x-input-label for="jenisKoleksi" :value="__('Jenis Koleksi')" />
                                <select name="jenisKoleksi" id="jenisKoleksi" class="block mt-1 w-full" required
                                    autocomplete="off" placeholder="">
                                    <option value="1" @if (old('jenisKoleksi', $collection->jenisKoleksi) == 1) selected @endif>Buku
                                    </option>
                                    <option value="2" @if (old('jenisKoleksi', $collection->jenisKoleksi) == 2) selected @endif>Majalah
                                    </option>
                                    <option value="3" @if (old('jenisKoleksi', $collection->jenisKoleksi) == 3) selected @endif>Cakram
                                        Digital</option>
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
