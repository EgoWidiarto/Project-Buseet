// Collapse Shadow Button
document.addEventListener("DOMContentLoaded", (event) => {
  let button = document.querySelectorAll(".collapse-btn");

  button.forEach((event) => {
    event.addEventListener("click", function () {
      let element = this.closest(".card").querySelector(".shadow-bottom");
      element.classList.toggle("collapse-shadow");
      element.classList.toggle("pb-4");
    });
  });
});

// Collapse Button Controller
document.addEventListener("DOMContentLoaded", function () {
  // Taing All of 'collapse-btn' class
  let collapseButtons = document.querySelectorAll(".collapse-btn");

  // iterate through each button
  collapseButtons.forEach(function (button) {
    // Add event listener for 'click' event for each button
    button.addEventListener("click", function () {
      // Mengecek apakah collapse terbuka atau tertutup
      let isExpanded = this.getAttribute("aria-expanded") === "true";

      // Changes text button besides collapse status
      this.textContent = isExpanded ? "Sembunyikan Tempat Duduk" : "Lihat Tempat Duduk";
    });
  });
});

// Function Generate Seat Number for Detail Ticket
function seatNumberGenerator(elementName) {
  document.addEventListener("DOMContentLoaded", () => {
    // Taking all form with .ticket-selection-form class
    let forms = document.querySelectorAll(".ticket-selection-form");
    let name = elementName;

    // Add addEventListener for each form
    forms.forEach((form) => {
      form.addEventListener("change", (event) => {
        if (event.target.type === "radio" && event.target.name === name) {
          // Take element .seat-number which is in the same form as the selected radio input
          let bussSeatNumber = form.querySelector(".seat-number");

          // Updates the contents of the .seat-number element with the value of the selected radio button
          if (bussSeatNumber) {
            bussSeatNumber.textContent = event.target.nextElementSibling.textContent;
            localStorage.setItem("bussSeatNumber", event.target.nextElementSibling.textContent);
          }
        }
      });
    });
  });
}

const userIdentity = {
  identityType: "KTP",
};

function generateBookingNumbers(numberLength) {
  const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  const numbers = "0123456789";

  // Memilih satu huruf secara acak
  let randomLetter = letters.charAt(Math.floor(Math.random() * letters.length));

  // Menghasilkan sebelas angka secara acak
  let randomNumbers = "";
  for (let i = 0; i < numberLength; i++) {
    randomNumbers += numbers.charAt(Math.floor(Math.random() * numbers.length));
  }

  // Menggabungkan huruf dan angka untuk membentuk nomor pemesanan
  return randomLetter + randomNumbers;
}
