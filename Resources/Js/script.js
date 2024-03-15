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
      const placeholder = document.getElementById('placeholder');
      placeholder.innerHTML = `<img src="${imageUrl}" alt="Selected Image">`;
    }
    
    if (file) {
      reader.readAsDataURL(file);
    }
  }
  