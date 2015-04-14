<?php

class Mygento_Eventmon_Block_Adminhtml_Graph extends Mage_Adminhtml_Block_Template
{

    public function _toHtml()
    {

        $items = Array();
        $groups = Array();
        $collection = Mage::getModel('eventmon/event')->getCollection();
        foreach ($collection as $event) {
            //print_r($event);
            $groups[] = $event->getData('event');
            $data = array("id" => $event->getId(), "group" => $event->getData('event'), "content" => $event->getData('message'), "start" => Mage::app()->getLocale()->date($event->getData('start_time'))->get(Zend_Date::ISO_8601));
            if ("" != $event->getData('end_time')) {
                $data['end'] = Mage::app()->getLocale()->date($event->getData('end_time'))->get(Zend_Date::ISO_8601);
            }

            $items[] = $data;
        }
        $groups = array_unique($groups);
        sort($groups);
        $new_groups = Array();
        foreach ($groups as $key => $value) {
            $new_groups[] = array('id' => $key, 'content' => $value);
        }
        $new_items = Array();
        foreach ($items as $item) {
            $item['group'] = array_search($item['group'], $groups);
            $new_items[] = $item;
        }

        $html = "<div id = \"visualization\"></div>
            <script type=\"text/javascript\">
  // DOM element where the Timeline will be attached
  var container = document.getElementById('visualization');

  // create groups
  var groups = new vis.DataSet(" . json_encode($new_groups) . ");
      
  // Create a DataSet (allows two way data-binding)
  var items = new vis.DataSet(" . json_encode($new_items) . ");

  // Configuration for the Timeline
  var options = {width: '100%', height: '300px',zoomMax: 100000000, zoomMin: 10000, type: 'box'};

  // Create a Timeline
  var timeline = new vis.Timeline(container, items, options);
  timeline.setGroups(groups);
  timeline.setItems(items);
</script>
        ";
        return $html;
    }
}
