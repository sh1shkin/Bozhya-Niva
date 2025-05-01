document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll("a[href^='/templates/'], a[href$='.html']");
  
    links.forEach(link => {
      link.addEventListener("click", function (e) {
        e.preventDefault(); 
  
        const href = this.getAttribute("href");
        
        document.body.classList.add("fade-out");
  
        setTimeout(() => {
          window.location.href = href;
        }, 300);
      });
    });
  });
  