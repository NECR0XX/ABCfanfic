<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    .search input{
    height: 3.125rem;
    width: 100%;
    outline: none;
    border: none;
    border-radius: 0.313rem;
    padding: 0 60px 0 20px;
    font-size: 1.125rem;
    box-shadow: 0px 1px 5px rgba(0,0,0,0.1);
    font-family: 'Abel', sans-serif;
  }
  
  .search.active input{
    border-radius: 5px 5px 0 0;
  }
  
  .search .list{
    padding: 0;
    opacity: 0;
    pointer-events: none;
    max-height: 17.5rem;
  }
  
  .search.active #suggestions{
    padding: 10px 8px;
    opacity: 1;
    pointer-events: auto;
    margin: 50px;
    z-index: 100;
  }
  
  #suggestions {
    list-style: none;
    padding: 8px 12px;
    display: none;
    width: 100%;
    height: 50px auto;
    cursor: default;
    border-radius: 3px;
  }
  
  .search.active #suggestions li{
    display: block;
  }
  #suggestions li:hover{
    background: #efefef;
  }
    </style>
</head>
<body>
    <div class="search">
        <form id="search-form">
            <input type="search" id="search-input" placeholder="Pesquisar">

                <ul id="suggestions"></ul>

        </form>
    </div>
    <script src="../Resources/Js/script.js"></script>
</body>
</html>