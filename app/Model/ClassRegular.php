<?php
class ClassRegular extends AppModel{
	public $actsAs = array('Containable');
	  public $hasMany = array(
		'RegularRecurringClasse'  => array('className' => 'RegularRecurringClasse'),
	);
}
?>