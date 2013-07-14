<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Blog'); ?>

<div class="row">
    <div class="span12">
            <?php foreach ($articles as $article): ?>
                <?php if($article['Article']['published_state']!="0"): ?>
                    <div class="container">
                        <h2><?php echo h($article['Article']['title']); ?><span style="font-size: 16px; font-style: italic; margin-left: 20px; margin-right: 10px">
                                &nbsp;by&nbsp;</span><span style="font-size: 20px;"><?php echo $article['SystemUser']['first_name']; ?>&nbsp;<?php echo $article['SystemUser']['last_name']; ?></span></h2>
                    </div>
                    <p><?php echo $article['Article']['content']; ?></p>
                    <?php endif ?>
            <?php endforeach; ?>

        <div class="paging">
            <?php echo $this->Paginator->pagination(array(
                'div' => 'pagination pagination-centered'
            )); ?>
        </div>
    </div>
</div>