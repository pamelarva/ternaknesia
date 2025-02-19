function toggleCard(button) {
    const content = button.nextElementSibling; // Konten di bawah header
    const arrow = button.querySelector(".arrow"); // Elemen panah
  
    if (content.style.display === "block") {
      content.style.display = "none";
      arrow.classList.remove("open"); // Kembalikan panah ke bawah
    } else {
      content.style.display = "block";
      arrow.classList.add("open"); // Panah menghadap atas
    }
  }
  