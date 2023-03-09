<div class="send-block">
    <a href="#" class="send-button" id="send-page-link">Send</a>
</div>

<div class="receive-block">
    <a href="#" class="receive-button" id="receive-page-link" >Receive</a>
</div>

<script type ="text/javascript">
    const url = window.location.href;
    document.getElementById("send-page-link").setAttribute("href", url + "?page=send");
    document.getElementById("receive-page-link").setAttribute("href", url + "?page=receive");
</script>