<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tim Futsal</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <h2>Edit Data Tim Futsal</h2>

    <div style="margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; max-width: 400px;">
        <form action="{{ route('teams.update', $team->id) }}" method="POST">
            @csrf
            @method('PUT') 
            
            <label>Nama Tim:</label><br>
            <input type="text" name="name" value="{{ $team->name }}" required style="margin-bottom: 10px; width: 100%; box-sizing: border-box; padding: 5px;"><br>
            
            <label>Kontak Person:</label><br>
            <input type="text" name="contact_person" value="{{ $team->contact_person }}" required style="margin-bottom: 15px; width: 100%; box-sizing: border-box; padding: 5px;"><br>
            
            <button type="submit" style="padding: 8px 15px; cursor: pointer; background-color: #007bff; color: white; border: none; border-radius: 3px;">Update Data</button>
            <a href="{{ route('teams.index') }}" style="margin-left: 10px; text-decoration: none; color: gray;">Batal</a>
        </form>
    </div>

</body>
</html>