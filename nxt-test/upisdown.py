import nxt
from time import sleep

b = nxt.find_one_brick(method=nxt.locator.Method(usb=True, bluetooth=False))

# mx = nxt.Motor(b, nxt.PORT_B)
# my = nxt.Motor(b, nxt.PORT_C)

FREQ_C4 = 262
FREQ_D4 = 294
FREQ_E4 = 330
FREQ_F4 = 349
FREQ_G4 = 392
FREQ_A4 = 440
FREQ_BB4 = 466
FREQ_B4 = 494
FREQ_C5 = 523
FREQ_D5 = 587
FREQ_E5 = 659
FREQ_F5 = 698
FREQ_G5 = 784
FREQ_A5 = 880
FREQ_B5 = 988

b.play_tone(FREQ_D5, 300)
b.play_tone(FREQ_A4, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_D5, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_D5, 300)
b.play_tone(FREQ_BB4, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_D5, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_D5, 300)
b.play_tone(FREQ_F4, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_D5, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_D5, 150)
sleep(0.2)
b.play_tone(FREQ_C5, 1000)
b.play_tone(FREQ_F5, 300)
sleep(0.35)
b.play_tone(FREQ_E5, 300)
sleep(0.35)
b.play_tone(FREQ_D5, 300)
sleep(0.35)