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
                                <!-- {{ __('Update akun pengguna') }} -->
                            </p>
                        </header>

                        <form method="POST" action="{{ route('user.updateUser') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $user->id }}">

                            <div>
                                <x-input-label for="username" :value="__('Username')" />
                                <x-text-input id="username" name="username" :value="old('username', $user->username)" type="text"
                                    class="mt-1 block w-full" />
                            </div>

                            <div>
                                <x-input-label for="fullname" :value="__('Nama Lengkap')" />
                                <x-text-input id="fullname" name="fullname" :value="old('fullname', $user->fullname)" type="text"
                                    class="mt-1 block w-full" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" :value="old('email', $user->email)" name="email" type="text"
                                    class="mt-1 block w-full" />
                            </div>

                            <div>
                                <x-input-label for="address" :value="__('Alamat')" />
                                <x-text-input id="address" :value="old('address', $user->address)" name="address" type="text"
                                    class="mt-1 block w-full" />
                            </div>

                            <div>
                                <x-input-label for="birthdate" :value="__('birthdate')" />
                                <x-text-input id="birthdate" :value="old('birthdate', $user->birthdate)" name="birthdate" type="date"
                                    class="mt-1 block w-full" />
                            </div>

                            <div>
                                <x-input-label for="phoneNumber" :value="__('phoneNumber')" />
                                <x-text-input id="phoneNumber" :value="old('phoneNumber', $user->phoneNumber)" name="phoneNumber" type="text"
                                    class="mt-1 block w-full" />
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
