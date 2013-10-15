<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Blog'); ?>

<div class="row">
    <div class="span12">
        <?php foreach ($articles as $article): ?>

                <div class="container">
                    <h2><?php echo h($articles['Article']['title']); ?><span style="font-size: 16px; font-style: italic; margin-left: 20px; margin-right: 10px">
                                &nbsp;by&nbsp;</span><span style="font-size: 20px;"><?php echo $articles['SystemUser']['first_name']; ?>&nbsp;<?php echo $articles['SystemUser']['last_name']; ?></span></h2>
                </div>
                <p><?php echo $articles['Article']['content']; ?></p>

        <?php endforeach; ?>

        <div class="paging">
            <?php echo $this->Paginator->pagination(array(
                'div' => 'pagination pagination-centered'
            )); ?>
        </div>
    </div>
</div>