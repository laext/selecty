<?php

namespace Laext\Selecty;

use Encore\Admin\Form\Field\Select;

class Selecty extends Select
{
	protected $view = 'laext-selecty::selecty';

	protected $selected = [];

	public function selected($target)
	{
		$this->selected = $target;
		$this->value = $target;
		return $this;
	}

	public function render()
	{
		if ($this->selected instanceof \Closure) {
			if ($this->form) {
				$this->selected = $this->selected->bindTo($this->form->model());
			}
			$this->selected(call_user_func($this->selected, $this->value, $this));
		}else{
			$this->value = $this->selected;
		}
		
		return parent::render();
	}
}