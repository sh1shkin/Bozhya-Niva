document.addEventListener("DOMContentLoaded", function () {
  const burger = document.getElementById("burger");
  const navWrapper = document.getElementById("navWrapper");


  setTimeout(() => {
      document.body.classList.remove("initial-load");
  }, 200);

  if (burger && navWrapper) {
      burger.addEventListener("click", function () {
          navWrapper.classList.toggle("active");
          document.body.classList.toggle("menu-open");
          burger.classList.toggle("active");
      });
  }

  let resizeTimer;
  window.addEventListener("resize", () => {
      document.body.classList.add("no-animate");
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
          document.body.classList.remove("no-animate");
      }, 300);
  });
});
