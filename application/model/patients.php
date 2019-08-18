<?php

// just a example to show how the models work
class Patients extends Gem_model {

	public function test()
	{
		$buffer = $this->db->query('SELECT * FROM patients');
		$this->db->free();
		return $buffer;
	}

}