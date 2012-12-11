<div class="events add">
    <fieldset>
        <legend><?php echo __('Register your event'); ?></legend>
        <?php 
            echo $this->Form->create('Event', array('type' => 'file'));
            echo $this->Form->input(
                'Event.title',
                array(
                    'class' => 'input-xlarge'
                )
            );
            echo $this->Form->input(
                'Event.description', 
                array(
                    'type' => 'textarea',
                )
            );
            echo $this->Form->input(
                'Event.begin',
                array(
                    'label' => 'When the event begins?',
                )
            );
            echo $this->Form->input(
                'Event.end',
                array(
                    'label' => 'When the event ends?',
                )
            );
            echo $this->Form->input(
                'Event.logo', 
                array(
                    'label' => 'Event Logo',
                    'type' => 'file'
                )
            );
            echo $this->Form->input(
                'Event.teaser', 
                array(
                    'label' => 'Event Teaser',
                    'type' => 'file'
                )
            );
            echo $this->Form->input(
                'Event.City', 
                array(
                    'type' => 'text', 
                    'class' => 'komplete input-xlarge',
                    'data-multiple' => false,
                    'data-link' => $this->Html->url(
                        array(
                            'controller' => 'complete',
                            'action' => 'search',
                            'plugin' => 'komplete',
                            'Event',
                            'City',
                            'ext' => 'json'
                        ),
                        true
                    )
                )
            );
            echo $this->Form->input(
                'Event.Technology', 
                array(
                    'type' => 'text',
                    'class' => 'komplete input-xlarge',
                    'data-multiple' => true,
                    'data-link' => $this->Html->url(
                        array(
                            'controller' => 'complete',
                            'action' => 'search',
                            'plugin' => 'komplete',
                            'Event',
                            'Technology',
                            'ext' => 'json'
                        ),
                        true
                    )
                )
            );
        ?>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button>
            <button type="button" class="btn"><?php echo __('Cancel'); ?></button>
        </div>
        </form>
    </fieldset>
</div>
<?php
    $this->Html->script(
        array(
            '/js/autocomplete.js',
        ),
        array(
            'inline' => false
        )
    );
?>