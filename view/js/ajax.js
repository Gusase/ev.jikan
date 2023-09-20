const search = document.getElementById('anime-search')
const searchBtn = document.querySelector('.bbtn')
const content = document.getElementById('content')
const defContent = content.innerHTML
searchBtn.style.display = "none"

search.addEventListener('keyup', function() {
  // let ajax = new XMLHttpRequest()

  // ajax.onreadystatechange = function() {
  //   if (ajax.readyState = 4 && ajax.status == 200) {
  //     content.innerHTML = ajax.responseText;
  //   }
  // }

  // ajax.open('get', '../fetch/search.anime.php?q=' + search.value, true);
  // ajax.send();

  if (search.value.length >= 1) {
    fetch('../fetch/search.anime.php?q=' + search.value)
      .then((Response) => Response.text())
      .then((Response) => (content.innerHTML = Response))
      .catch((Error) => (console.log(Error)));
  } else {
    content.innerHTML = defContent;
  }
})