<?php
/**
 * Copyright © 2015 Darsh. All rights reserved.
 */

namespace Darsh\Shippingreport\Controller\Adminhtml\Items;

class NewAction extends \Darsh\Shippingreport\Controller\Adminhtml\Items
{

    public function execute()
    {   	
	        $fileName = 'order_shipping_data.csv';
	        $filePath = $this->directoryList->getPath(\Magento\Framework\App\Filesystem\DirectoryList::VAR_DIR)
	            . "/" . $fileName;
	        
	        $customOrderData = $this->getOrderData($this->orderData);
	        $this->csvProcessorObj->setDelimiter(',')->setEnclosure('"')->saveData($filePath,$customOrderData);

	        return $this->fileFactory->create(
	            $fileName,
	            [
	                'type'  => "filename",
	                'value' => $fileName,
	                'rm'    => true,
	            ],
	            \Magento\Framework\App\Filesystem\DirectoryList::VAR_DIR,
	            'application/octet-stream'
	        );
    }

    protected function getOrderData($orderData)
    {
        $result       = [];        
        $result[]     = [
            'entity_id',
            'increment_id',
            'created_at',
            'weight',
            'shipping_method',
            'shipping_incl_tax',            
        ];               

        foreach ($orderData as $data) {
            $result[] = [
                $data['entity_id'],
                $data['increment_id'],
                $data['created_at'],
                $data['weight'],                
                $data['shipping_method'],
                $data['shipping_incl_tax'],                
            ];            
        }

        return $result;
    }
}
