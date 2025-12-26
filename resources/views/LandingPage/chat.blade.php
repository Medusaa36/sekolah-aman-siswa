<div class="chat-modal" id="chatModal">
  <div class="chat">

    <div class="header bg-primary">
      <span>Pengaduan Online</span>
      <a class="close" onclick="closeChat()">
        <i class="fa-solid fa-xmark"></i>
      </a>
    </div>

    <div class="chat-container">

      <div class="chat-box" id="chatBox"></div>

      <div class="input-area" id="inputArea">
        <input 
          type="text" 
          id="userInput" 
          placeholder="Ketik jawaban di sini..."
          onkeydown="if(event.key==='Enter') sendMessage()"
        />
        <button onclick="sendMessage()">Kirim</button>
        <input type="file" id="fileInput" accept="image/png,image/jpeg" hidden />
      </div>

    </div>
  </div>
</div>
