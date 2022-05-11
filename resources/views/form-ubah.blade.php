<h3>Formulir Ubah Data</h3>

<form action="/ubah" method="POST">
    @csrf
    <label for="nim">NIM :</label>
    <input type="text" id="nim" name="nim" value="{{ $data->nim }}" readonly/><br>

    <label for="nama">NAMA :</label>
    <input type="text" id="nama" name="nama" value="{{ $data->nama }}"/><br>

    <label for="kelas">KELAS :</label> 
    <input type="text" id="kelas" name="kelas" value="{{ $data->kelas }}"/><br>

    <input type="submit" value="Simpan">
</form>