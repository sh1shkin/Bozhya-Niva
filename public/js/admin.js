document.addEventListener("DOMContentLoaded", function () {
    loadConferences();
    loadVideos();
});

// Функция загрузки конференций
function loadConferences() {
    fetch("backend/get_conferences.php")
        .then(response => response.json())
        .then(data => {
            const conferenceList = document.getElementById("conference-list");
            conferenceList.innerHTML = "";
            data.forEach(conf => {
                let confItem = document.createElement("div");
                confItem.classList.add("conference-item");
                confItem.innerHTML = `<h3>${conf.title}</h3><p>${conf.date}</p>
                    <button class='delete-btn' onclick='deleteConference(${conf.id})'>Удалить</button>`;
                conferenceList.appendChild(confItem);
            });
        })
        .catch(error => console.error("Ошибка загрузки конференций:", error));
}

// Функция загрузки видео
function loadVideos() {
    fetch("backend/get_videos.php")
        .then(response => response.json())
        .then(data => {
            const videoList = document.getElementById("video-list");
            videoList.innerHTML = "";
            data.forEach(video => {
                let videoItem = document.createElement("div");
                videoItem.classList.add("video-item");
                videoItem.innerHTML = `<iframe width="250" height="150" src="${video.url}" frameborder="0" allowfullscreen></iframe>
                    <p>${video.title}</p>
                    <button class='delete-btn' onclick='deleteVideo(${video.id})'>Удалить</button>`;
                videoList.appendChild(videoItem);
            });
        })
        .catch(error => console.error("Ошибка загрузки видео:", error));
}

// Функция добавления конференции
function addConference() {
    let title = document.getElementById("conf-title").value;
    let date = document.getElementById("conf-date").value;
    
    fetch("backend/admin.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `action=add_conference&title=${encodeURIComponent(title)}&date=${date}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        loadConferences();
    });
}

// Функция добавления видео
function addVideo() {
    let title = document.getElementById("video-title").value;
    let url = document.getElementById("video-url").value;
    
    fetch("backend/admin.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `action=add_video&title=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        loadVideos();
    });
}

// Функция удаления конференции
function deleteConference(id) {
    fetch("backend/admin.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `action=delete_conference&id=${id}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        loadConferences();
    });
}

// Функция удаления видео
function deleteVideo(id) {
    fetch("backend/admin.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `action=delete_video&id=${id}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        loadVideos();
    });
}

// Функция обновления адреса церкви
function updateAddress() {
    let address = document.getElementById("new-address").value;
    let lat = document.getElementById("new-lat").value;
    let lng = document.getElementById("new-lng").value;
    
    fetch("backend/admin.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `action=update_address&address=${encodeURIComponent(address)}&lat=${lat}&lng=${lng}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        alert("Адрес обновлён!");
    });
}