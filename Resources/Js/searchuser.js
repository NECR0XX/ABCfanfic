// BARRA DE PESQUISA
const suggestionToUrlMap = {
    "Perfil": "../../Public/User/perfil.php",
    "Tags": "../../Public/User/tags.php",
    "Sobre": "../../Public/User/sobre.php",
    "Favoritos": "../../Public/User/favoritos.php",
    "Postar Fanfic": "../../Public/User/post.php",
    "Ação": "../../Public/User/tags/acao.php?categoria_id=7",
    "Aventura": "../../Public/User/tags/aventura.php?categoria_id=5",
    "Comédia": "../../Public/User/tags/comedia.php?categoria_id=8",
    "Drama": "../../Public/User/tags/drama.php?categoria_id=4",
    "Fantasia": "../../Public/User/tags/fantasia.php?categoria_id=1",
    "Guerra": "../../Public/User/tags/guerra.php9",
    "Luta": "../../Public/User/tags/luta.php?categoria_id=10",
    "Romance": "../../Public/User/tags/romance.php?categoria_id=3",
    "Suspense": "../../Public/User/tags/suspense.php?categoria_id=6",
    "Terror": "../../Public/User/tags/terror.php?categoria_id=2",
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