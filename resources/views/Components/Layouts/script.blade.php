<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset ('Charitize/lib/wow/wow.min.js')}}"></script>
<script src="{{ asset ('Charitize/lib/easing/easing.min.js')}}"></script>
<script src="{{ asset ('Charitize/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{ asset ('Charitize/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset ('Charitize/lib/counterup/counterup.min.js')}}"></script>
<script src="{{ asset ('Charitize/js/main.js')}}"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {

  const username = "anonim";
  const ws = new WebSocket("wss://ws-hacktown.rusnandapurnama.com");

  const chatBox = document.getElementById("chatBox");
  const userInput = document.getElementById("userInput");
  const sendBtn = document.getElementById("sendBtn");

  /* ======================
     UI MESSAGE
  ====================== */
  function botMessage(text) {
    chatBox.innerHTML += `<div class="bot">${text}</div>`;
    chatBox.scrollTop = chatBox.scrollHeight;
  }

  function userMessage(text) {
    chatBox.innerHTML += `<div class="user">${text}</div>`;
    chatBox.scrollTop = chatBox.scrollHeight;
  }

  /* ======================
     WEBSOCKET
  ====================== */
  

  ws.onmessage = (event) => {
    // Semua balasan AI dari websocket
    botMessage(event.data);

    // Tambahkan tombol form jika AI menyarankan
    if (event.data.toLowerCase().includes("form")) {
      showFormButton();
    }
  };

  ws.onerror = () => {
    botMessage("❌ Koneksi ke AI bermasalah");
  };

  /* ======================
     SEND MESSAGE
  ====================== */
  window.sendMessage = function () {
    const text = userInput.value.trim();
    if (!text || ws.readyState !== 1) return;

    userMessage(text);
    ws.send(text);
    userInput.value = "";
  };

  sendBtn?.addEventListener("click", sendMessage);

  userInput?.addEventListener("keypress", e => {
    if (e.key === "Enter") sendMessage();
  });

  /* ======================
     BUTTON TO FORM
  ====================== */
  function showFormButton() {
    if (document.getElementById("formBtn")) return;

    chatBox.innerHTML += `
      <div class="bot">
        <button id="formBtn" class="option-btn" onclick="goToForm()">
          📄 Isi Form Pengaduan
        </button>
      </div>
    `;
    chatBox.scrollTop = chatBox.scrollHeight;
  }

  window.goToForm = function () {
    window.location.href = "{{ route ('LandingPage.form_pengaduan') }}";
  };

  /* ======================
     INITIAL MESSAGE
  ====================== */
  botMessage("Halo, aku asisten AI. Ceritakan masalahmu, aku akan membantu 🤍");

});

/* ======================
   MODAL CONTROL
====================== */
function openChat() {
  document.getElementById("chatModal").style.display = "flex";
}

function closeChat() {
  document.getElementById("chatModal").style.display = "none";
}
</script>
