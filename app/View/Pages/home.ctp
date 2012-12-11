<div class="jumbotron">
    <h1><?php echo __('Take part of all IT Events'); ?></h1>
    <p class="lead">What about have all IT events in just one place? Yeah, that is the idea behind IT Events, it helps you know all the IT events that are around you.</p>
    <?php 
        echo $this->Html->link(
            __('Register your event today'), 
            array(
                'controller' => 'events', 
                'action' => 'add'
            ), 
            array(
                'class' => 'btn btn-large btn-success'
            )
        ); 
    ?>
</div>

<div class="events">
    <h3><?php echo __('Up to come Events'); ?></h3>
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
        <?php 
            $events = $this->requestAction(
                array(
                    'controller' => 'events',
                    'action' => 'carrousel'
                )
            );
        ?>
        <?php foreach ($events as $event): ?>
        <div class="item">
            <a href="<?php echo $this->Html->url(array('controller' => 'events', 'action' => 'view', $event['Event']['id'])); ?>">
            <?php 
                echo $this->Html->image(
                    sprintf(
                        '/uploads/media/teaser/teaser.%s',
                        $event['AttachmentTeaser']['filename']
                    )
                );
            ?>
            <div class="container">
                <div class="carousel-caption">
                    <h4>
                        <?php 
                            printf(
                                __('%s in %s'), 
                                $event['Event']['title'], 
                                $event['City']['name']
                            ); 
                        ?>
                    </h4>
                        <p class="lead"><?php echo $this->Text->truncate($event['Event']['description'], 140); ?></p>
                    <?php 
                        echo $this->Html->link(
                            __('Take a look at this event'),
                            array(
                                'controller' => 'events',
                                'action' => 'view',
                                $event['Event']['id']
                            )
                        );
                    ?>
                </div>
            </div>
            </a>
        </div>
    <?php endforeach; ?>    
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div>
