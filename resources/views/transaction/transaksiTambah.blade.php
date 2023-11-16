<x-guest-layout>
    <form method="POST" action="{{ url('transaksiStore') }}">
        @csrf

        <!-- Peminjam -->
        <div class="mt-4">
            <x-input-label for="userIdPeminjam" :value="__('Peminjam')" />
            <select name="userIdPeminjam" id="userIdPeminjam" class="block mt-1 w-full" required autocomplete="off">
                @foreach ($users as $userId => $userName)
                    <option value="{{ $userId }}">{{ $userName }}</option>
                @endforeach
            </select>
        </div>

        {{-- Koleksi 1 --}}
        <div class="mt-4">
            <x-input-label for="koleksi1" :value="__('Koleksi 1')" />
            <select name="koleksi1" id="koleksi1" class="block mt-1 w-full" required autocomplete="off">
                <option value="-1">Pilih</option>
                @foreach ($collections as $collection)
                    <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }} </option>
                @endforeach
            </select>
        </div>

        {{-- Koleksi 2 --}}
        <div class="mt-4">
            <x-input-label for="koleksi2" :value="__('Koleksi 2')" />
            <select name="koleksi2" id="koleksi2" class="block mt-1 w-full" required autocomplete="off">
                <option value="-1">Pilih</option>
                @foreach ($collections as $collection)
                    <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }} </option>
                @endforeach
            </select>
        </div>

        {{-- Koleksi 3 --}}
        <div class="mt-4">
            <x-input-label for="koleksi3" :value="__('Koleksi 3')" />
            <select name="koleksi3" id="koleksi3" class="block mt-1 w-full" required autocomplete="off">
                <option value="-1">Pilih</option>
                @foreach ($collections as $collection)
                    <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }} </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
