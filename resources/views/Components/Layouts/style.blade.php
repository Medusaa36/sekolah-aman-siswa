<!-- Favicon -->
<link href="img/favicon.ico" rel="icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&family=Open+Sans&display=swap"rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="{{ asset ('Charitize/lib/animate/animate.min.css')}}" rel="stylesheet">
<link href="{{ asset ('Charitize/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{ asset ('Charitize/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset ('Charitize/css/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@talkjs/web-components@0.0.31/default.css"/>

<style>
  .header {
    color: white;
    padding: 14px 16px;
    font-weight: 600;
    text-align: center;
    position: relative;
  }

  .header .close {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: white;
    cursor: pointer;
    font-size: 18px;
  }

  .messages {
    flex: 1;
    padding: 12px;
    overflow-y: auto;
    background: #f0f2f5;
  }

  .msg {
    max-width: 70%;
    padding: 10px 14px;
    border-radius: 18px;
    margin-bottom: 6px;
    font-size: 14px;
    word-wrap: break-word;
  }

  .me {
    background: #0084ff;
    color: white;
    margin-left: auto;
    border-bottom-right-radius: 4px;
  }

  .other {
    background: #e4e6eb;
    color: #050505;
    margin-right: auto;
    border-bottom-left-radius: 4px;
  }

  .form {
    display: flex;
    padding: 10px;
    border-top: 1px solid #ddd;
  }

  input {
    flex: 1;
    padding: 10px 12px;
    border-radius: 20px;
    border: 1px solid #ccd0d5;
    outline: none;
  }

  button {
    margin-left: 8px;
    padding: 10px 16px;
    border-radius: 20px;
    border: none;
    background: #0084ff;
    color: white;
    font-weight: bold;
    cursor: pointer;
  }
  .chat-modal {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.45);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 3000;
    backdrop-filter: blur(4px);
  }

  .chat {
    width: 100%;
    max-width: 380px;
    height: 540px;
    background: #fff;
    border-radius: 16px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0,0,0,.2);
  }

  .pengaduan-page {
    background: linear-gradient(135deg, #eef2ff, #f8fafc);
    min-height: 100vh;
    padding: 40px 0;
  }

  .pengaduan-page .card {
    background: #fff;
    width: 100%;
    max-width: 520px;
    padding: 32px;
    border-radius: 14px;
    box-shadow: 0 20px 40px rgba(0,0,0,.08);
    margin: auto;
  }

  .pengaduan-page .form-group {
    margin-bottom: 18px;
  }

  .pengaduan-page label {
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
    font-size: .9rem;
    color: #1f2937;
  }

  .pengaduan-page input,
  .pengaduan-page select,
  .pengaduan-page textarea {
    width: 100%;
    padding: 12px 14px;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    font-size: .95rem;
    outline: none;
    transition: .2s;
  }

  .pengaduan-page input:focus,
  .pengaduan-page select:focus,
  .pengaduan-page textarea:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 0 3px rgba(79,70,229,.15);
  }

  .pengaduan-page textarea {
    resize: vertical;
    min-height: 110px;
  }

  .pengaduan-page button[type="submit"] {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    background: #4f46e5;
    color: #fff;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: .2s;
  }

  .pengaduan-page button[type="submit"]:hover {
    background: #4338ca;
  }

  .pengaduan-page .note {
    margin-top: 14px;
    font-size: .8rem;
    color: #6b7280;
    text-align: center;
  }

  .chat-container {
    flex: 1;
    display: flex;
    flex-direction: column;
    background: #f5f7fb;
    overflow: hidden;
    }

  .chat-box {
    flex: 1;
    padding: 10px;
    overflow-y: auto;
    scroll-behavior: smooth;
  }

  .bot {
    background: #ffffff;
    color: #333;
    padding: 10px 14px;
    border-radius: 14px 14px 14px 4px;
    margin-bottom: 10px;
    max-width: 80%;
    font-size: 14px;
    box-shadow: 0 2px 6px rgba(0,0,0,.08);
  }

  .user {
    background: #1976d2;
    color: white;
    padding: 10px 14px;
    border-radius: 14px 14px 4px 14px;
    margin-bottom: 10px;
    max-width: 80%;
    margin-left: auto;
    font-size: 14px;
    box-shadow: 0 2px 6px rgba(0,0,0,.1);
  }

  .input-area {
    display: flex;
    padding: 10px;
    border-top: 1px solid #e0e0e0;
    background: white;
    flex-shrink: 0;
  }

  input-area input {
    flex: 1;
    padding: 10px 14px;
    border-radius: 20px;
    border: 1px solid #ddd;
    outline: none;
    font-size: 14px;
  }

  .input-area input:focus {
    border-color: #1976d2;
  }

  .input-area button {
    margin-left: 8px;
    padding: 10px 16px;
    border-radius: 20px;
    border: none;
    background: #1976d2;
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: .2s;
  }

  .input-area button:hover {
    background: #1565c0;
  }

  .option-btn {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    border-radius: 8px;
    border: none;
    background: #1976d2;
    color: white;
    font-size: 14px;
    cursor: pointer;
    transition: .2s;
  }

  .option-btn:hover {
    background: #1565c0;
  }

  .upload-btn {
    background: #4caf50;
  }
</style>
