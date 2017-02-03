import nxt
from time import sleep

b = nxt.find_one_brick(method=nxt.locator.Method(usb=True, bluetooth=False))

FREQ_C4 = 262
FREQ_D4 = 294
FREQ_EB4 = 311
FREQ_E4 = 330
FREQ_F4 = 349
FREQ_G4 = 393
FREQ_GB4 = 370
FREQ_A4 = 440
FREQ_BB4 = 466
FREQ_B4 = 494
FREQ_C5 = 523
FREQ_D5 = 587
FREQ_EB5 = 622
FREQ_E5 = 659
FREQ_F5 = 698
FREQ_G5 = 784
FREQ_A5 = 880
FREQ_B5 = 988


b.play_tone(FREQ_G4, 401)
sleep(0.45)
b.play_tone(FREQ_G4, 401)
sleep(0.45)
b.play_tone(FREQ_G4, 401)
sleep(0.45)
b.play_tone(FREQ_EB4, 300)
sleep(0.35)
b.play_tone(FREQ_BB4, 100)
sleep(0.15)
b.play_tone(FREQ_G4, 401)
sleep(0.45)
b.play_tone(FREQ_EB4, 300)
sleep(0.35)
b.play_tone(FREQ_BB4, 100)
sleep(0.15)
b.play_tone(FREQ_G4, 800)
sleep(0.85)
b.play_tone(FREQ_D5, 401)
sleep(0.45)
b.play_tone(FREQ_D5, 401)
sleep(0.45)
b.play_tone(FREQ_D5, 401)
sleep(0.45)
b.play_tone(FREQ_EB5, 300)
sleep(0.35)
b.play_tone(FREQ_BB4, 100)
sleep(0.15)
b.play_tone(FREQ_GB4, 401)
sleep(0.45)
b.play_tone(FREQ_EB4, 300)
sleep(0.35)
b.play_tone(FREQ_BB4, 100)
sleep(0.15)
b.play_tone(FREQ_G4, 401)
sleep(0.45)
