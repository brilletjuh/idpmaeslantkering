#!/usr/bin/env python

import nxt.locator
from nxt.sensor import *
from nxt.locator import Method

b = nxt.locator.find_one_brick(method=Method(usb=True, bluetooth=False))

print('Touch:', Touch(b, PORT_1).get_sample())
print('Sound:', Touch(b, PORT_2).get_sample())
print('Light:', Light(b, PORT_3).get_sample())
print('Ultrasonic:', Ultrasonic(b, PORT_4).get_sample())
