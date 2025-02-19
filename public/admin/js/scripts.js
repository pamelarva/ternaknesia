function confirmDelete(name) {
    if (confirm(`Apakah Anda yakin ingin menghapus data ${name}?`)) {
        // Tambahkan logika penghapusan di sini, misalnya AJAX atau form submit
        alert(`Data ${name} berhasil dihapus.`);
    }
}
