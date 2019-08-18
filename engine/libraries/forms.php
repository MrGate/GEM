<?PHP  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// GEM Forms Librarie

class Forms
{
	// Form name
	public $name = null;
	
	// Form method (post = default)
	public $method = 'post';
	
	// Form action
	public $action = null;
	
	// Submit button value
	public $submit_btn_text = 'Submit';
	
	// Default character set
	public $charset = 'utf-8';
	
	// form errors
	public $form_error = false;
	
	// form session
	public $session = null;
	
	protected $csf_token = null;
	
	public $htmlGenerated = null;
	
	public function __construct()
	{
		
	}
	
	public function open($action, $method = "post")
	{
		$this->htmlGenerated .= '<form action="'.$action.'" method="'.$method.'">';
		return $this;
	}

	public function element_text($field_name)
	{
		$this->htmlGenerated .= '<input type="text" name="'.$field_name.'" value=""/>';
		return $this;
	}
	
	public function element_submit($button_text = false)
	{
		if($button_text == false) 
			$button_text = $this->submit_btn_text;
		$this->htmlGenerated .= "<input type='submit' value='".$button_text."'/>";
		return $this;
	}
	
	public function close()
	{
		$this->htmlGenerated .= '</form>';
		return $this;
	}
	
	public function getHtml()
	{
		return $this->htmlGenerated;
	}
}