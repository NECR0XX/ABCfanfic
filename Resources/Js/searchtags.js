// BARRA DE PESQUISA
const suggestionToUrlMap = {
    "Perfil": "../perfil.php",
    "Tags": "../tags.php",
    "Sobre": "../sobre.php",
    "Favoritos": "../favoritos.php",
    "Postar Fanfic": "../post.php",
    "Ação": "acao.php?categoria_id=1",
    "Aventura": "aventura.php?categoria_id=2",
    "Comédia": "comedia.php?categoria_id=3",
    "Drama": "drama.php?categoria_id=4",
    "Fantasia": "fantasia.php?categoria_id=5",
    "Guerra": "guerra.php6",
    "Luta": "luta.php?categoria_id=7",
    "Romance": "romance.php?categoria_id=8",
    "Suspense": "suspense.php?categoria_id=9",
    "Terror": "terror.php?categoria_id=10",
  };
  
  const searchInput = document.getElementById('search-input');
  const suggestionsList = document.getElementById('suggestions');
  
  searchInput.addEventListener('input', function () {
    const inputValue = searchInput.value.toLowerCase();
    const filteredSuggestions = Object.keys(suggestionToUrlMap).filter(suggestion => suggestion.toLowerCase().includes(inputValue));
  
    displaySuggestions(filteredSuggestions);
  
    // Verifique se o valor do campo de entrada está vazio
    if (inputValue === '') {
        suggestionsList.style.display = 'none';
    }
  });
  
  function displaySuggestions(suggestionsArray) {
    suggestionsList.innerHTML = '';
  
    if (suggestionsArray.length === 0) {
        suggestionsList.style.display = 'none';
        return;
    }
  
    suggestionsArray.forEach(suggestion => {
        const listItem = document.createElement('li');
        listItem.textContent = suggestion;
        listItem.addEventListener('click', function () {
            redirectToPage(suggestion);
        });
        suggestionsList.appendChild(listItem);
    });
  
    suggestionsList.style.display = 'block';
  }
  
  function redirectToPage(query) {
    const url = suggestionToUrlMap[query];
    if (url) {
        window.location.href = url;
    } else {
        alert("URL não encontrada para esta sugestão.");
    }
  }