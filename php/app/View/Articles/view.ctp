<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Article'); ?>

<div class="row">
    <div class="span12 thumbnail">
                <div class="container">
                    <h2><?php echo h($article['Article']['title']); ?><span style="font-size: 16px; font-style: italic; margin-left: 20px; margin-right: 10px">
                                &nbsp;by&nbsp;</span><span style="font-size: 20px;"><?php echo $article['SystemUser']['first_name']; ?>&nbsp;<?php echo $article['SystemUser']['last_name']; ?></span></h2>
                </div>
                <p><?php echo $article['Article']['content']; ?></p>
    </div>
</div>