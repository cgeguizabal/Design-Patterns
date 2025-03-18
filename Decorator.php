/*
Crear un programa donde sea posible añadir diferentes armas a ciertos personajes de videojuegos.
Debes utilizar al menos dos personajes para este ejercicio.



Para llevar a cabo esta tarea, aplica el patrón de diseño Decorator. */


<?php

interface ICharacter{
public function description() : string;
}

//BASE concrete class
class simpleCharacter implements ICharacter{
public function description() : string{
return 'Simple Character';
}
}

//Main Decorator
abstract class CharacterDecorator implements ICharacter{
    protected ICharacter $character;

    public function __construct(ICharacter $character){
        $this->character = $character;
    }

    public function description() : string{
        return $this->character->description();
    }
    
}

//Decorators

class SwordDecarator extends CharacterDecorator{


    public function description() : string{
        return $this->character->description().' with a sword';  
      }
}

class ShieldDecarator extends CharacterDecorator{


    public function description() : string{
        return $this->character->description().' with a Shield';  
      }
}

class HelmetDecarator extends CharacterDecorator{


    public function description() : string{
        return $this->character->description().' with a helmet';  
      }
}

$firstCharacter = new simpleCharacter();
echo $firstCharacter->description() . PHP_EOL;

$firstCharacter = new SwordDecarator($firstCharacter);
echo $firstCharacter->description() . PHP_EOL;



$secondCharacter = new simpleCharacter();
echo $secondCharacter->description() . PHP_EOL;

$secondCharacter = new ShieldDecarator($secondCharacter);
echo $secondCharacter->description() . PHP_EOL;



$thirdCharacter = new simpleCharacter();
echo $thirdCharacter->description() . PHP_EOL;

$thirdCharacter = new HelmetDecarator($thirdCharacter);
echo $thirdCharacter->description() . PHP_EOL;