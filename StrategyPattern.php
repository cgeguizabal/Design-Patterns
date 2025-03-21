<?php

// Interface Strategy
interface IOutputType{
 public function output($data);   
}

// Concrete Strategies

class console implements IOutputType{
    public function output($data){
        return 'Console output:' .  $data . PHP_EOL;
    }
}

class formatJson implements IOutputType{
    public function output($data){
        return json_encode($data);
    }
}

class formatTxt implements IOutputType{
    public function output($data){
        $fileName = "output_" . uniqid() . ".txt";
        file_put_contents($fileName, $data);
        return 'File created with name: ' . $fileName;
    }
}

// Context Class

class outputContext{
    private IOutputType $selectedOutput;

    //Setter
    public function setOutput(IOutputType $outputType){
        $this->selectedOutput = $outputType;
    }

    
    //I call it action trigger method

    public function showData($data){
        return $this->selectedOutput->output($data);
    }
}


$test1 = new outputContext();
$test1->setOutput((new console()));
echo $test1->showData("Hello World");

$test2 = new outputContext();
$test2->setOutput((new formatTxt()));
echo $test2->showData("Goodbye World");