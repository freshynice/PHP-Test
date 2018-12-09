<?php 
/*********
== User Input == 

The user interface contains two types of user input controls: TextInput, which accepts all texts and NumericInput, which accepts only digits.

Implement the class TextInput that contains:

Public function add($text) - adds the given text to the current value.
Public function getValue() - returns the current value (string).
Implement the class NumericInput that:

Inherits from TextInput.
Overrides the add method so that each non-numeric text is ignored.
For example, the following code should output '10':

$input = new NumericInput();
$input->add('1');
$input->add('a');
$input->add('0');
echo $input->getValue();

PHP 7.1.9
*********/

class TextInput
{
    public $output='';
    public function add($text)
    {
        $this->output .= $text;
    }
    public function getValue()
    {
        return $this->output;
    }
}

class NumericInput extends TextInput
{
    public function add($text)
    {
        if(@is_numeric($text)){
            $this->output .= $text;
        }
    }
}

$input = new NumericInput();
$input->add('1');
$input->add('a');
$input->add('0');
echo $input->getValue();

