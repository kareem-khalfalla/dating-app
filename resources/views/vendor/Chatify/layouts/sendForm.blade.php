<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept="image/*, .txt, .rar, .zip" /></label>
        <textarea readonly='readonly' name="message" class="m-send app-scroll form-control type_msg" placeholder="Type a message.."></textarea>
        <button disabled='disabled' class="input-group-text send_btn"><span class="fas fa-paper-plane"></span></button>
    </form>
</div>