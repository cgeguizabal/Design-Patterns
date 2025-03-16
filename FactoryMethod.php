<?php

// Interface 

interface ILevel{
    public function createCharacter();
}
 

// concrete Classes

class skeleton implements ILevel{
    public function createCharacter(){
        return "Skeleton Atacks". 
        PHP_EOL;
    }
    
}

class zombie implements ILevel{
    public function createCharacter(){
        return "Zombie bites". PHP_EOL;
    }

}

// Factory Class
class characterFactory{
    public static function selectedLevel($level) : ILevel{ // New instance must implement ILevel
        return match($level){
            'easy' => new skeleton(),
            'hard' => new zombie(),
            default => throw new Exception("Invalid level, select either Easy or Hard")
        };
    }
}

// Instatiations
$user1 = characterFactory::selectedLevel('hard');
echo $user1->createCharacter();

$user2 = characterFactory::selectedLevel('easy');
echo $user2->createCharacter();