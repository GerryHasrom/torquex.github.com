// Event listener untuk DOMContentLoaded
document.addEventListener("DOMContentLoaded", function () {
  // Ambil elemen navbar
  var navbar = document.querySelector('.hero'); // Ganti getElementsByClassName dengan querySelector
  var ul = navbar.querySelector('ul');

  // Inisialisasi tampilan berdasarkan lebar layar
  if (window.innerWidth > 600) {
    ul.style.display = 'flex';
  } else {
    ul.style.display = 'none';
  }
});

// Tambahkan event listener untuk membuat navbar responsif
window.addEventListener('resize', function () {
  var navbar = document.querySelector('.hero');
  var ul = navbar.querySelector('ul');

  // Atur tampilan berdasarkan lebar layar saat diubah
  if (window.innerWidth > 600) {
    ul.style.display = 'flex';
  } else {
    ul.style.display = 'none';
  }
});

// Fungsi untuk mengubah mode tampilan password
function togglePasswordVisibility() {
  const passwordInput = document.getElementById("password");
  const showPasswordCheckbox = document.getElementById("showPassword");

  passwordInput.type = showPasswordCheckbox.checked ? "text" : "password";
}


// Fungsi untuk menampilkan modal logout
function showLogoutModal() {
  if (confirm("Apakah Anda yakin ingin logout?")) {
    window.location.href = "logout.php";
  }
}






