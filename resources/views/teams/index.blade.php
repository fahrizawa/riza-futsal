<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tim Futsal</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <h2>Data Tim Futsal</h2>

    <div style="margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; max-width: 600px;">
        <h3>Tambah Tim Baru</h3>
        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <label>Nama Tim:</label><br>
            <input type="text" name="name" required style="margin-bottom: 10px; width: 100%; box-sizing: border-box; padding: 5px;"><br>
            
            <label>Kontak Person:</label><br>
            <input type="text" name="contact_person" required style="margin-bottom: 15px; width: 100%; box-sizing: border-box; padding: 5px;"><br>
            
            <button type="submit" style="padding: 8px 15px; cursor: pointer; background-color: #28a745; color: white; border: none; border-radius: 4px;">Simpan Data</button>
        </form>
    </div>

    <table border="1" cellpadding="10" cellspacing="0" width="100%" style="max-width: 800px; text-align: left; border-collapse: collapse;">
        <thead style="background-color: #f4f4f4;">
            <tr>
                <th width="5%">No</th>
                <th width="35%">Nama Tim</th>
                <th width="35%">Kontak Person</th>
                <th width="25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teams as $team)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->contact_person }}</td>
                <td>
                    <a href="{{ route('teams.edit', $team->id) }}" style="text-decoration: none; color: white; background-color: #007bff; padding: 5px 10px; border-radius: 3px; font-size: 14px; margin-right: 5px;">Edit</a>

                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus tim ini?')" style="color: white; background-color: #dc3545; padding: 5px 10px; border: none; border-radius: 3px; font-size: 14px; cursor: pointer;">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">Belum ada data tim.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>