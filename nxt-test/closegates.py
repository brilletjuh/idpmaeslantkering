import nxt
from time import sleep
import threading as thread
from nxt.locator import Method
b = nxt.find_one_brick(method=Method(usb=True, bluetooth=False))
mx = nxt.Motor(b, nxt.PORT_A)
my = nxt.Motor(b, nxt.PORT_B)
motors = [mx, my]


def turnmotor(m, power, degrees):
    m.turn(power, degrees)


def runinstruction(i):
    motorid, speed, degrees = i
    thread._start_new_thread(turnmotor, (motors[motorid], speed, degrees))

runinstruction([0, 64, 3600])
sleep(10)