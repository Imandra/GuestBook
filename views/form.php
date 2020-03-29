<div style="margin-top: 3em;">
    <form action="" method="post" id="guestbook-form">
        <h2>Отправить сообщение</h2>
        <div class="form-group">
            <label for="name"><span>Ваше имя *</span></label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="body"><span>Ваше сообщение *</span></label>
            <textarea class="form-control" name="body" id="body" required></textarea>
        </div>
        <input type="hidden" name="action" value="Add" required>
        <button type="submit" class="btn btn-primary" id="guestbook-btn">Отправить</button>
    </form>
</div>