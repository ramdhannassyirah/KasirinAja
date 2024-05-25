function confirmDelete(id) {
    Swal.fire({
        title: "Anda Yakin Hapus Barang ini ?",

        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + id).submit();
        }
    });
}

function confirmDeleteUser(id) {
    Swal.fire({
        title: "Anda Yakin Hapus User ini ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-formUser-" + id).submit();
        }
    });
}
