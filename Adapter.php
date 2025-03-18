<?php 

interface IOpener{
    public function open() : string;
}


//Adaptee
class fileWindows7Version{
    public function fetchFile() : string{
        return 'File opened: document.docx' . PHP_EOL;
    }
}

//Adapter
class Version10Adapter implements IOpener{
    private fileWindows7Version $fileWindows7Version;

    public function __construct(fileWindows7Version $fileWindows7Version){
        $this->fileWindows7Version = $fileWindows7Version;
    }

    public function open() : string{
        return $this->fileWindows7Version->fetchFile();
    }
    
}

//Cliet code
function FileOpener(IOpener $opener){
    return $opener->open();
}

$fileWindows7Version = new fileWindows7Version();
$adaptation = new Version10Adapter($fileWindows7Version);

echo FileOpener($adaptation);