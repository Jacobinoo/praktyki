<?php
function gpioToggle($port, $action) {
    system("gpio -g write $port $action");
}