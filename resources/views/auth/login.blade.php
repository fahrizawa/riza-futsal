<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FutsalAdmin</title>
    
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

<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md animate-fade-in">
        
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-2 mb-3">
                <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center">
                    <span class="text-primary-foreground font-extrabold text-lg">F</span>
                </div>
                <span class="text-2xl font-bold text-foreground">FutsalAdmin</span>
            </div>
            <p class="text-muted-foreground text-sm">Kelola lapangan futsal Anda dengan mudah</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-border/60 overflow-hidden">
            <div class="pb-2 pt-8 px-8">
                <h2 class="text-xl font-bold text-foreground">Admin Futsal Login</h2>
                <p class="text-sm text-muted-foreground">Masuk ke dashboard admin Anda</p>
            </div>
            
            <div class="px-8 pb-8">
                
                @if ($errors->any())
                    <div class="mt-4 p-3 bg-red-100 text-red-700 text-sm rounded-md">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ url('/login') }}" class="space-y-5 mt-4">
                    @csrf
                    
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium leading-none text-foreground">Email Address</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            
                            <input id="email" type="email" name="email" placeholder="admin@futsal.com" value="{{ old('email') }}" required autofocus
                                class="flex h-11 w-full rounded-md border border-border bg-white pl-10 px-3 py-2 text-sm placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="password" class="text-sm font-medium leading-none text-foreground">Password</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            
                            <input id="password" type="password" name="password" placeholder="••••••••" required
                                class="flex h-11 w-full rounded-md border border-border bg-white pl-10 px-3 py-2 text-sm placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                        </div>
                    </div>
                    
                    <button type="submit" class="inline-flex items-center justify-center rounded-md font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 bg-primary text-primary-foreground hover:bg-primary/90 h-11 w-full text-sm gap-2 mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                        Sign In
                    </button>
                </form>
                
                <p class="text-center text-sm text-muted-foreground mt-6">
                    Don't have an account? 
                    <a href="{{ url('/register') }}" class="text-primary font-semibold hover:underline">
                        Register here
                    </a>
                </p>
                
            </div>
        </div>
    </div>
</div>

</body>
</html>