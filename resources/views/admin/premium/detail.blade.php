@extends('admin.layouts.app')

@section('title', 'Detail Koleksi Premium')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <a href="{{ route('admin.koleksi.premium') }}" class="text-yellow-500 hover:text-yellow-400 mb-8 inline-block">
            &larr; KEMBALI KE KOLEKSI PREMIUM
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <div class="mb-4">
                    <img src="{{ $collection->image ? asset('storage/' . $collection->image) : 'https://via.placeholder.com/600x700' }}"
                        alt="{{ $collection->name }}" class="w-full h-auto rounded-lg shadow-lg">
                </div>
            </div>

            <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
                <h1 class="text-3xl font-bold text-white mb-2">{{ $collection->category }}</h1>
                <h2 class="text-5xl font-extrabold text-white mb-6">{{ $collection->name }}</h2>

                @if (session('success'))
                    <div class="bg-green-500 text-white p-3 rounded mb-4 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-300 mb-4">Tambah Penyewa Baru</h3>
                    <form action="{{ route('admin.renters.store', $collection) }}" method="POST">
                        @csrf
                        <div class="space-y-3 mb-4">
                            <input type="text" name="name" placeholder="Nama Penyewa / Nomor"
                                class="w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-3 text-white" required>
                            <input type="date" name="rental_date"
                                class="w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-3 text-white" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-6 rounded-md shadow">
                                Kirim
                            </button>
                        </div>
                    </form>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-300 mb-4">Daftar Penyewa</h3>
                    <div class="space-y-3 mb-4 max-h-48 overflow-y-auto">
                        @forelse ($collection->renters->sortBy('rental_date') as $renter)
                            <div class="flex justify-between items-center bg-gray-700 p-3 rounded-md">
                                <div>
                                    <span class="text-white font-bold">{{ $renter->name }}</span>
                                    <span class="text-gray-400 ml-2">| {{ $renter->rental_date->format('d-m-Y') }}</span>
                                </div>
                                <div class="flex space-x-2">
                                    <form action="{{ route('admin.renters.destroy', $renter) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus penyewa ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-400 font-semibold ml-2">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="bg-gray-700 p-3 rounded-md text-center text-gray-400">
                                Belum ada penyewa.
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-300 mb-4">Kalender Ketersediaan</h3>
                    <div class="bg-gray-900 p-4 rounded-md">
                        <div class="flex justify-between items-center mb-4">
                            <button id="prev-month" class="text-white">&lt;</button>
                            <span id="month-year" class="text-lg font-bold text-white"></span>
                            <button id="next-month" class="text-white">&gt;</button>
                        </div>
                        <div class="grid grid-cols-7 gap-2 text-center text-sm">
                            <div class="text-gray-400">Sun</div>
                            <div class="text-gray-400">Mon</div>
                            <div class="text-gray-400">Tue</div>
                            <div class="text-gray-400">Wed</div>
                            <div class="text-gray-400">Thu</div>
                            <div class="text-gray-400">Fri</div>
                            <div class="text-gray-400">Sat</div>
                        </div>
                        <div id="calendar-days" class="grid grid-cols-7 gap-2 text-center text-sm mt-2">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rentedDates = @json($rentedDates);
            let currentDate = new Date();

            const monthYearEl = document.getElementById('month-year');
            const calendarDaysEl = document.getElementById('calendar-days');
            const prevMonthBtn = document.getElementById('prev-month');
            const nextMonthBtn = document.getElementById('next-month');

            function renderCalendar() {
                const year = currentDate.getFullYear();
                const month = currentDate.getMonth(); // 0-11

                monthYearEl.textContent = currentDate.toLocaleDateString('id-ID', {
                    month: 'long',
                    year: 'numeric'
                });
                calendarDaysEl.innerHTML = '';

                const firstDayOfMonth = new Date(year, month, 1).getDay(); // 0 = Sunday
                const daysInMonth = new Date(year, month + 1, 0).getDate();

                // Kosongkan sel sebelum hari pertama
                for (let i = 0; i < firstDayOfMonth; i++) {
                    calendarDaysEl.innerHTML += '<div></div>';
                }

                // Isi hari-hari dalam bulan
                for (let day = 1; day <= daysInMonth; day++) {
                    const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    let dayClass = 'bg-green-500 text-white rounded-full p-2';

                    if (rentedDates.includes(dateStr)) {
                        dayClass = 'bg-red-600 text-white rounded-full p-2';
                    }

                    calendarDaysEl.innerHTML += `<div class="${dayClass}">${day}</div>`;
                }
            }

            prevMonthBtn.addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            });

            nextMonthBtn.addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            });

            renderCalendar();
        });
    </script>
@endsection
