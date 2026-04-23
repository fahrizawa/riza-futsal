<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lapangan - FutsalAdmin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { primary: '#10b981', background: '#f8fafc', border: '#e2e8f0' } } } }
    </script>
</head>
<body class="bg-background text-slate-800 min-h-screen p-6 md:p-8">

    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm border border-border p-6 md:p-8">
        <div class="mb-6 border-b border-border pb-4 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">Edit Data Lapangan</h1>
                <p class="text-sm text-gray-500 mt-1">Perbarui informasi lapangan futsal.</p>
            </div>
            <a href="{{ route('fields.index') }}" class="text-sm text-gray-500 hover:text-gray-800 transition-colors">Kembali</a>
        </div>

        <form action="{{ route('fields.update', $field->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT') <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lapangan</label>
                <input type="text" name="name" value="{{ $field->name }}" required class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Lantai / Rumput</label>
                <select name="type" required class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent bg-white">
                    <option value="Vinyl" {{ $field->type == 'Vinyl' ? 'selected' : '' }}>Vinyl</option>
                    <option value="Interlock" {{ $field->type == 'Interlock' ? 'selected' : '' }}>Interlock</option>
                    <option value="Rumput Sintetis" {{ $field->type == 'Rumput Sintetis' ? 'selected' : '' }}>Rumput Sintetis</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Harga Sewa / Jam (Rp)</label>
                <input type="number" name="price_per_hour" value="{{ $field->price_per_hour }}" required min="0" class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('fields.index') }}" class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition-colors">Batal</a>
                <button type="submit" class="px-4 py-2 rounded-md bg-yellow-500 text-white font-medium hover:bg-yellow-600 transition-colors">Update Lapangan</button>
            </div>
        </form>
    </div>

</body>
</html>