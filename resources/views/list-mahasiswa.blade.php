<h1>Daftar Mahasiswa</h1>

<a href="/form-tambah">Tambah</a>
<table border=1>
    <tr>
      <th>NIM</th>
      <th>NAMA</th>
      <th>KELAS</th>
      <th>OPSI</th>
    </tr>
@forelse($data as $detail)
    <tr>
        <td>{{ $detail->nim }}</td>
        <td>{{ $detail->nama }}</td>
        <td>{{ $detail->kelas }}</td>
        <td>
            <a href='/hapus/{{ $detail->nim }}'>Hapus</a>
            <a href="/ubah/{{ $detail->nim }}">Ubah</a>
        </td>
    </tr>
@empty
    <tr>
        <td>Data Kosong</td>
    </tr>
@endforelse
</table>