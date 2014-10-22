Magento Event Monitor module
============================

Модуль мониторинга событий
--------------------------
Модуль позволяет быстро и просто собрать и отобразить данные по событиям из вашем кода


Magento Event Monitor module
----------------------------
Simple and elegant library to collect and graph your model events from your code

Usage
-----

## On start create model with event name

    $event = Mage::getModel('eventmon/event')->processStart($event_name)


## On update status 
    
    $event->updateStatus($event_name)

## On update status 

    $event->processEnd($message, $status = 'finished')


Display Graph
-------------

## Via layout

    <block type="eventmon/adminhtml_graph" name="eventmon_graph" />

## In code

    echo Mage::getSingleton('core/layout')->createBlock('eventmon/adminhtml_graph')->toHtml();

Support
-------
If you have any issues with this extension, open an issue on [GitHub](https://github.com/mygento/eventmon/issues).

License
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

=======
www.mygento.ru