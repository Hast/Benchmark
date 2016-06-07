require 'digest/md5'

start_time = Time.now

(1..1000).each do |i|
  dict = Hash.new
  (1..1000).each do |j|
    dict[Digest::MD5.hexdigest(j.to_s)] = j
  end
  dict = dict.sort.to_h
end

end_time = Time.now
printf('%f sec', end_time - start_time)