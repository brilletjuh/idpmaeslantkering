import nxt
from time import sleep
import threading as thread
from nxt.locator import Method
from nxt.sensor import *
import mysql.connector


def closegates(m):
    # This method closes the gate by giving the instruction to
    # rotate the motor 10 rounds at 50% power
    m.turn(64, 3600)


def playwarning(b):
    # This plays the Imperial March as a warning sign before closing the gates
    FREQ_EB4 = 311
    FREQ_G4 = 393
    FREQ_GB4 = 370
    FREQ_BB4 = 466
    FREQ_D5 = 587
    FREQ_EB5 = 622

    def playtone(freq, dur):
        b.play_tone(freq, dur)
        sleep((dur + 50) * 0.001)

    playtone(FREQ_G4, 600)
    playtone(FREQ_G4, 600)
    playtone(FREQ_G4, 600)
    playtone(FREQ_EB4, 450)
    playtone(FREQ_BB4, 150)
    playtone(FREQ_G4, 600)
    playtone(FREQ_EB4, 450)
    playtone(FREQ_BB4, 150)
    playtone(FREQ_G4, 1200)
    playtone(FREQ_D5, 600)
    playtone(FREQ_D5, 600)
    playtone(FREQ_D5, 600)
    playtone(FREQ_EB5, 450)
    playtone(FREQ_BB4, 150)
    playtone(FREQ_GB4, 600)
    playtone(FREQ_EB4, 450)
    playtone(FREQ_BB4, 150)
    playtone(FREQ_G4, 600)


def main():
    # Establish DB-connection
    # host    198.211.126.139
    # user    matthias
    # passwd  dikkebmw69
    # databse maeslantkering
    cnx = mysql.connector.connect(
        host="198.211.126.139",
        user="matthias",
        passwd="dikkebmw69",
        db="maeslantkering"
    )
    # Establish NXT-connection
    brick = nxt.find_one_brick(method=Method(usb=True, bluetooth=False))
    motor = nxt.Motor(brick, nxt.PORT_B)

    touch = Touch(brick, PORT_1)
    ultra = Ultrasonic(brick, PORT_4)

    def updatedb(servernr, cont):
        while True:
            try:
                print("updating status...")
                cursor = cnx.cursor()
                cursor.execute("UPDATE status SET SERVER_%s='ONLINE'" % ((servernr)))
                cursor.close()
                cnx.commit()
            except:
                print("error in writing status")
            try:
                cursor = cnx.cursor()
                cursor.execute("SELECT * FROM status")
                result = cursor.fetchone()
                if result[3 - servernr] == "OFFLINE":
                    print("Other server OFFLINE, taking over")
            except:
                print("error in reading status")
            sleep(3)

    def readsensors(a, b):
        while True:
            print("reading sensor data...")
            didtouch = touch.get_sample()
            if didtouch:
                playwarning(brick)
                closegates(motor)
            else:
                cm = ultra.get_sample()
                if(cm < 20):
                    playwarning(brick)
                    closegates(motor)
            sleep(2)

    thread._start_new_thread(updatedb, (1, True))
    thread._start_new_thread(readsensors, (0, 0))

    while True:
        sleep(1)

if __name__ == '__main__':
    main()