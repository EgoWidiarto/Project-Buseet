function toggleClassByScreen() {
  const screen = window.innerWidth;
  const textColor = querySelectorAll(".nav-link");

  textColor.array.forEach((element) => {
    if (screen < 992) {
      textColor.classList.add("text-white");
    } else {
      textColor.classList.remove("text-white");
    }
  });
}

window.addEventListener("resize", toggleClassByScreen);

toggleClassByScreen();
