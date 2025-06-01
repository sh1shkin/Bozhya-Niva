function scrollVideos(direction) {
    const container = document.getElementById('videoScroll');
    const scrollAmount = 350;
    container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
}