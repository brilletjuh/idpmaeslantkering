import nxt
import nxt.brick
import nxt.bluesock

bluetooth = nxt.bluesock()
bluetooth.connect()

brick = nxt.brick.Brick()
brick.play_tone_and_wait(1000, 1000)


