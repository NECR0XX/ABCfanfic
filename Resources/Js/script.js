function logout() {
    alert('Você foi desconectado.');
    window.location.href = "../App/Providers/logout.php";
}

function selectImage() {
  document.getElementById('fileInput').click();
}

function loadImage(event) {
  const file = event.target.files[0];
  const reader = new FileReader();
  
  reader.onload = function() {
      const imageUrl = reader.result;
      const imagePreview = document.getElementById('imagePreview');
      imagePreview.src = imageUrl; // Atualiza a imagem exibida
  }
  
  if (file) {
      reader.readAsDataURL(file);
  }
}