<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property City $City
 * @property Technology $Technology
 */
class Event extends AppModel {

	public $actsAs = array(
		'Komplete.Completable' => array(
			'relations' => array(
				'Technology' => array(
					'multiple' => true,
					'field' => 'name',
				),
				'City' => array(
					'multiple' => false,
					'field' => 'name',
				),
			),
			'separator' => ','
		),
        'Attach.Upload' => array(
            'teaser' => array(
                'dir' => 'webroot{DS}uploads{DS}media{DS}teaser',
                'thumbs' => array(
                    'teaser' => array(
                        'w' => 700,
                        'h' => 400,
                        'crop' => true,
                    ),
                ),
            ),
            'logo' => array(
                'dir' => 'webroot{DS}uploads{DS}media{DS}logo',
                'thumbs' => array(
                    'thumb' => array(
                        'w' => 50,
                        'h' => 50,
                        'crop' => true,
                    ),                	
                    'logo' => array(
                        'w' => 140,
                        'h' => 140,
                        'crop' => true,
                    ),
                ),
            ),                
        )
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'begin' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'City' => array(
			'empty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Technology' => array(
			'empty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'logo' => array(
            'extension' => array(
                'rule' => array(
                    'extension', 
                    array(
                        'jpg',
                        'jpeg',
                    )
                ),
                'message' => 'File extension is not supported',
                'on' => 'create'
            ),
            'mime' => array(
                'rule' => array(
                	'mime', 
                	array(
                    	'image/jpeg',
                    	'image/pjpeg',
                	)
                ),
                'on' => 'create'
            ),
            'size' => array(
                'rule' => array(
                	'size', 
                	2097152
                ),
                'on' => 'create'
            )
        ),
        'teaser' => array(
            'extension' => array(
                'rule' => array(
                    'extension', array(
                        'jpg',
                        'jpeg',
                    )
                ),
                'message' => 'File extension is not supported',
                'on' => 'create'
            ),
            'mime' => array(
                'rule' => array(
                	'mime', 
                	array(
                    	'image/jpeg',
                    	'image/pjpeg',
                	)
                ),
                'on' => 'create'
            ),
            'size' => array(
                'rule' => array(
                	'size', 
                	2097152
                ),
                'on' => 'create'
            )
        ),        
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'City',
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Technology' => array(
			'className' => 'Technology',
			'joinTable' => 'technologies_events',
			'foreignKey' => 'event_id',
			'associationForeignKey' => 'technology_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);


	public function getUptocome($limit = 10) {
		return $this->find(
			'all',
			array(
				'contain' => array(
					'AttachmentTeaser',
					'City'
				),
				'conditions' => array(
					'Event.begin >=' => date('Y-m-d'),
				),
				'limit' => $limit,
				'order' => array(
					'Event.begin' => 'ASC'
				)
			)
		);
	}

}