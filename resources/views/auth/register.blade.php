<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FutsalAdmin</title>
    
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
                        muted: '#f1f5f9',
                        'muted-foreground': '#64748b',
                        border: '#e2e8f0',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-background">

<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">
        
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-2 mb-3">
                <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center">
                    <span class="text-primary-foreground font-extrabold text-lg">F</span>
                </div>
                <span class="text-2xl font-bold text-foreground">FutsalAdmin</span>
            </div>
            <p class="text-muted-foreground text-sm">Daftarkan akun petugas baru Anda</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-border/60 overflow-hidden">
            <div class="pb-2 pt-8 px-8">
                <h2 class="text-xl font-bold text-foreground">Daftar Akun Petugas</h2>
                <p class="text-sm text-muted-foreground">Lengkapi data di bawah untuk mendaftar</p>
            </div>
            
            <div class="px-8 pb-8">
                
                @if ($errors->any())
                    <div class="mt-4 p-3 bg-red-100 text-red-700 text-xs rounded-md">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/register') }}" class="space-y-4 mt-4">
                    @csrf
                    
                    <div class="space-y-1">
                        <label for="name" class="text-sm font-medium text-foreground">Nama Lengkap</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            <input id="name" type="text" name="name" placeholder="Nama Anda" value="{{ old('name') }}" required autofocus
                                class="flex h-10 w-full rounded-md border border-border bg-white pl-10 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="email" class="text-sm font-medium text-foreground">Email Address</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            <input id="email" type="email" name="email" placeholder="admin@futsal.com" value="{{ old('email') }}" required
                                class="flex h-10 w-full rounded-md border border-border bg-white pl-10 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                        </div>
                    </div>
                    
                    <div class="space-y-1">
                        <label for="password" class="text-sm font-medium text-foreground">Password</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            <input id="password" type="password" name="password" placeholder="••••••••" required
                                class="flex h-10 w-full rounded-md border border-border bg-white pl-10 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="password_confirmation" class="text-sm font-medium text-foreground">Konfirmasi Password</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" required
                                class="flex h-10 w-full rounded-md border border-border bg-white pl-10 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                        </div>
                    </div>
                    
                    <button type="submit" class="inline-flex items-center justify-center rounded-md font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 bg-primary text-primary-foreground hover:bg-primary/90 h-11 w-full text-sm gap-2 mt-4">
                        Daftar Sekarang
                    </button>
                </form>
                
                <div class="text-center text-sm text-muted-foreground mt-6">
                    Sudah punya akun? 
                    <a href="{{ url('/login') }}" class="text-primary font-semibold hover:underline">
                        Login di sini
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>

</body>
</html>