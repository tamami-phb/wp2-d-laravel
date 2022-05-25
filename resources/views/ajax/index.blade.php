<html>
    <head>
        <title>Aplikasi Mahasiswa</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <h1>Aplikasi Mahasiswa</h1>

        NIM: <input id="nim"><br>
        NAMA: <input id="nama"><br>
        KELAS: <input id="kelas"><br>
        <Button id="simpan">Simpan</button><br><br>

        <table border="1">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                </tr>
            </thead>
            <tbody id="isi">
            </tbody>
        </table>
<script>
$(document).ready(function() {
    refreshTable();
})

function refreshTable() {
    $.ajax({
        url: "/api/get-data",
        type: "GET",
        cache: false,
        success: function(resp) {
            // data = JSON.parse(resp);
            data = resp;
            result = "";
            for(i=0; i<data.length; i++) {
                console.log(data[i].nim + "\n");
                result += "<tr>" +
                  "<td>" + data[i].nim + "</td>" +
                  "<td>" + data[i].nama + "</td>" +
                  "<td>" + data[i].kelas + "</td>" + 
                  '<td><button id="hapus" nim="' + data[i].nim + '">Hapus</button></td>' +
                  '<td><button id="ubah" nim="' + data[i].nim + '">Ubah</button></td>' +
                  "</tr>";
            }
            $('#isi').html(result);
        }
    });
}

    $(document).on('click', '#simpan', function() {
        var data = new Object();
        data.nim = $('#nim').val();
        data.nama = $('#nama').val();
        data.kelas = $('#kelas').val();

        $.post('/api/simpan', data, function(resp) {
            if(resp == "ok") {
                refreshTable();
            }
        });
    });

    $(document).on('click', '#ubah', function() {
        $.get("/api/ubah/" + $(this).attr('nim'), function(resp) {
            $("#nim").val(resp.nim);
            $('#nama').val(resp.nama);
            $('#kelas').val(resp.kelas);
        });
    });

    $(document).on("click", "#hapus", function() {
        console.log($(this).attr("nim"));
        $.ajax({
            url:"/api/hapus/" + $(this).attr("nim"),
            type: "GET", 
            success: function(resp) {
                console.log(resp);
                // respon = JSON.parse(resp);
                respon = resp;
                // success
                if(respon == "ok") {
                    refreshTable();
                } else { // fail
                    alert("Data gagal terhapus");
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>        
    </body>
</html>