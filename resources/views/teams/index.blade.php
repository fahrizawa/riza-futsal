<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tim Futsal - FutsalAdmin</title>
    
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
    <div class="flex items-center gap-8">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-md bg-primary flex items-center justify-center shadow-md">
                <span class="text-primary-foreground font-bold text-lg">F</span>
            </div>
            <span class="text-xl font-bold tracking-tight text-gray-800">FutsalAdmin</span>
        </div>
        
        <div class="hidden sm:flex items-center gap-6 border-l pl-6 border-gray-200">
            <a href="{{ route('fields.index') }}" class="text-sm font-medium text-gray-500 hover:text-primary transition-colors pb-1">Lapangan</a>
            <a href="#" class="text-sm font-semibold text-primary border-b-2 border-primary pb-1">Tim Futsal</a>
        </div>
    </div>
    
    <div class="flex items-center gap-4">
        <span class="text-sm font-medium text-gray-600 hidden sm:inline-block">Halo, Admin</span>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm flex items-center gap-2 text-red-600 hover:text-red-800 transition-colors font-medium border border-red-200 bg-red-50 px-3 py-1.5 rounded-md hover:bg-red-100 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Logout
            </button>
        </form>
    </div>
</nav>

<main class="flex-1 max-w-6xl w-full mx-auto p-6 md:p-8 space-y-8">
    
    <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Daftar Tim Futsal</h1>
        <p class="text-sm text-gray-500 mt-2">Kelola data tim pelanggan tetap maupun pendaftar baru turnamen.</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-border p-6 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-1 h-full bg-primary"></div>
        <h2 class="text-lg font-bold mb-4 text-gray-800 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            Registrasi Tim Baru
        </h2>
        
        <form action="{{ route('teams.store') }}" method="POST" class="flex flex-col md:flex-row gap-4 items-end">
            @csrf
            <div class="w-full md:w-5/12">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Tim</label>
                <input type="text" name="name" required placeholder="Contoh: FC Barcelona" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all bg-gray-50 focus:bg-white text-sm">
            </div>
            <div class="w-full md:w-5/12">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Kontak Person (No. HP / Nama)</label>
                <input type="text" name="contact_person" required placeholder="Contoh: 08123456789 (Budi)" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all bg-gray-50 focus:bg-white text-sm">
            </div>
            <div class="w-full md:w-2/12">
                <button type="submit" class="w-full bg-primary hover:bg-emerald-600 text-white font-bold py-2.5 px-4 rounded-lg transition-colors shadow-md flex justify-center items-center gap-2 text-sm">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left whitespace-nowrap">
                <thead class="text-xs text-gray-600 uppercase bg-slate-50 border-b border-border">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider w-16">No</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Profil Tim</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Kontak Person</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider text-center w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($teams as $index => $team)
                        <tr class="hover:bg-slate-50 transition-colors duration-200 group">
                            <td class="px-6 py-4 font-semibold text-gray-500">{{ $index + 1 }}</td>
                            
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-100 to-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm shadow-inner uppercase border border-blue-200">
                                        {{ substr($team->name, 0, 2) }}
                                    </div>
                                    <span class="font-bold text-gray-800 text-base group-hover:text-primary transition-colors">{{ $team->name }}</span>
                                </div>
                            </td>
                            
                            <td class="px-6 py-4 text-gray-600 font-medium">
                                <div class="flex items-center gap-2 bg-gray-50 px-3 py-1.5 rounded-md inline-flex border border-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                    {{ $team->contact_person }}
                                </div>
                            </td>
                            
                            <td class="px-6 py-4 flex justify-center gap-3">
                                <a href="{{ route('teams.edit', $team->id) }}" class="text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white border border-blue-200 px-4 py-2 rounded-lg text-xs font-bold transition-all shadow-sm flex items-center gap-1">
                                    Edit
                                </a>
                                
                                <form action="{{ route('teams.destroy', $team->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tim ini dari database?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 bg-red-50 hover:bg-red-600 hover:text-white border border-red-200 px-4 py-2 rounded-lg text-xs font-bold transition-all shadow-sm flex items-center gap-1">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                    </div>
                                    <p class="text-lg font-bold text-gray-700">Belum Ada Tim Futsal</p>
                                    <p class="text-sm text-gray-400 mt-1">Gunakan form di atas untuk mendaftarkan tim pertama Anda.</p>
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