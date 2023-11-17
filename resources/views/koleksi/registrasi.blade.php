<x-guest-layout>
    <form method="POST" action="{{ url('koleksiStore') }}">
        @csrf

        <!-- Nama koleksi -->
        <div class="mt-4">
            <x-input-label for="namaKoleksi" :value="__('Nama Koleksi')" />
            <x-text-input id="namaKoleksi" class="block mt-1 w-full" type="text" name="namaKoleksi" :value="old('namaKoleksi')"
                required autofocus autocomplete="namaKoleksi" />
            <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
        </div>

        {{-- Jenis Koleksi --}}
        <div class="mt-4">
            <x-input-label for="jenisKoleksi" :value="__('Jenis Koleksi')" />
            <select name="jenisKoleksi" id="jenisKoleksi" class="block mt-1 w-full" required autocomplete="off">
                <option value="1">Buku</option>
                <option value="2">Majalah</option>
                <option value="3">Cakram Digital</option>
            </select>
        </div>

        {{-- Jumlah Koleksi --}}
        <div class="mt-4">
            <x-input-label for="jumlahKoleksi" :value="__('Jumlah Koleksi')" />
            <x-text-input id="jumlahKoleksi" class="block mt-1 w-full" type="text" name="jumlahKoleksi"
                :value="old('jumlahKoleksi')" required autofocus autocomplete="jumlahKoleksi" />
            <x-input-error :messages="$errors->get('jumlahKoleksi')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-reset-button class="ml-4">
                {{ __('Reset') }}
            </x-reset-button>
            <x-primary-button class="ml-4">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
