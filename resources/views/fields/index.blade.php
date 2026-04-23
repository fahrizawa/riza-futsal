<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Lapangan - FutsalAdmin</title>
    <div class="mb-6 p-4 bg-slate-900 rounded-lg border border-primary/20 shadow-inner">
    <div class="flex items-center gap-2 mb-2">
        <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
        <span class="text-xs font-mono text-primary uppercase tracking-widest">JWT Access Token Active</span>
    </div>
    <p class="text-[10px] font-mono text-slate-400 break-all leading-relaxed">
        {{ session('jwt_token') }}
    </p>
</div>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#10b981', /* Emerald 500 */
                        'primary-foreground': '#ffffff',
                        background: '#f8fafc',
                        foreground: '#0f172a',
                        border: '#e2e8f0',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-background text-foreground min-h-screen flex flex-col">

<nav class="bg-white border-b border-border px-6 py-4 shadow-sm flex justify-between items-center">
    <div class="flex items-center gap-2">
        <div class="w-8 h-8 rounded-md bg-primary flex items-center justify-center">
            <span class="text-primary-foreground font-bold">F</span>
        </div>
        <span class="text-xl font-bold">FutsalAdmin</span>
    </div>
    
    <div class="flex items-center gap-4">
        <span class="text-sm font-medium text-gray-600">Halo, {{ Auth::user()->name }}</span>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm flex items-center gap-2 text-red-600 hover:text-red-800 transition-colors font-medium border border-red-200 bg-red-50 px-3 py-1.5 rounded-md hover:bg-red-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Logout
            </button>
        </form>
    </div>
</nav>

<main class="flex-1 max-w-6xl w-full mx-auto p-6 md:p-8">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold">Daftar Lapangan Futsal</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola data inventaris lapangan yang tersedia untuk disewa.</p>
        </div>
        
        <a href="{{ route('fields.create') }}" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-md font-semibold text-sm flex items-center gap-2 transition-colors shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Lapangan
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-border">
                    <tr>
                        <th scope="col" class="px-6 py-4">No</th>
                        <th scope="col" class="px-6 py-4">Nama Lapangan</th>
                        <th scope="col" class="px-6 py-4">Tipe Lantai/Rumput</th>
                        <th scope="col" class="px-6 py-4">Harga / Jam</th>
                        <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fields as $index => $field)
                        <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-800">{{ $field->name }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full 
                                    {{ $field->type == 'Vinyl' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $field->type == 'Interlock' ? 'bg-orange-100 text-orange-800' : '' }}
                                    {{ $field->type == 'Rumput Sintetis' ? 'bg-green-100 text-green-800' : '' }}
                                ">
                                    {{ $field->type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-700">Rp {{ number_format($field->price_per_hour, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 flex justify-center gap-2">
                                <a href="{{ route('fields.edit', $field->id) }}" class="text-yellow-600 bg-yellow-50 border border-yellow-200 hover:bg-yellow-100 px-3 py-1.5 rounded-md text-xs font-semibold transition-colors flex items-center gap-1">
                                    Edit
                                </a>
                                
                                <form action="{{ route('fields.destroy', $field->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data lapangan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 bg-red-50 border border-red-200 hover:bg-red-100 px-3 py-1.5 rounded-md text-xs font-semibold transition-colors flex items-center gap-1">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                                    <p class="text-base font-medium text-gray-600">Belum ada data lapangan</p>
                                    <p class="text-sm mt-1 text-gray-400">Silakan klik tombol "Tambah Lapangan" di atas untuk memasukkan data baru.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>