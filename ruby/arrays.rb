require 'digest/md5'

start_time = Time.now

(1..1000).each do |i|
  array = Array.new
  (1..1000).each do |j|
    array.push(Digest::MD5.hexdigest(j.to_s))
  end
  array.sort!
  array.slice!(250, 500)
end

end_time = Time.now
printf('%f sec', end_time - start_time)
