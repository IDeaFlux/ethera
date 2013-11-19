<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Blog'); ?>

<div class="row">
    <div class="span12 thumbnail well">
            <?php foreach ($articles as $article): ?>
                <?php if($article['Article']['published_state']!="0"): ?>
                    <div class="container">
                        <h2><?php echo $this->Html->link(h($article['Article']['title']),array('action'=>'view',$article['Article']['id'])); ?><span style="font-size: 16px; font-style: italic; margin-left: 20px; margin-right: 10px">
                                &nbsp;by&nbsp;</span><span style="font-size: 20px;"><?php echo $article['SystemUser']['first_name']; ?>&nbsp;<?php echo $article['SystemUser']['last_name']; ?></span></h2>
                    </div>
                    <p><?php echo $article['Article']['content']; ?></p>
                    <?php endif ?>
            <?php endforeach; ?>
    </div>
</div>