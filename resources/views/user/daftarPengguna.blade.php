<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Username
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Nama lengkap
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    email
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Alamat
                                </th>
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Tanggal lahir
                                </th>
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Nomor telepon
                                </th>
                                <th
                                    class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ $user['username'] }}
                                    </th>
                                    <th
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ $user['fullname'] }}
                                    </th>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ $user['email'] }}
                                    </td>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{ $user['address'] }}
                                    </td>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        <i class="fas fa-arrow-up text-emerald-500 mr-4"></i>
                                        {{ $user['birthdate'] }}
                                    </td>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        <i class="fas fa-arrow-up text-emerald-500 mr-4"></i>
                                        {{ $user['phoneNumber'] }}
                                    </td>
                                    <td
                                        class="p-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        <a
                                            href="{{ route('user.infoPengguna', $user->id) }}"><x-primary-button>Edit</x-primary-button></a>
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
