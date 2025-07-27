// auth.js
window.addEventListener('DOMContentLoaded', () => {
  fetch('session_check.php')
    .then(response => response.json())
    .then(data => {
      if (!data.loggedIn) {
        alert("Silakan login terlebih dahulu.");
        window.location.href = "index.html";
      }
    })
    .catch(err => {
      console.error("Gagal cek sesi:", err);
      window.location.href = "index.html";
    });
});
