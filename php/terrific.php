<?php

/**
 * Global function to include terrific modules in templates
 *
 * @param $name
 * @return Terrific
 */
function module($name) {
	return new Terrific($name);
}


/**
 * Class Terrific
 */

class Terrific {

	protected $name;
	protected $params;
	protected $template;
	protected $skins = array();

	protected $configs = array('tag' => 'div', 'fileext' => '.phtml');
	protected $attribs = array();

	/**
	 * Constructor
	 *
	 * @param $name module name
	 */
	public function __construct($name) {
		$this->name = strtolower($name);
	}

	/**
	 * Render module when using echo (magic method)
	 *
	 * @return string Module
	 */
	public function __toString() {
		return $this->render();
	}

	/**
	 * Set template
	 *
	 * @param $template
	 * @return $this
	 */
	public function template($template) {
		$this->template = strtolower($template);
		return $this;
	}

	/**
	 * Set skin
	 *
	 * @param $skin
	 * @return $this
	 */
	public function skin($skin) {
		$this->skins[] = $skin;
		return $this;
	}

	/**
	 * Set skins
	 *
	 * @param array $skins
	 * @return $this
	 */
	public function skins(array $skins = array()) {
		$this->skins = array_unique(array_merge($this->skins, $skins));

		return $this;
	}

	/**
	 * Set html tag
	 *
	 * @param $tag
	 * @return $this
	 */
	public function tag($tag) {
		$this->configs['tag'] = $tag;

		return $this;
	}

	/**
	 * Add attribute
	 *
	 * @param $name
	 * @param $value
	 * @return $this
	 */
	public function attrib($name, $value) {
		$this->attribs[$name] = $value;

		return $this;
	}

	/**
	 * Add attributes
	 *
	 * @param $name
	 * @param $value
	 */
	public function attribs(array $attribs = array()) {
		$this->attribs = array_unique(array_merge($this->attribs, $attribs));

		return $this;
	}

	/**
	 * Render a module
	 *
	 * @return string
	 */
	public function render() {

		// Classes
		$classes = array('mod', "mod-{$this->name}");

		// Skin Classes
		foreach ($this->skins as $skin) {
			$classes[] = sprintf("skin-%s-%s", $this->name, strtolower($skin));
		}

		// Attribs
		$attribs = array();
		foreach ($this->attribs as $name => $value) {
			switch ($name) {
				case 'class':
					if (!empty($value)) {
						$classes[] = $value;
					}
					break;
				default:
					if (empty($value)) {
						$attribs[] = "{$name}";
					} else {
						$attribs[] = "{$name}=\"{$value}\"";
					}
					break;
			}
		}

		// Add Prefix/Suffix
		$out = sprintf('<!-- mod-%1$s -->'.PHP_EOL.'<%2$s class="%3$s"%4$s>' . PHP_EOL . '%5$s' . PHP_EOL . '</%2$s>'.PHP_EOL.'%6$s',
						$this->name,
						strtolower($this->configs['tag']),
						implode(' ', $classes),
						(count($attribs) ? ' ' . implode(' ', $attribs) : ''),
						self::includeTemplate(),
						"<!-- /mod-{$this->name} -->"
		);

		return $out . PHP_EOL;
	}

	/**
	 * Include template markup
	 *
	 * @return string
	 */
	protected function includeTemplate() {

		if (file_exists($this->templateFile())) {
			ob_start();
			include $this->templateFile();
			return ob_get_clean();
		} else {
			return sprintf("<!-- Template does not exists: %s/%s -->", basename(dirname($this->name)), basename($this->template));
		}
	}

	/**
	 * Get template file
	 *
	 * @return string
	 */
	protected function templateFile() {

		$template = '';

		if($this->template) {
			$template = '-'.$this->template;
		}

		return get_template_directory() . '/modules/' . $this->name . '/' . $this->name . $template . $this->configs['fileext'];
	}
}