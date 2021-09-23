<div class="chat not-active" id="chat">
    <div class="chat-img-container" id="chat-img-container" onclick="ToggleChat()">
        <img id="chat-img" src="mainimages/chat.png">
    </div>
    <div class="chat-content" id="chat-content">
        <div class="close-btn" onclick="ToggleChat()"></div>
        <h1>Friends chat</h1>
        <form name="form" method="post" enctype="multipart/form-data">
            <input class="input-friend" type="text" name="friend" placeholder="Search Your Friends !">
            <div class="arrow-container">
                <div class="arrow" id="arrow-list" onclick="ToggleFriendList()">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                        class="svg-inline--fa fa-chevron-right fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                        </path>
                    </svg>
                </div>
            </div>
        </form>
        <h2>Chat</h2>
        <div class="chat-box-container">
            <div class="chat-box">
                <div class="message">
                    <div class="message-img-container">
                        <img class="message-img" src="TokyoRevengers/character/mikey.jpg">
                    </div>
                    <div class="message-content-container">
                        <p class="message-content">Ceci est un message de test</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(!empty($_POST['friend'])){echo "<script type='text/javascript'>ToggleChat();</script>";} ?>
