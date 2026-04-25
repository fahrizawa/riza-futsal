<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tim Futsal</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <h2>Data Tim Futsal</h2>

    <div style="margin-bottom: 20px; padding: 15px; border: 1px solid #ccc;">
        <h3>Tambah Tim Baru</h3>
        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <label>Nama Tim:</label><br>
            <input type="text" name="name" required style="margin-bottom: 10px;"><br>
            
            <label>Kontak Person:</label><br>
            <input type="text" name="contact_person" required style="margin-bottom: 10px;"><br>
            
            <button type="submit">Simpan Data</button>
        </form>
    </div>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead style="background-color: #f4f4f4;">
            <tr>
                <th>No</th>
                <th>Nama Tim</th>
                <th>Kontak Person</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->contact_person }}</td>
                <td>
                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>