<?php
/*
 * @author Sabri El Gueder <sabri.elgueder@satoripop.com>
 * @version 1.0 
 * @package AjaxAzureBlob
 */

 
namespace SatoripopAzure;

use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
use MicrosoftAzure\Storage\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;

class AzureBlob {

    // private $azureAccountName   = "hayyams";
    // private $azureSecretKey     = "9ziAKP6SIrjDqxHe99vxXnB5WWNocMM4Vb+P0VgESD8=";

    private $azureStorageName;
    private $azureAccountKey;

    private $connectionString;
    private $uploadContainer;

    public function __construct($config = array('azureStorageName' => '', 'azureAccountKey' => '', 'uploadContainer' => 'mycontainer' )){

        $this->azureStorageName = $config['azureStorageName'];
        $this->azureAccountKey  = $config['azureAccountKey'];
        $this->uploadContainer  = $config['uploadContainer'];
        $this->connectionString = "DefaultEndpointsProtocol=https;AccountName=".$this->azureStorageName.";AccountKey=".$this->azureAccountKey;
    }


	public function createCont(){       
        
        // Create blob REST proxy.
        $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($this->connectionString);
        
        // Create container options object.
        $createContainerOptions = new CreateContainerOptions();
        
        $createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);
        
        try {
            // Create container.
            $blobRestProxy->createContainer($this->uploadContainer, $createContainerOptions);
        }
        catch(ServiceException $e){
            // Handle exception based on error codes and messages.
            // Error codes and messages are here:
            // http://msdn.microsoft.com/library/azure/dd179439.aspx
            $code = $e->getCode();
            $error_message = $e->getMessage();
            echo $code.": ".$error_message."<br />";
        }
        
        return "Container created";
    }
    
    

    public function createBlob($file,$blob_name){

        // Create blob REST proxy.
        $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($this->connectionString);
        
        if(is_readable($file)){
            $content = fopen($file, "r");
        }else{
            return "File not found";
        }
        
        try {
            //Upload blob
            $blobRestProxy->createBlockBlob($this->uploadContainer, $blob_name, $content);
        }
        catch(ServiceException $e){
            // Handle exception based on error codes and messages.
            // Error codes and messages are here:
            // http://msdn.microsoft.com/library/azure/dd179439.aspx
            $code = $e->getCode();
            $error_message = $e->getMessage();
            echo $code.": ".$error_message."<br />";
        }
        
        return "file uploaded";
    }


    public function listBlobs($Container = null){

        if($Container == null) {
            $Container = $this->uploadContainer;
        }
        
        try{
            // List all containers
            $blobClient = ServicesBuilder::getInstance()->createBlobService($this->connectionString);
            $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($this->connectionString);
            
            $blob_list = $blobRestProxy->listBlobs($Container);
            $blobs = $blob_list->getBlobs();
            
            foreach($blobs as $blob)
            {
                echo $blob->getName().": ".$blob->getUrl()."<br />";
            }          
            
        }
        catch(ServiceException  $e){
            print_r($e->getMessage());
        }
    }


    public function downloadBlob($blob_name) {
        
        $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($this->connectionString);        
        
        try {
            // Get blob.
            $blob = $blobRestProxy->getBlob($this->uploadContainer, $blob_name);             
            $source = stream_get_contents($blob->getContentStream());            
            echo '<img src="data:image/jpeg;base64,' . base64_encode( $source ) . '" />';            
        }
        catch(ServiceException $e){
            // Handle exception based on error codes and messages.
            // Error codes and messages are here:
            // http://msdn.microsoft.com/library/azure/dd179439.aspx
            $code = $e->getCode();
            $error_message = $e->getMessage();
            echo $code.": ".$error_message."<br />";
        }
    }


    public function test(){
        echo 'this is test!';
    }

}
