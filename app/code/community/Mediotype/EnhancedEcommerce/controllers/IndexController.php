<?php

/**
 * @author  Joel Hart
 */
class Mediotype_EnhancedEcommerce_IndexController extends Mage_Core_Controller_Front_Action
{

    /**
     *
     */
    public function indexAction()
    {
    }

    public function getProductSkuByIdAction()
    {
        $productId = $this->getRequest()->getParam('productId');
        $product = Mage::getModel('catalog/product')->load($productId);
        if ($product->getId()) {
            $response = array(
                'productId'  => $product->getID(),
                'productSku' => $product->getSku(),
                'response'   => 'success'
            );
            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($response));
        } else {
            $response = array(
                'msg'      => 'failed to load product id: ' . $productId,
                'response' => 'error'
            );
            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($response));
        }
    }

    public function recordMeasurementAction()
    {

        $params = $this->getRequest()->getParams();

        //todo check if GA json is requested
        //todo create record table for auditing purposes (report)
        //todo look at analytics api for bringing GA data into Magento admin
        //todo look at creating analytics report in admin based solely on local data

        //todo return json response?
        //todo somehow validate session and integrity of data

    }

    public function getGoogleAnalyticsAPIDataAction()
    {
    }
}
