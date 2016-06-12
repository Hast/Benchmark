import MySQLdb, time

start = time.time()

connection = MySQLdb.connect(host="localhost", user="root", passwd="password", db="benchmark", autocommit=True)
connection.query("CREATE TABLE `test` (`id` int(11) NOT NULL, `value` int(11) NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB")

cursor = connection.cursor()

for i in range(1, 1000):
    cursor.execute('INSERT INTO `test` (`id`, `value`) VALUES (%s, %s)', [i, i*100])

for i in range(1, 1000):
    cursor.execute('SELECT * FROM `test` WHERE `id` = %s', [i])
    result = cursor.fetchone()

for i in range(1, 1000):
    cursor.execute('UPDATE `test` set `value`= %s WHERE `id` = %s', [i*100+1, i])

for i in range(1, 1000):
    cursor.execute('DELETE FROM `test` WHERE `id` = %s', [i])

connection.query("DROP TABLE `test`")

end = time.time()
print("{0} sec.".format(end - start))