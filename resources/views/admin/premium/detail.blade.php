@extends('admin.layouts.app')

@section('title', 'Detail Koleksi Premium')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <a href="{{ route('admin.koleksi.premium') }}" class="text-yellow-500 hover:text-yellow-400 mb-8 inline-block">
            &larr; Kembali ke Koleksi
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <div class="mb-4">
                    <img src="https://via.placeholder.com/600x700" alt="Koleksi Utama"
                        class="w-full h-auto rounded-lg shadow-lg">
                </div>
            </div>

            <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
                <h1 class="text-3xl font-bold text-white mb-2">SUMATERA</h1>
                <h2 class="text-5xl font-extrabold text-white mb-6">001</h2>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-300 mb-4">Daftar Penyewa</h3>
                    <div class="space-y-3 mb-4">
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="flex justify-between items-center bg-gray-700 p-3 rounded-md">
                                <div>
                                    <span class="text-white font-bold">Penyewa #{{ $i }}</span>
                                    <span class="text-gray-400 ml-2">| Tanggal:
                                        {{ now()->subDays($i)->format('d-m-Y') }}</span>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="#" class="text-yellow-400 hover:text-yellow-300 font-semibold">Edit</a>
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-400 font-semibold ml-2">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div class="flex justify-end">
                        <button type="button"
                            class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-6 rounded-md shadow">
                            Kirim
                        </button>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-300 mb-4">Kalender Ketersediaan</h3>
                    <div class="bg-gray-900 p-4 rounded-md">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-lg font-bold text-white">August 2025</span>
                            <select class="bg-gray-800 text-white border-none rounded-md">
                                <option>August 2025</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-7 gap-2 text-center text-sm">
                            <div class="text-gray-400">Mon</div>
                            <div class="text-gray-400">Tue</div>
                            <div class="text-gray-400">Wed</div>
                            <div class="text-gray-400">Thu</div>
                            <div class="text-gray-400">Fri</div>
                            <div class="text-gray-400">Sat</div>
                            <div class="text-gray-400">Sun</div>

                            <div class="text-gray-500">28</div>
                            <div class="text-gray-500">29</div>
                            <div class="text-gray-500">30</div>
                            <div class="text-gray-500">31</div>
                            <div class="bg-red-600 rounded-full p-2 text-white">1</div>
                            <div class="bg-red-600 rounded-full p-2 text-white">2</div>
                            <div class="bg-red-600 rounded-full p-2 text-white">3</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">4</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">5</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">6</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">7</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">8</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">9</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">10</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">11</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">12</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">13</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">14</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">15</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">16</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">17</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">18</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">19</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">20</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">21</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">22</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">23</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">24</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">25</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">26</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">27</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">28</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">29</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">30</div>
                            <div class="bg-green-500 rounded-full p-2 text-white">31</div>
                        </div>
                        <div class="flex items-center mt-4 text-xs">
                            <div class="w-4 h-4 bg-green-500 rounded-full mr-2"></div>
                            <span class="text-gray-400">Tersedia</span>
                            <div class="w-4 h-4 bg-red-600 rounded-full mr-2 ml-4"></div>
                            <span class="text-gray-400">Disewa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
