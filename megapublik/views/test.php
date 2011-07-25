<?php

echo serialize(array('MP' => 50000, 'ESP' => 50000)).'<br />';

echo var_dump(unserialize(serialize(array(2.34)))).'<br />';

echo serialize(array(234)).'<br />';

echo time();
