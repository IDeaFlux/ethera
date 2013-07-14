<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Blog'); ?>

<div class="row">
    <div class="span12">
            <?php foreach ($articles as $article): ?>
                    <h1><?php echo h($article['Article']['title']); ?></h1>
                    <p><?php echo $article['Article']['content']; ?></p>
                    <?php echo $article['SystemUser']['first_name']; ?>
            <?php endforeach; ?>
        <p>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>	</p>
        <div class="paging">
            <?php echo $this->Paginator->pagination(array(
                'div' => 'pagination pagination-centered'
            )); ?>
        </div>
    </div>
</div>