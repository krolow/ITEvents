<div class="row-fluid marketing">
    <?php $columns = array_chunk($events, 2); ?>
    <?php foreach ($columns as $events): ?>
    <div class="span6">
        <?php foreach ($events as $event): ?>
                <div class="event">
                <?php  echo $this->Html->image('/uploads/media/logo/logo.' . $event['AttachmentLogo']['filename'], array('class' => 'img-polaroid image left')); ?>
                <div class="meta">
                    <h4><?php echo $event['Event']['title']; ?></h4>
                    <dl>
                        <dt><?php echo __('Where?'); ?></dt>
                        <dd><?php echo $event['City']['name']; ?></dd>
                        <dt><?php echo __('When?'); ?></dt>
                        <dd><?php echo $event['Event']['begin'], ' ', __('to'), ' ', $event['Event']['end']; ?></dd>                        
                    </dl>
                </div>
            </div>
            <span class="clear"><!-- --></span>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
<span class="clear"><!-- --></span>