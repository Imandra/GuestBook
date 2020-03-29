<div id="messages" style="margin: 3em 0;">
    <h2>Последние добавленные</h2><hr>
    <?php foreach ($this->data['items'] as $item): ?>
        <h4><?php echo htmlspecialchars($item->name); ?></h4>
        <div>
            <p><small><?php echo htmlspecialchars(date("d-m-Y H:i:s", strtotime($item->dtime))); ?></small></p>
            <p><?php echo htmlspecialchars($item->body); ?></p><hr>
        </div>
    <?php endforeach; ?>
</div>