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
                confItem.innerHTML = `<h3>${conf.title}</h3><p>${conf.date}</p>`;
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
                videoItem.innerHTML = `<iframe width="250" height="150" src="${video.url}" frameborder="0" allowfullscreen></iframe><p>${video.title}</p>`;
                videoList.appendChild(videoItem);
            });
        })
        .catch(error => console.error("Ошибка загрузки видео:", error));
}

// Функция добавления конференции (вызывается админом)
function addConference(title, date) {
    fetch("backend/admin.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `action=add_conference&title=${encodeURIComponent(title)}&date=${encodeURIComponent(date)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        loadConferences();
    });
}

// Функция добавления видео (вызывается админом)
function addVideo(title, url) {
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