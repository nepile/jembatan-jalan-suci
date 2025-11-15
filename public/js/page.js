function copyToClipboard() {
    // Ambil input
    var copyText = document.getElementById("copyLink");

    // Select teks
    copyText.select();
    copyText.setSelectionRange(0, 99999); // Untuk mobile

    // Copy
    navigator.clipboard.writeText(copyText.value);

    // Notifikasi (opsional)
    alert("Link disalin!");
}

const rupiahInput = document.getElementById("rupiah");

rupiahInput.addEventListener("input", function (e) {
    let value = this.value.replace(/[^0-9]/g, ""); // Hanya angka
    if (value) {
        this.value = formatRupiah(value);
    } else {
        this.value = "";
    }
});

function formatRupiah(angka) {
    let reverse = angka.toString().split("").reverse().join("");
    let ribuan = reverse.match(/\d{1,3}/g);
    return "Rp " + ribuan.join(".").split("").reverse().join("");
}
