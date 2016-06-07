require 'digest/md5'

start_time = Time.now

prev = Digest::MD5.hexdigest(0.to_s)
(1..50).each do |i|
  (1..10000).each do |j|
    cur = Digest::MD5.hexdigest(j.to_s)
    result = cur + prev
    result.capitalize!
    result = result[16..32]
    prev = cur
  end
end

end_time = Time.now
printf('%f sec', end_time - start_time)
