<?php

/**
* HTML control class to create multiple tabbed boxes using the layers class.
* The style sheet class is >box<.
* 
* 
* @abstract 
* @package tabber
* @category HTML Controls
* @copyright 2007, University of the Western Cape & AVOIR Project
* @license GNU GPL
* @author Kevin Cyster
* @example
*/
class tabber extends object 
{
    
    /**
    * @var $tabs array :  Array that holds all the tabs
    * @access private
    */
    private $tabs = array();

    /**
    * @var string $setSelected: The tab to shown as default (0, 1, 2 etc.)
    * @access public
    */
    public $setSelected = 0;

    /**
    * @var string $tabId: The tab id
    * @access public
    */
    public $tabId = 'tabPane1';

    /**
    * @var boolean $isNested: TRUE if the tab is in another FALSE if main tab
    * @access public
    */
    public $isNested = FALSE;

    /**
    * Constuctor
    * 
    * @access public
    * @return void
    */    
    public function init()
    {
        $headerParams = $this->getJavascriptFile('tabber.js', 'htmlelements');
        $this->appendArrayVar('headerParams', $headerParams);
        $link = '<link id="tabber" type="text/css" rel="stylesheet" href="core_modules/htmlelements/resources/css/tabber.css" />';
        $this->appendArrayVar('headerParams', $link);
        $this->tabs = array();
        $this->isNested = FALSE;
    }
        
    /**
    * Method that adds a tab
    * 
    * @access public
    * @param array $tab : Can hold the following values
    * name string
    * content string
    * onclick string
    * @return void
    */    
    function addTab($tab = NULL){
        if(is_array($tab)){
            if(isset($tab['name'])){                
                $this->tabs[$tab['name']]['name'] = $tab['name'];
                if(isset($tab['content'])){
                    $this->tabs[$tab['name']]['content'] = $tab['content'];
                }
                if(isset($tab['onclick'])){
                    $this->tabs[$tab['name']]['onclick'] = $tab['onclick'];
                }
            }            
        }        
    }
    
    /**
    * Method to show the tabs
    * 
    * @access public
    * @return $str string
    */
    public function show(){
        if(isset($this->tabs) && is_array($this->tabs)){            
            $str = '<div id="'.$this->tabId.'" class="tabber">';
            $onclick = '';
            $i = 0;
            foreach($this->tabs as $tab){
                if($this->setSelected == $i++){
                    $str .= '<div class="tabbertab tabbertabdefault">';
                }else{
                    $str .= '<div class="tabbertab">';
                }
                $str .= '<h2>';
                $str .= $tab['name'];
                $str .= '</h2>';
                $str .= $tab['content'];
                $str .= '</div>';
            }
            $str .= '</div>';
            if(!$this->isNested){
                $body = 'tabberAutomatic({addLinkId: true})';
                $this->appendArrayVar('bodyOnLoad', $body);
            }
            return $str;
        }
        return FALSE;
    }    
}
?>