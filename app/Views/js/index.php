<script>
    $('#tes').dataTable();

    // function edit_mahasiswa(id) {
    //     alert(id)
    // }

    function delete_mahasiswa(id) {
    var base = '<?= base_url() ?>';
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: base + 'home/deletemahasiswa/' + id,
                success: function(date) {
                    Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Data has been deleted.',
                }).then(function() {
                    // reload the page
                    location.reload();
                });
                    // Add any other code to execute after successful delete here
                }
            })
        }
    });
}
</script>