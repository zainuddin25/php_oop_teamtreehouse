<?php

class MyRecipe// blueprint
{
    private $title;
    private $ingredients = array();//variable di dalam class(poperty)
    private $Instruction = array();
    private $yield;
    private $tag = array();
    private $source = " akbar kurnia";
    private $measureement = array(
           "tsp",
           "cup",
           "oz",
           "lb",
           "fl oz",
           "gallon"
    );

    public function __construct($title = null)// langsung di eksekusi tanpa harus di eksekusi dulu
    {
        $this->setTitle($title);
    }
    public function __toString()
    {
       
        $output="\nThe folowing method are available for object 0 this class:\n";
        $output.= implode("\n".get_class_methods(__CLASS__));
        return $output;
    }
    public function setTitle($title){// Setter set variable
     if(empty($title)){$this->title=null;

     }else{
         $this->title =ucwords($title);
     }
    }
    public function getTitle()
    {
        return $this->title;
    }
    

    public function AddIngredient($item,$amount = null,$measure=null)
    {
        if($amount !=null && !is_float($amount) && !is_int($amount)){
            exit("amount must float: ".gettype($amount)."$amount given");
        }
        if ($measure !=null && !in_array(strtolower($measure),$this->measureement)){
            exit("please enter a valid meansurement: ". implode(",",$this->measureement));
        }
       $this->ingredients[]= array(
           "item"=> $item,
           "amount"=> $amount,
           "meansure"=> strtolower($measure)
       );
    }
    

        
        public function getIngredients()
        {
            return $this->ingredients;
        }
        public function addInstruction($string)
        {
            $this->Instruction[] = $string;
        }
        public function getinstruction(){
            $this->Instruction;
        }
        public function addTags($tag){
            $this->tags[] = strtolower($tag);

        }
        public function getTags()
        {
            return $this->tags;
        }
          
        public function setYield($yield)
        {
            $this->yield = $yield;
        }
        public function getYield()
        {
            return $this->yield;
        }
        public function setSource($source)
        {
            $this->source = ucwords($source);
        }
        public function getSource()
        {
            return $this->source;
        }
    public function DisplayRecipe()// function di dalam class(method)
    {
        return $this->title. " by ".$this->source;// semua prop dan method n=bisa di akses dengen this
    }
}

