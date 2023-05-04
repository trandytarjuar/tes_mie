<script>
    function simpan() {
        // alert("tes")
        var nama_mhs = $("#nama_mhs").val()
        var jenis_kelamin = $("#jenis_kelamin").val()
        var alamat = $("#alamat").val()
        alert(jenis_kelamin)

    }

    function tambahmatkul() {
        // var table = "";
        let data = new FormData();
        var nama_matkul = $("#nama_matkul").val()
        data.append("nama_matkul", nama_matkul);
        var base = '<?= base_url() ?>';
        // console.log(base)
        $.ajax({
            type: "POST",
            url: base + 'home/submitmatkul',
            data: data,
            processData: false, // tambahkan opsi ini agar FormData tidak diubah
            contentType: false,

            success: function(data) {
                console.log(data)
                var tableHtml = "";
                var matkul = data;
                var response_data = JSON.parse(matkul);
                var nama_matkul = response_data.matkul.nama;
                tableHtml += "<tr>";
                tableHtml += "<td>";
                tableHtml += "<input class='form-control' value='" + nama_matkul + "' readonly required>";
                tableHtml += "</td>";
                tableHtml += "<td> ";
                // tableHtml += "<a class='btn btn-danger' onclick='hapusmatkul("'+nama_matkul+'")'>hapus</a>";
                tableHtml += "<a class='btn btn-danger' onclick=\"hapusmatkul('" + nama_matkul + "')\">hapus</a>";
                tableHtml += "</td>";
                tableHtml += "</tr>";
                $("#matkulnambah").append(tableHtml);



            }
        })

        // alert(nama_matkul)
    }

    function hapusmatkul(nama) {
        var base = '<?= base_url() ?>';
        $.ajax({
            type:"DELETE",
            url : base + 'home/deletematkul/'+nama,
            success: function(data){
                var tableRow = $("input[value='" + nama + "']").closest("tr");
            tableRow.remove();

            }
        })
    }
</script>