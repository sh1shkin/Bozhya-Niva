function addVideo() {
    const list = document.getElementById("video-list");
    const li = document.createElement("li");
    li.innerHTML = '📺 Новое видео <button onclick="deleteItem(this)">Удалить</button>';
    list.appendChild(li);
  }
  
  function addConference() {
    const list = document.getElementById("conference-list");
    const li = document.createElement("li");
    li.innerHTML = '📅 Новая конференция <button onclick="deleteItem(this)">Удалить</button>';
    list.appendChild(li);
  }
  
  function deleteItem(button) {
    const li = button.parentElement;
    li.remove();
  }
  