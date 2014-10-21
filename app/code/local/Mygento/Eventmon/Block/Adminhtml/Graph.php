<?php

class Mygento_Eventmon_Block_Adminhtml_Graph extends Mage_Adminhtml_Block_Template {

    public function _toHtml() {

        $array = Array();
        $collection = Mage::getModel('eventmon/event')->getCollection();
        $i = 1;
        foreach ($collection as $event) {
            //print_r($event);
            $data = array("id" => $i, "content" => $event->getData('event'), "start" => $event->getData('start_time'));
            if ("" != $event->getData('end_time')) {
                $data['end'] = $event->getData('end_time');
            }
            $i++;
            $array[] = $data;
        }

        $html = "<div id=\"visualization\"></div>
            <script type=\"text/javascript\">
  // DOM element where the Timeline will be attached
  var container = document.getElementById('visualization');

  // Create a DataSet (allows two way data-binding)
  var items = new vis.DataSet(".json_encode($array).");

  // Configuration for the Timeline
  var options = {};

  // Create a Timeline
  var timeline = new vis.Timeline(container, items, options);
</script>
        ";
        return $html;
    }

}
