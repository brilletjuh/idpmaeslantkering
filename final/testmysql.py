import mysql.connector

cnx = mysql.connector.connect(
    host="198.211.126.139",
    user="matthias",
    passwd="dikkebmw69",
    db="maeslantkering"
)

try:
    cursor = cnx.cursor()
    cursor.execute("select * from status")
    result = cursor.fetchall()
    print(result)
finally:
    cnx.close()