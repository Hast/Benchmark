require 'mysql2'

start_time = Time.now

connection = Mysql2::Client.new(:host => 'localhost', :username => 'root', :password => 'password', :database => 'benchmark')

connection.query('CREATE TABLE `test` (`id` int(11) NOT NULL, `value` int(11) NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB')

statement = connection.prepare('INSERT INTO `test` (`id`, `value`) VALUES (?, ?)')
(1..1000).each do |i|
  statement.execute(i, i*100)
end

statement = connection.prepare('SELECT * FROM `test` WHERE `id` = ?')
(1..1000).each do |i|
  result = statement.execute(i).first
end

statement = connection.prepare('UPDATE `test` set `value`= ? WHERE `id` = ?')
(1..1000).each do |i|
  statement.execute(i*100+1, i)
end

statement = connection.prepare('DELETE FROM `test` WHERE `id` = ?')
(1..1000).each do |i|
  statement.execute(i)
end

connection.query('DROP TABLE `test`')

end_time = Time.now
printf('%f sec', end_time - start_time)